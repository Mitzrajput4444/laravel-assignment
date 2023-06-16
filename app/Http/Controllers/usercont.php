<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class usercont extends Controller
{
    public function home(){
        return view('home');
    }
    public function about(){
        return view('about');
    }
    public function contact(){
        return view('contact');
    }
    public function gallery(){
        return view('gallery');
    }
    public function checkAge(){
        echo "Id:123456";
    }
   
}

