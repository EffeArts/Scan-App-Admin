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

Auth::routes();

Route::middleware(['auth'])->group(function (){
    
    Route::get('/home', 'ScanController@index')->name('home');

    Route::get('/admin/scans', 'ScanController@index')->name('admin.scans');

    Route::middleware('isSuperAdmin')->group(function () {
        Route::get('/admin/users', 'UserController@index')->name('admin.users');
        Route::get('/admin/users/register', 'UserController@create')->name('users.register');
        Route::post('/admin/users/store', 'UserController@store')->name('users.store');
        
        Route::get('/admin/devices', 'DeviceController@index')->name('admin.devices');
        Route::post('/admin/devices/add', 'DeviceController@store')->name('devices.store');
    });
    
});

