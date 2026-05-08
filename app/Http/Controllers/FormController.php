<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Rules\checkUpperCase;

class FormController extends Controller
{
    //

    public function showForm(){
        return view('form');
    }

    public function submitFrom(Request $request){

        // print_r($request->all());
        $request->validate([
            'name'=>['required', new checkUpperCase],
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


    public function submitform1(Request $request) {
        // Validate the form data
        $validated = $request->validate([
            'uname' => 'required|string|min:3|max:8',
            'mail' => 'required|email',
            'password' => 'required|string|min:6'
        ], [
            'uname.required' => 'Username is required',
            'uname.min' => 'Username must be at least 3 characters',
            'uname.max' => 'Username must not exceed 8 characters',
            'mail.required' => 'Email is required',
            'mail.email' => 'Please enter a valid email address',
            'password.required' => 'Password is required',
            'password.min' => 'Password must be at least 6 characters'
        ]);
        
        // If validation passes, show success message
        return redirect('/formfinal')->with('success', 'Form submitted successfully! Thank you for contacting us.');
    }
}
