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



// Sharing of data with all views:

//refer AppServiceProvider
Route::get('/prac', function(){
    return view('prac');
});

// Headers: Extra Meta data
//tell the browser things like:

// what type of content it is
// caching rules
// authentication info
// custom data

//Responses: Attaching headers: basic syntax
Route::get('/head', function(){
    return response('Hello laravel')
    ->header('Content-Type', 'text/plain');
});

// Multiple Headers:
Route::get('/multi', function(){
    return response("Custom Header")
    ->header('Content-Type', 'text/plain')
    ->header('X-App-name', 'MyLaravelApp')
    ->header('X-version', '1.0');
});


// Headers with Views:
Route::get('/header', function(){
    return response()
    ->view('welcome')
    ->header('Cache-Control' , 'no-cache');
});

Route::get('/ViewsHead', function(){
    return response()
    ->view('welcome')
    ->header('X-app-name', 'Viewheader');
});

// redirect with Headers:
Route::get('/redirect', function(){
    return redirect('/ViewsHead')
    ->header('X-redirect-reason','Page moved permanently');
});


// API style responses:
Route::get('/api/user', function(){
    return response() -> json([
        'name' => 'XYZ',
        'role'=> 'Student',
    ])
    ->Header('X-Powered-By', 'Laravel');
});


Route::get('/api/students', function(){
    return response()->json([
        'name' => 'ABC',
        'Role'=>'Student',
    ])->Header('Json-Data','laravel');
});

// example:
Route::get('/info', function(){
    return response()
    ->view('home')
    ->header('X-App-Name', 'My-laravel_App');
});

Route::get('/json-data', function(){
    return response()->json([
        'name'=>'ABC',
        'age'=>'24',
        'dept'=>'CSE',
    ])->header('X-Source','API')
    ->header('Cache-Control', 'not-cached');
});



Route::get('/multihead', function () {
    return response('OK')->withHeaders([
        'Custom1' => 'ABC',
        'Custom2' => 'NOP',
        'Custom3' => 'XYZ',
    ]);
});


// Responses -> atatching cookies:
// A cookie is:
// Key-value data stored in the browser and automatically sent to the server.

// setting cookies:
// basic syntax:
ROute::get('/setCookie', function(){
    return response('Cookie is set')
    ->cookie('name','ABC',40);
});

use Illuminate\Http\Request;

Route::get('/getCookie', function(request $request){
    return $request->cookie('name');
});

Route::get('/multi-cookie', function () {
    return response('Multiple cookies set')
        ->cookie('user', 'Haina', 60)
        ->cookie('role', 'student', 60)
        ->cookie('theme', 'dark', 60);
});


Route::get('/getCookies', function(Request $request){
    return [
        'user'  => $request->cookie('user'),
        'role'  => $request->cookie('role'),
        'theme' => $request->cookie('theme'),
    ];
});

Route::get('/getCookiess', function (Request $request) {
    return $request->cookies->all();
});


// using cookie facades

use Illuminate\Support\Facades\Cookie;

Route::get('/cookie-facade', function () {
    Cookie::queue('city', 'India', 60);

    return response('Cookie queued');
});

Route::get('/get', function () {
    return Cookie::get('city');
});


// deleting cookie
Route::get('/delete', function () {
    Cookie::queue(Cookie::forget('name'));

    return "Cookie deleted";
});


Route::get('/delete-cookie', function () {
    return response('Cookie deleted')
        ->cookie('city', '', -1);
});
// response()->cookie() → direct response
// Cookie::queue()     → global / flexible
// Cookie::get()       → read cookie
// Cookie::forget()    → delete cookie
?>