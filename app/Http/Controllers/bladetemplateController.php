<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class bladetemplateController extends Controller
{
    function blade1(){
        $name = "xyz";
        $users = ["abc", "bcd", "cde"];
        return view('blade1', ['name'=>$name, 'users'=>$users]);
    }


    function userHome(){
        return view('home');
    }

    function userAbout(){
        return view('abouts');
    }
}
