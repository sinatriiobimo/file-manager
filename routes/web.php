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

// Route::get('/', function () {
//     return view('welcome');
// });
Auth::routes();

Route::get('/', 'DashboardController@index')->name('dashboard');
Route::resource('document', 'DocumentController');
Route::get('document/{id}/download', 'DocumentController@download')->name('document.download');
Route::get('document/{id}/show', 'DocumentController@show')->name('document.show');
Route::resource('category', 'CategoryController');
Route::get('search', 'SearchController@index')->name('search');
Route::get('reset', 'ResetController@index')->name('reset');
Route::post('reset', 'ResetController@store')->name('reset.store');
Route::resource('admin', 'AdminController');
Route::get('user', 'AdminController@user')->name('user');