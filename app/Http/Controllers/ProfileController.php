<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
class ProfileController extends Controller
{

    public function __construct()
    {
        return $this->middleware('auth');
    }
    public function index(User $user){
        //yaha $user yo user xa ni name this name matches with web.php ma agi {} ma lekheko user
        // so tye vaera laravel le aafai user khojxa k ko user ho vanera
        // yo function ma pass gareko variable name ani route le pathaune variable name same vaera
        //so we can simply pass user view ma
        return view('profile.index')->withUser($user);
    }
    public function edit(User $user){
        $this->authorize('update',$user->profile);
        return view('profile.edit')->withUser($user);;
    }
    public function update(Request $request , User $user){
        $this->authorize('update',$user->profile);
        $this->validate($request,['phone'=>'required|integer','address'=>'required']);
        $user->profile->phone=$request->input('phone');
        $user->profile->address=$request->input('address');
        $user->profile->save();
        return redirect()->route('profile.index',$user->id);
    }
}
