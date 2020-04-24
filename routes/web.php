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

Route::view('/', 'welcome');
    Auth::routes();

    Route::get('/login/employeer', 'Auth\LoginEmployeerController@showEmployeerLoginForm');
    Route::get('/login/seeker', 'Auth\LoginSeekerController@showSeekerLoginForm');
    Route::get('/register/employeer', 'Auth\RegisterEmployeerController@showEmployeerRegisterForm');
    Route::get('/register/seeker', 'Auth\RegisterSeekerController@showSeekerRegisterForm');

    Route::post('/login/employeer', 'Auth\LoginEmployeerController@employeerLogin');
    Route::post('/login/seeker', 'Auth\LoginSeekerController@seekerLogin');
    Route::post('/register/employeer', 'Auth\RegisterEmployeerController@createEmployeer');
    Route::post('/register/seeker', 'Auth\RegisterSeekerController@createSeeker');

    Route::get('/dashboard',function(){
        return view('home');
    })->middleware('auth')->name('dashboard');
    Route::get('/employeer','EmployeerController@index')->name('employeer');
    Route::get('/seeker', 'SeekerController@index')->name('seeker');

    Route::resources([
        'adminemployeer' => 'AdminEmployeerController'
    ]);
