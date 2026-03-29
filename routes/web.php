<?php

use Illuminate\Support\Facades\Route;


// method-1 to routing for opening view and controllwer as well
Route::get('/', function () {
    return view('welcome');
});

Route::get('/home', function () {
    return view('home');
});

// method 2 for routing  for opening view only
Route::view('/home1', 'home');

// pass data with routing:
