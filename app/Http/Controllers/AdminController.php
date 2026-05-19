<?php

namespace App\Http\Controllers;

use App\Models\Brief;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    /**
     * Show the login form.
     */
    public function loginForm()
    {
        // Already authenticated? Skip the form.
        if (session('admin_authenticated')) {
            return redirect()->route('admin.index');
        }

        return view('admin.login');
    }

    /**
     * Handle login.
     */
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email'    => ['required', 'string', 'max:160'],
            'password' => ['required', 'string', 'max:160'],
        ]);

        $adminEmail = (string) config('admin.email');
        $adminPass  = (string) config('admin.password');

        // Timing-safe comparison
        $emailOk = hash_equals($adminEmail, $credentials['email']);
        $passOk  = hash_equals($adminPass,  $credentials['password']);

        if ($emailOk && $passOk) {
            // Rotate session id to defend against fixation
            $request->session()->regenerate();
            $request->session()->put('admin_authenticated', true);
            $request->session()->put('admin_email', $adminEmail);

            return redirect()
                ->intended(route('admin.index'))
                ->with('admin.notice', 'Signed in.');
        }

        return back()
            ->withErrors(['email' => 'Incorrect email or password.'])
            ->onlyInput('email');
    }

    /**
     * Sign out.
     */
    public function logout(Request $request)
    {
        $request->session()->forget(['admin_authenticated', 'admin_email']);
        $request->session()->regenerate();

        return redirect()
            ->route('admin.login')
            ->with('admin.notice', 'Signed out.');
    }

    /**
     * Briefs index — paginated table of all /book submissions.
     */
    public function index(Request $request)
    {
        $query = Brief::query()->latest();

        if ($search = trim((string) $request->query('q'))) {
            $query->where(function ($q) use ($search) {
                $q->where('email', 'like', "%{$search}%")
                  ->orWhere('brand', 'like', "%{$search}%")
                  ->orWhere('name',  'like', "%{$search}%");
            });
        }

        $briefs = $query->paginate(20)->withQueryString();

        return view('admin.index', [
            'briefs' => $briefs,
            'search' => $search ?? '',
            'total'  => Brief::count(),
        ]);
    }

    /**
     * Single brief detail.
     */
    public function show(Brief $brief)
    {
        return view('admin.show', [
            'brief' => $brief,
        ]);
    }
}
