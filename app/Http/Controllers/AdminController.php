<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Order;
use App\User;
class AdminController extends Controller
{
    public function __construct(){
       return $this->middleware('auth:admin');

    }
    public function index(){
        return view('admin.index');
    }

    public function orders(){
        $orders = Order::latest()->paginate(5);

        return view('admin.orders.index')->withOrders($orders);
    }

    public function deleteOrder(Order $order){
        $order->delete();
        return redirect()->back();

    }

    public function users(){
        $users= User::latest()->paginate(5);
        return view('admin.users')->withUsers($users);
    }
}
