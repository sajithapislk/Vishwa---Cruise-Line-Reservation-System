<?php

namespace App\Providers;

use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Facades\Route;

class RouteServiceProvider extends ServiceProvider
{
    /**
     * The path to your application's "home" route.
     *
     * Typically, users are redirected here after authentication.
     *
     * @var string
     */
    public const HOME = '/dashboard';
    public const ADMIN_HOME = '/admin/dashboard';
    public const CRUISELINE_AGENT_HOME = '/cruise-company-agent/dashboard';
    public const CUSTOMER_SUPPORTER_HOME = '/customer-supporter/dashboard';

    /**
     * Define your route model bindings, pattern filters, and other route configuration.
     */
    public function boot(): void
    {
        RateLimiter::for('api', function (Request $request) {
            return Limit::perMinute(60)->by($request->user()?->id ?: $request->ip());
        });

        $this->routes(function () {
            Route::middleware('api')
                ->prefix('api')
                ->group(base_path('routes/api.php'));

            Route::middleware('web')
                ->group(base_path('routes/web/web.php'));

            Route::middleware('web')
                ->prefix('admin')
                ->name('admin.')
                ->group(base_path('routes/web/admin.php'));

            Route::middleware('web')
                ->prefix('cruise-company-agent')
                ->name('cruise-company-agent.')
                ->group(base_path('routes/web/cruise-company-agent.php'));

            Route::middleware('web')
                ->prefix('customer-supporter')
                ->name('customer-supporter.')
                ->group(base_path('routes/web/customer-supporter.php'));
        });
    }
}
