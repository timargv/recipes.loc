<?php

namespace App\Providers;

use App\Comment;
use App\Wall;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */




    public function boot()
    {
        view()->composer('', function ($view) {
//            $view->with('WallMessageCommentsCoun', Comment::where('wall_message_id', ()));
        });
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
