<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

// for checking view exists or not?
use Illuminate\Support\Facades\View;


//understanding controller, view and basic routing for them

class UserController extends Controller
{
    //calling controller
    function getUser(){
        return "Code Properly";
    }

    function aboutUser(){
        return "Hello, this is user profile";
    }

    // passing data in url

    function getUserName($name){
        return "My name is ". $name;
    }
    
    // calling view inside controller:
    function getUser1(){
        return view('user');
    }
        
    function getUserName1($name){
        echo "hello this is " .$name;

        return view('getUser', ['name'=>$name]);
     }

     function adminLogin(){
        return view('admin.login');
     }

     function student($name){
        return view('student',['user'=>$name]);
     }

     function adminLogin1(){
        if(View::exists('admin.sign'))
        {
        return view('admin.login');
        }else{
            return "view not found";
     }
    }
}