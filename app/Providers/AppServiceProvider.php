<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Gate;
use App\Models\admin ;
use App\Models\User ;
use App\Models\file ;
use App\Policies\filePolicy ;
use Carbon\Carbon;

use BezhanSalleh\FilamentLanguageSwitch\LanguageSwitch;
use BezhanSalleh\FilamentLanguageSwitch\Enums\Placement;

class AppServiceProvider extends ServiceProvider
{

    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
    
        Gate::define("update_user",function(User $user){
            return $user->role == "admin" ;
        });
        Gate::define("user_pay",function(User $user){
            $startDate = Carbon::parse($user->pay);
            $now = Carbon::now();
            return $startDate->diffInMonths($now) < 0;
        });
        //lang     
        LanguageSwitch::configureUsing(function (LanguageSwitch $switch) {
            $switch
                ->locales(['ar','en']) 
                ->flags([
                    'ar' => asset('langImgs/ar.jpeg'),      
                    'en' => asset('langImgs/en.jpeg'),
                ]);
        })           
        ; 
    }
}
