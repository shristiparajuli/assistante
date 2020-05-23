<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Service;
use App\Order;

class OrdersController extends Controller
{
    public function __construct(){
        return $this->middleware('auth');
    }
    public function store(Service $service){
        $curr_user = auth()->user()->id;
        $check = Order::where(['user_id'=>$curr_user,'service_id'=>$service->id])->get();
        if(count($check)==0){
           $order = new Order;
           $order->user_id= $curr_user;
           $order->service_id=$service->id;
           $order->save();
           return "Service Saved";
        }
        else{
            return "Already Ordered";
        }
    }
}
