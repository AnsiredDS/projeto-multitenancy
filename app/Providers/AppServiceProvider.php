<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

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
        /** 
         * Como o pacote foi adicionado ao dont-discover, ele não será inicializado automaticamente
         * pelo Laravel e precisa ser inicializado através do provider. 
         * Talvez daria pra implementar de alguma algo para fazer o filament iniciar depois do multitenant.
         */ 
    }
}
