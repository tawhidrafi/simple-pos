<?php

namespace App\Providers;

use App\Models\Admin\Permission;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    // Fix max key length issue
    public function register(): void
    {
        //
    }

    public function boot(): void
    {
        Schema::defaultStringLength(191);

        if (Schema::hasTable('permissions')) {
            $permissions = Permission::all();

            foreach ($permissions as $permission) {
                Gate::define($permission->name, function ($user) use ($permission) {
                    return $user->hasPermissionTo($permission->name);
                });
            }
        }
    }
}
