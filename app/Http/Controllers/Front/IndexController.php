<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;

class IndexController extends Controller
{
    public function index(){
        //dd(5);
       return view('front.index');
    }
}
