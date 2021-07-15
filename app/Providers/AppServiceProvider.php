<?php
namespace App\Providers;
use Illuminate\Support\ServiceProvider;
//import this
use Illuminate\Support\Facades\Schema;
class AppServiceProvider extends ServiceProvider{
  /**
  * Register any application services.
  *
  * @return void
  */
  public function register(){
     //add this
     Schema::defaultStringLength(191);
  }
  /**
  * Bootstrap any application services.
  *
  * @return void
  */
   public function boot(){
      //
   }
}
mysql://b92889a7c59da7:4e26470b@us-cdbr-east-04.cleardb.com/heroku_1e149bd80c1a723?reconnect=true