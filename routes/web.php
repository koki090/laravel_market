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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', 'ItemController@index')->name('items.index');
Route::resource('items', 'ItemController');
Route::get('items/{item}/edit_image', 'ItemController@editImage')->name('items.edit_image');
Route::patch('items/{item}/edit_image', 'ItemController@updateImage')->name('items.update_image');
Route::get('items/{item}/confirm', 'ItemController@confirm')->name('items.confirm');
Route::post('items/{item}/finish', 'ItemController@finish')->name('items.finish');
Route::patch('items/{item}/like', 'ItemController@like')->name('items.like');

Route::resource('users', 'UserController')->only([
    'show', 'edit', 'update']);
Route::get('users/{user}/edit_image', 'UserController@editImage')->name('users.edit_image');
Route::patch('users/{user}/edit_image', 'UserController@updateImage')->name('users.update_image');
Route::get('users/{user}/exhibitions', 'UserController@exhibitions')->name('users.exhibitions');


Route::resource('likes', 'LikeController')->only([
    'index',]);
    
Auth::routes();