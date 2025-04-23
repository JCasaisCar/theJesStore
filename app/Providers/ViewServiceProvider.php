<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use App\Models\Category;

class ViewServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
        // Compartir categorías con todas las vistas
        View::composer('*', function ($view) {
            $categorias = Category::all();
            $view->with('categoriasHeader', $categorias);
        });
    }
}
