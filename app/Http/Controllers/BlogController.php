<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BlogController extends Controller
{
    //
    public function getBlog(){
        $blog = [
            ['Title'=>'Air Pollution', 'Author'=>'Anthony', 'Content'=> 'Air Pollution is Hazardous to health'],
            ['Title'=>'Water Pollution', 'Author'=>'John', 'Content'=> 'Water Pollution is is very harmful'],
            ['Title'=>'Noise Pollution', 'Author'=>'Rachel', 'Content'=> 'Noise Pollution is Hazardous to ears']
        ];

        return view('post.index', compact('blog'));
    }
}
