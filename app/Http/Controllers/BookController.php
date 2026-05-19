<?php

namespace App\Http\Controllers;

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

        // Log + optionally send via Resend / Mail.
        // For now, log to the configured channel and forward via mail() if configured.
        $contactEmail = env('CONTACT_EMAIL', 'hello@roasdriven.io');

        Log::info('book.brief.received', $data);

        try {
            Mail::raw($this->formatBrief($data), function ($message) use ($contactEmail, $data) {
                $message->to($contactEmail)
                    ->subject('New strategy brief — ' . ($data['brand'] ?? 'unknown'))
                    ->replyTo($data['email'], $data['name']);
            });
        } catch (\Throwable $e) {
            // Mail driver may be log in dev — that's fine; the log call above captures it.
            Log::warning('book.brief.mail_failed', ['error' => $e->getMessage()]);
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
