<?php

use Illuminate\Support\Facades\Auth;
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

Route::get('/', 'App\Http\Controllers\UsersController@index');
Route::post('ulogin', 'App\Http\Controllers\UloginController@login');
Route::delete('userdelete/{user}', 'App\Http\Controllers\UsersController@deleteUser')->name('deleteUser');
Route::put('userblock/{user}', 'App\Http\Controllers\UsersController@blockUser')->name('blockUser');
Route::put('userunblock/{user}', 'App\Http\Controllers\UsersController@unblockUser')->name('unblockUser');

Auth::routes();

