<?php

// to use this file go to bootstrap folder in the main folder 
// and then go to app.php then web: _DIR_.......web1.php uncomment as per the sue

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\bladetemplateController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\Controller;

Route::get('blade1', [bladetemplateController::class,'blade1']);
Route::get('subview', function(){
    return view('home');
});

Route::get('user-about',[bladetemplateController::class, 'userAbout']);
Route::get('comp', function(){
    return view('homeComponent');
});

Route::get('/test', [UserController::class, 'index']);


// practice session:


Route::get('/', function(){
    return 'welcome to laravel';
});

Route::get('/about', function(){
    return 'This is about page';
});

Route::get('/contact', function(){
    return "This is Poorvi's contact page";
});

Route::get('/services', function(){
    return 'welcome, we are pleased to serve you our services';
});

Route::get('/products', function(){
    return "welcome to our product page";
});

Route::get('/team', function(){
    return "hello, our team is always ready to help you!";
});


// Routing with parameters:

Route::get('user/{id}', function($id){
    return "User id: " .$id;
});

Route::get('/product/{productId}', function($productId){
    return "Product ID is: " .$productId;
});

Route::get('/users/{id}/posts/{postId}', function($id, $postId){
    return "User id is: $id, Post id is: $postId";
});



// Routing with optional parameters:
Route::get('/users/{id?}', function($id = null){
    return $id? "Hello, your id is: $id" : "Null";
});

Route::get('/student/{id?}', function($id = null){
    return $id ? "Student id is $id" : "Student id is not mentioned";
});


//Constraints:

Route::get('/number/{id}', function($id){
    return $id;
})->where('id' ,'[0-9]+');

Route::get('/string/{name}', function($name){
    return $name;
})->whereAlpha('name','[A-Z]+');

Route::get('/strings/{slug}', function($slug){
    return $slug;
})->whereAlphaNumeric('slug');

// debug route:
Route::get('/debug/{value}', function ($value) {

    if (is_numeric($value)) {
        return "Number detected";
    }

    return "String detected";
});

// reverse text:
Route::get('/reverse/{text}', function ($text) {
    return strrev($text);
});


// example:
Route::get('/shop/{category}/{pdId}', function($category, $pdId){
    return "Category: $category, Product id: $pdId";
})->where('pdId', '[0-9]+');


// passing data to views:
// M1: using an array:
Route::get('/views', function(){
    return view('data',[
    'name' => 'XYZ'
    ]);
});

// M2: Compact()
Route::get('/profile', function(){
    $name = "ABC";
    $age =  21;

    return view('profile', compact('name', 'age'));
});



// Passing arrays to views and route parameters:
Route::get('/arrays/{id}', function($id){
    $users = ["ABC", "XYZ", "MNO"];

    return view('array', compact('users', 'id'));
});
?>