<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Laravel\Passport\Passport;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();
        $this->setUpPassport();
    }

    protected function setUpPassport()
    {
        $accessTokenExpireIn = config('services.passport.access_token_expire_days');
        $refreshTokenExpireIn = config('services.passport.refresh_token_expire_days');
        $apiRoutePrefix = "api/v1/oauth";
        $routesConfig = ['prefix' => $apiRoutePrefix];

        Passport::tokensExpireIn(now()->addDays($accessTokenExpireIn));
        Passport::refreshTokensExpireIn(now()->addDays($refreshTokenExpireIn));
        Passport::routes(function ($router) {
            $router->forAccessTokens();
        }, $routesConfig);
    }
}
