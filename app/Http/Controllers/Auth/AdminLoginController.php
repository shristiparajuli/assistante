<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;

class AdminLoginController extends Controller
{
    public function __construct(){
        $this->middleware('guest');
    }
   public function showLogin(){
       return view('admin.login');
   }
   public function login(Request $request){
    $this->validate($request,['email'=>'required|email','password'=>'required']);
    $check_login=Auth::guard('admin')->attempt(['email'=>$request->email,'password'=>$request->password]);
    if($check_login){
        return redirect()->intended(route('admin.index'));
    }
    else{
        return redirect()->back()->withInput($request->only('email'));

    }
   }
}
