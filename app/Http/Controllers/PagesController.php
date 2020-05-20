<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function welcome(){
        return view('general.welcome');
    }

    public function about(){
        return view('general.about');
    }

    public function contact(){
        return view('general.contact');
    }

    public function services(){
        return view('general.services');
    }
}
