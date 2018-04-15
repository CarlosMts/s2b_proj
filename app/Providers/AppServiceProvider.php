<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;
use App\Space;
use Auth;


class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    

    public function boot()
    {
        Schema::defaultStringLength(191);

        view()->composer('layouts.admin', function($view)
        {
            $countNewSpaces = DB::table('spaces')
            ->where('admin_reviewed', 0)
            ->count();

            $newMessages = DB::table('threads')
            -> join('spaces', 'threads.space_id', '=', 'spaces.id')
            -> join('users', 'threads.user_id', '=', 'users.id')
            -> join('users as space_users', 'spaces.user_id', '=', 'space_users.id')
            -> join(DB::raw("(select max(id) as last_msg_id,
                      thread_id
              from messages
              group by thread_id) AS msg"), 'msg.thread_id', '=', 'threads.id')
            -> join('messages', 'msg.last_msg_id', '=', 'messages.id')
            -> where('threads.user_id', '=', Auth::user()->id)->orWhere('spaces.user_id','=',Auth::user()->id)
            -> where('messages.read', '=', 0)
            -> groupBy('threads.user_id')
            -> OrderBy('threads.id', 'asc')
            ->count();

            $view->with(['countNewSpaces'=>$countNewSpaces, 'newMessages'=>$newMessages ] );
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
