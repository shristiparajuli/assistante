<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Service;
use App\Product;

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

    public function showProduct(Product $product){
        return view('general.shop.show')->withProduct($product);
    }

    public function allProducts(){
        $products= Product::latest()->paginate(2);
        return view('general.shop.index')->withProducts($products);

    }
}
