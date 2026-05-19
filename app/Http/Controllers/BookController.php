<?php

namespace App\Http\Controllers;

use App\Models\Brief;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

class BookController extends Controller
{
    public function show()
    {
        return view('book', [
            'submitted' => session()->has('book.submitted'),
        ]);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name'         => ['required', 'string', 'max:120'],
            'email'        => ['required', 'email', 'max:160'],
            'brand'        => ['required', 'string', 'max:160'],
            'url'          => ['required', 'string', 'max:200'],
            'revenue'      => ['nullable', 'string', 'max:40'],
            'spend'        => ['nullable', 'string', 'max:40'],
            'needs'        => ['nullable', 'array'],
            'needs.*'      => ['string', 'max:40'],
            'message'      => ['nullable', 'string', 'max:2000'],
        ]);

        // 1. Persist to database (primary source of truth)
        $brief = Brief::create(array_merge($data, [
            'ip_address' => $request->ip(),
            'user_agent' => $request->userAgent(),
        ]));

        // 2. Mirror to the log channel for ops visibility
        Log::info('book.brief.received', [
            'id'    => $brief->id,
            'brand' => $brief->brand,
            'email' => $brief->email,
        ]);

        // 3. Notify by email (Resend / SMTP in prod; logs in dev)
        $contactEmail = env('CONTACT_EMAIL', 'hello@roasdriven.io');

        try {
            Mail::raw($this->formatBrief($data), function ($message) use ($contactEmail, $data) {
                $message->to($contactEmail)
                    ->subject('New strategy brief — ' . ($data['brand'] ?? 'unknown'))
                    ->replyTo($data['email'], $data['name']);
            });
        } catch (\Throwable $e) {
            Log::warning('book.brief.mail_failed', [
                'id'    => $brief->id,
                'error' => $e->getMessage(),
            ]);
        }

        return redirect()->route('book')->with('book.submitted', true);
    }

    private function formatBrief(array $data): string
    {
        $needs = isset($data['needs']) ? implode(', ', $data['needs']) : '—';

        return <<<TXT
New strategy brief

Name:    {$data['name']}
Email:   {$data['email']}
Brand:   {$data['brand']}
URL:     {$data['url']}
Revenue: {$data['revenue']}
Spend:   {$data['spend']}
Needs:   {$needs}

Message:
{$data['message']}
TXT;
    }
}
