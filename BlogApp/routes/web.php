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

//Welcome Blade Route
/* This is the Burn way to create a route (This doesn't follow the MVC)

Route::get('/', function () {
    return view('welcome');
});

 Example of a dynamic route

 Route::get('/users/{id}',function($id){
    return 'This is '.$id;
 });

*/

//This is the correct way to use the reoutes from the controller
Route::get('/','PagesController@index');

//About Blade Route
Route::get('/about','PagesController@about');

//Services Blade Route
Route::get('/services','PagesController@services');

//PostsController Routes
Route::resource('posts', 'PostsController');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

