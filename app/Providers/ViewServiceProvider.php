<?php

namespace App\Providers;

use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ViewServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        // khi khach hàng dang nhap hien thi anh dai diẹn
        View::composer('*', function ($view) {
            if (Auth::check()) {
                $user = Auth::user();
                $avatar = $user->anh_dai_dien ? Storage::url($user->anh_dai_dien) : asset('assets/client/images/avatar.png');
                $view->with('avatar', $avatar);
            }
        });
    }
}
