<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Order;
class AdminController extends Controller
{
    public function index(){
        return view('admin.index');
    }

    public function orders(){
        $orders = Order::all();

        return view('admin.orders.index')->withOrders($orders);
    }

    public function deleteOrder(Order $order){
        $order->delete();
        return redirect()->back();

    }
}
