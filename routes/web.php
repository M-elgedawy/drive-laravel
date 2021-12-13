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

Route::get('/home', 'HomeController@index')->name('home');
// drives Route
// display all drives
Route::get('drives','DriveController@index')->name('drives.index');
// go to create page
Route::get('drive/create',"DriveController@create")->name('drives.create');
// to insert into database
Route::post('drive/create',"DriveController@store")->name('drives.store');
// to display one item
Route::get('drive/show/{id}',"DriveController@show")->name('drives.show');
// to go to edit page
Route::get('drive/edit/{id}',"DriveController@edit")->name('drives.edit');
// to update
Route::post('drive/edit/{id}',"DriveController@update")->name('drives.update');
// to remove item from database
Route::get('drive/destroy/{id}',"DriveController@destroy")->name('drives.destroy');
//########end drives routes
Route::get('drive/download/{id}',"DriveController@download")->name('drives.download');
