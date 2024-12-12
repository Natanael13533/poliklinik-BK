<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     */
    public function create(): View
    {
        return view('auth.login');
    }

    public function pasien(): View
    {
        return view('auth.pasien.login');
    }

    /**
     * Handle an incoming authentication request.
     */
    public function store(LoginRequest $request): RedirectResponse
    {
        $request->authenticate();
        // $credentials = $request->only('email', 'password');

        // if (auth()->attempt(array_merge($credentials, ['role' => $role]))) {
        //     $request->session()->regenerate();

        //     // Redirect based on the user's role
        //     if (Auth::user()->role === 'admin') {
        //         return redirect()->route('admin.dashboard');
        //     } elseif (Auth::user()->role === 'dokter') {
        //         return redirect()->route('dokter.dashboard');
        //     }

        //     // Default redirection for regular users
        //     return redirect()->intended(route('dashboard', absolute: false));
        // }

        // // Handle invalid login
        // return redirect()->back();

        $request->session()->regenerate();

        if (Auth::user()->role == 'admin') {
            return redirect()->route('admin.dashboard');
        }
        elseif (Auth::user()->role == 'dokter') {
            return redirect()->route('dokter.dashboard');
        }

        return redirect()->intended(route('dashboard', absolute: false));
    }

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
