<?php

namespace App\Providers;

use App\User;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        'App\Models\Divisi' => 'App\Policies\DivisiPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        Gate::define('akses', function ($user) {
            $role = User::find($user->id)->role;
            foreach ($role as $r) {
                if ($r->id == 1) {
                    return true;
                }
            }
            return null;
        });
        Gate::define('tambah_data', function ($user) {
            $role = User::find($user->id)->role;
            foreach ($role as $r) {
                if ($r->id == 1) {
                    return true;
                }
            }
            return null;
        });
        Gate::define('delete_data', function ($user) {
            $role = User::find($user->id)->role;
            foreach ($role as $r) {
                if ($r->id == 1) {
                    return true;
                }
            }
            return null;
        });
    }
}
