<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Gate;
use App\Models\User;

class AppServiceProvider extends ServiceProvider
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
        Paginator::useBootstrap();

        //definisikan sebuah gate, yg namanya admin, dimana gate ini hanya 
        //boleh diakses oleh user dengan username dameuli
        //definisikan aturan untuk admin, kemudian beri closure User,
        //untuk tau siapa usernya
        //gate digunakan utk user yg sudah login, check digunakan utk user yg
        //belom login
        Gate::define('admin', function(User $user){
            return  $user->is_admin; //jika nilainya true, maka akan mengecek is_adminnya nilainya 0/1
            //jika 1 maka gate nya boleh di akses  
        });
    }
}
