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
        else if($request->routeIs('customer_supporter.*')){
            return route('customer_supporter.login');
        }
        else if($request->routeIs('cruiseline_agent.*')){
            return route('cruiseline_agent.login');
        }
        else {
            return route('login');
        }
    }
}
