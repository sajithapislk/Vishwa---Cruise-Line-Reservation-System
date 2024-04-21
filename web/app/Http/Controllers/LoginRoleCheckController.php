<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Models\Admin;
use App\Models\CruiseCompanyAgent;
use App\Models\CustomerSupporter;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginRoleCheckController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(LoginRequest $request)
    {
        $loginEmail = $request->email;

        if(User::where('email', $loginEmail)->first()){
            $credentials = $request->only('email', 'password');

            if (Auth::attempt($credentials)) {
                $request->session()->regenerate();
                return redirect()->intended('/dashboard');
            }

            return back()->withErrors([
                'email' => 'The provided credentials do not match our records.',
            ])->onlyInput('email');
        }
        else if(Admin::where('email', $loginEmail)->first()){
            $credentials = $request->only('email', 'password');

            if (Auth::guard('admin')->attempt($credentials)) {
                $request->session()->regenerate();
                return redirect()->intended('/admin/dashboard');
            }

            return back()->withErrors([
                'email' => 'The provided credentials do not match our records.',
            ])->onlyInput('email');
        }
        else if(CruiseCompanyAgent::where('email', $loginEmail)->first()){
            $credentials = $request->only('email', 'password');

            if (Auth::guard('cruise-company-agent')->attempt($credentials)) {
                $request->session()->regenerate();
                return redirect()->intended('/cruise-company-agent/dashboard');
            }

            return back()->withErrors([
                'email' => 'The provided credentials do not match our records.',
            ])->onlyInput('email');
        }
        else if(CustomerSupporter::where('email', $loginEmail)->first()){
            $credentials = $request->only('email', 'password');

            if (Auth::guard('customer-supporter')->attempt($credentials)) {
                $request->session()->regenerate();
                return redirect()->intended('/dashboard');
            }

            return back()->withErrors([
                'email' => 'The provided credentials do not match our records.',
            ])->onlyInput('email');
        }

        // Handle the case where the user does not exist
        return back()->withErrors([
            'email' => 'The provided email does not match our records.',
        ])->onlyInput('email');
    }
}
