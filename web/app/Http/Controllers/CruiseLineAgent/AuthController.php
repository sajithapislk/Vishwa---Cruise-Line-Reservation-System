<?php

namespace App\Http\Controllers\CruiseLineAgent;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\CruiseLineLoginRequest;
use App\Http\Requests\Auth\LoginRequest;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use Inertia\Response;

class AuthController extends Controller
{
    /**
     * Display the login view.
     */
    public function create(): Response
    {
        return Inertia::render('CruiseLineAgent/Login', [
            'canResetPassword' => Route::has('cruiseline_agent.password.request'),
            'status' => session('status'),
        ]);
    }

    /**
     * Handle an incoming authentication request.
     */
    public function store(CruiseLineLoginRequest $request): RedirectResponse
    {
        $request->authenticate('cruiseline_agent');

        $request->session()->regenerate();

        return redirect()->intended(RouteServiceProvider::CRUISELINE_AGENT_HOME);
    }

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('cruiseline_agent')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
