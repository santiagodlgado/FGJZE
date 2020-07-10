<?php

use Illuminate\Routing\Route;

Route::get('/', function () {
    return view('welcome');
    
    
});

Route::resource('fgjez/userData','UserDataController');