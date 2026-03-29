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

// pass data with routing:  m1
// Route::get('/about/{name}', function($name){
//     echo $name;
//     return view('about');
// });


// pass data with routing:  m2  check about.blade.php
Route::get('/about/{name}', function($name){
    return view('about', ['name' => $name]);
});


// temporarily removal of route  
Route::redirect('/home','/');  //redirects home to root page

