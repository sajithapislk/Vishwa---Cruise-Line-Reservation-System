<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Illuminate\Http\Request;

class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     */
    protected function redirectTo(Request $request): ?string
    {

        if($request->routeIs('admin.*')){
            return route('admin.login');
        }
        else if($request->routeIs('customer-supporter.*')){
            return route('customer-supporter.login');
        }
        else if($request->routeIs('cruise-company-agent.*')){
            return route('cruise-company-agent.login');
        }
        else {
            return route('login');
        }
    }
}
