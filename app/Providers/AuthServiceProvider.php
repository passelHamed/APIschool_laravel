<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;

use App\Models\User;
use App\Models\lesson;
use App\Models\tag;
use App\Policies\userPolicy;
use App\Policies\lessonPolicy;
use App\Policies\tagPolicy;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use laravel\Passport\Passport;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
        user::class => userPolicy::class,
        lesson::class => lessonPolicy::class,
        tag::class => tagPolicy::class,
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        Passport::routes();
        passport::personalAccessTokensExpireIn(now()->addDays(15));
    }
}
