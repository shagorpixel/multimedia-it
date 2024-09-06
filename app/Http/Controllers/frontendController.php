<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class frontendController extends Controller
{
    public function home(){
        return view('website.home');
    }
    public function contact(){
        return view('website.contact');
    }
    public function service(){
        return view('website.service');
    }
}
