<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

// use App\Http\Controllers\Admin;

use App\Http\Controllers\Admin\LoginController;
use App\Http\Controllers\Admin\DashboardController;



/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::group(['namespace'=>'Admin','middleware'=>'auth:admin'],function(){

    Route::get('/',[DashboardController::class,'index'])->name('admin.dashboard');
  
  });

Route::group(['namespace'=>'Admin','middleware'=>'guest:admin'],function(){

    Route::get('adminlogin',[LoginController::class,'getLogin']);
    Route::post('adminlogin',[LoginController::class,'login'])->name('admin.login');
  
  });
//   Route::get('admin/', function () {
//       return view('admin.dashboard');
//   });
//   Route::get('adminlogin/', function () {
//       return view('admin.auth.login');
//   })->name('admin.login');

/*Route::get('/home/{name?}', function ($name = 'user') {
    return 'hi '.$name;

})->where('name','[a-zA-z]+');*/
Auth::routes();

//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
//
//Auth::routes();
//
//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
