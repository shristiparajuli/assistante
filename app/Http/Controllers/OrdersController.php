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
           session()->flash('success','Item Added');
           return redirect()->route('cart.index',$curr_user);

        }
        else{
            session()->flash('success','Item Already in Cart');
            return redirect()->route('cart.index',$curr_user);
        }
    }
}
