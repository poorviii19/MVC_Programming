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


    public function showPincodeForm()
    {
        return view('pincode');
    }

    public function submitPincode(Request $request)
    {
        $request->validate([
            'pincode' => 'required|numeric|digits:6'
        ], [
            'pincode.required' => 'Pincode field is required.',
            'pincode.numeric' => 'Pincode must contain only numbers.',
            'pincode.digits' => 'Pincode must contain exactly 6 digits.'
        ]);

        return "Pincode Submitted Successfully";
    }
}
