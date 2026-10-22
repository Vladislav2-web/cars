<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;
use App\Models\User;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
{
    $this->app->singleton(\App\Contracts\SmsSender::class, function () {
        return match (config('services.sms.driver')) {
            'log'   => new \App\Services\Sms\LogSmsSender(),
            default => new \App\Services\Sms\NullSmsSender(),
        };
    });
}

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // Определение Gate для админ-панели (доступ для admin и editor)
        Gate::define('admin-panel', function (User $user) {
            return in_array($user->role, ['admin', 'editor']);
        });
    }
}