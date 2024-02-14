<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Auth;

use App\Models\User;
use App\Models\Wine;
use App\Models\Favorite;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        //
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        Gate::define("add_to_favorite", function (User $user, Wine $wine) {
            return !Favorite::query()->where("user_id", $user->id)->where("wine_id", $wine->id)->exists();
        });

        Gate::define("is_admin", function (User $user) {
            return $user->is_admin;
        });
    }
}
