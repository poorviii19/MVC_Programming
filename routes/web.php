<?php

// to use this file go to bootstrap folder in the main folder 
// and then go to app.php then web: _DIR_.......web.php  uncomment as per the sue

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

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


// route creation for controller  / calling controller
Route::get('user', [UserController::class,'getUser']); 
Route::get('aboutuser', [UserController::class,'aboutUser']); 
Route::get('username/{name}',[UserController::class, 'getUserName']);

// Calling a view from controller
Route::get('user1', [UserController::class,'getUser1']); 
Route::get('username1/{name}',[UserController::class, 'getUserName1']);

// nested view
Route::get('admin',[UserController::class, 'adminLogin']);
Route::get('admin1',[UserController::class, 'adminLogin1']);
Route::view('/admin-home','admin.home');
Route::view('student', 'student');
Route::view('student/{name}', [UserController::class,'student']);


?>