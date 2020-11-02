<?php
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
});


Route::get('login','AdminController@logged');
Route::post('register','AdminController@register');

Route::get('dashboard','AdminController@profile');
Route::get('logout','AdminController@logout');

Route::post('loginUser','AdminController@login');