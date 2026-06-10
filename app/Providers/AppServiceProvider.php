<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Auth;
use App\Models\CarritoItem;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
public function boot(): void
{
    View::composer('*', function ($view) {

        $cantidadCarrito = 0;

        if (Auth::check()) {

            $cantidadCarrito = CarritoItem::where(
                'user_id',
                Auth::id()
            )->sum('cantidad');

        }

        $view->with(
            'cantidadCarrito',
            $cantidadCarrito
        );
    });
}
}
