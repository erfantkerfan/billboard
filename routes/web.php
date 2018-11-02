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

// Landing Page
Route::get('/', 'HomeController@welcome');
// Login Routes
Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login');
Route::post('logout', 'Auth\LoginController@logout')->name('logout');
Route::get('slider', 'HomeController@slider')->name('slider');


Route::group(['middleware' => ['web']], function () {
    // Registration Routes
    Route::get('register', 'Auth\RegisterController@showRegistrationForm')->name('register');
    Route::post('register', 'Auth\RegisterController@register');
    Route::delete('register', 'Auth\RegisterController@delete');
    // Password Routes
    Route::get('password', 'Auth\RegisterController@showPasswordForm')->name('password');
    Route::post('password', 'Auth\RegisterController@Password');
    // Admin Panel Routes
    Route::get('/home', 'HomeController@index')->name('home');
    // Slide Routes
    Route::post('slider', 'HomeController@create');
    Route::delete('slider', 'HomeController@delete');
});
