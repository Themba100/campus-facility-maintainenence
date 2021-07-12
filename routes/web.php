<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});
// auth route for both
Route::group(['middleware'=> ['auth']],function(){
        Route::get('/dashboard','App\http\Controllers\DashboardController@index')->name
        ('dashboard');
});
// for students
Route::group(['middleware' =>['auth','role:student']],function(){
    Route::get('/dashboard/myprofile','App\Http\Controllers\DashboardController@myprofile')
    ->name('dashboard.myprofile');
});
// for staff
Route::group(['middleware' => ['auth', 'role:staff']], function () {
    Route::get('/dashboard/myprofile1', 'App\Http\Controllers\DashboardController@myprofile1')
        ->name('dashboard.myprofile1');
});

require __DIR__.'/auth.php';
