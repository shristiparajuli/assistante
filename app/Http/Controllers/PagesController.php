<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Service;

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
        $services = Service::latest()->get();
        return view('general.services')->withServices($services);
    }

    public function singleServices(Service $service){
        return view('general.single_service')->withService($service);
    }
}
