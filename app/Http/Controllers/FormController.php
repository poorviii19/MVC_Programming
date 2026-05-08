<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FormController extends Controller
{
    //

    public function showForm(){
        return view('form');
    }

    public function submitFrom(Request $request){

        // print_r($request->all());
        $request->validate([
            'name'=>'required',
            'email'=>'required|email',
            'password'=>'required|min:6'
        ]);
        return "Form Submitted successfully";
    }
}
