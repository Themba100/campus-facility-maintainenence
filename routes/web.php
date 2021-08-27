<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\FaultController;
use App\Http\Controllers\AccountController;
use App\Http\Controllers\SeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\NotificationController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminLoginController;
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
        Route::get('/dashboard','App\http\Controllers\DashboardController@index')->name('dashboard');
});
Route::group(['middleware'=> ['auth']],function(){
        Route::get('/admindashboard','App\http\Controllers\DashboardController@index')->name('admin.dashboard');
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
// for admins
Route::group(['middleware' =>['auth','role:admin']],function(){
    Route::get('/dashboard/adminmyprofile','App\Http\Controllers\DashboardController@myprofile')
    ->name('dashboard.adminprofile');
});
// Route::fallback(function () {
//     return view('index');
// });
Route::get('/staffdashboard',[DashboardController::class,'index'])->name('staffdashboard.index');
Route::get('/studentdashboard',[DashboardController::class,'index'])->name('studentdashboard.index');
Route::get('/account',[AccountController::class,'account'])->name('staff.account');
// Route::get('/myprofile',[SeController::class,'profile'])->name('myprofile.profile');
// Route::get('/Profile',[SeController::class,'student_prof'])->name('myprofile.student_prof');
Route::get('/Profile',[SeController::class,'fetchUsers'])->name('myprofile.fetchusers');
Route::get('/faults',[FaultController::class,'fault'])->name('staff.faults');
// Route::post('/update',[DashboardController::class,'update_avatar'])->name('update.update_avatar');
Route::get('/staff-settings',[SeController::class,'accountSettings1'])->name('settings.accountsettings1');
Route::get('/settings',[SeController::class,'accountSettings'])->name('settings.accountsettings');
Route::get('/notification',[SeController::class,'Notify'])->name('notification.notify');
Route::get('/student_fault',[SeController::class,'studentFault'])->name('studentfault.studentfault');
Route::post('/Profile',[SeController::class,'insertData'])->name('profile.insertdata');
Route::get('/admin/login',[AdminLoginController::class,'login'])->name('admin.login');
Route::get('/admin/register',[AdminLoginController::class,'register'])->name('admin.register');
Route::post('/admin/save',[AdminLoginController::class,'save'])->name('admin.save');
Route::post('/admin/check',[AdminLoginController::class,'check'])->name('admin.check');
require __DIR__.'/auth.php';
