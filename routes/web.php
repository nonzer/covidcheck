<?php

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

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', "HomeController@index")->name('home');
Route::get("/region/{name}", "RegionController@show_region")->name("show_region");

//Ajax requests
Route::get("/stat/regions", "StatController@get_all_region")->name("get_all_region");
Route::get("/stat/regions/{name}", "StatController@get_one_region")->name("get_one_region");
Route::get("/stat/global","StatController@chart_global");

//tests routes
Route::get('/test/{name}', "StatController@get_one_region");

// route::group(['prefix'=>'/admin', 'namespace'=>'Admin'], function(){
//     Route::get('/login',"LoginController@login")->name('connexion');
//     Route::post('/login',"LoginController@conn")->name('connexion');

//     Route::get('/dash',"AdminController@index")->name('dash');
// });

/**
 * 
 * SIMON
 */
Route::namespace("Admin")->prefix("Administration")->middleware(["auth", "lock"])->group(function (){
    Route::view('/', 'Admin/dashboard')->name('dashboard');
    Route::get('/profile', function (){
        return view('auth.profile')->with('user', Auth::user());
    })->name('profile');
    Route::resource('region', 'RegionController');
    Route::resource('city', 'CityController');
    Route::resource('statistic', 'StatisticController');
    Route::resource('user', 'UserController');
});

Route::get('/admin', function (){ //modifier
    return redirect()->route('dashboard');
});

Auth::routes(array(
    'register' => false,
));

Route::get('/lockscreen', 'LockAccountController@lockscreen')->name('lockscreen.index');
Route::post('/lockscreen', 'LockAccountController@unlock')->name('lockscreen.store');
Route::get('/forbidden', function (){
    return view('');
})->name('forbidden');