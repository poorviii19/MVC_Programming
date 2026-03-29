<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
}
