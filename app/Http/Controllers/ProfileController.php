<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Order;
use Intervention\Image\Facades\Image;
class ProfileController extends Controller
{

    public function __construct()
    {
        return $this->middleware('auth');
    }
    public function index(User $user){
        $this->authorize('update',$user->profile);
        return view('profile.index')->withUser($user);
    }
    public function edit(User $user){
        $this->authorize('update',$user->profile);
        return view('profile.edit')->withUser($user);;
    }
    public function update(Request $request , User $user){
        $this->authorize('update',$user->profile);
        $this->validate($request,
        ['phone'=>'required|integer',
        'address'=>'required',
        'image'=>'image'
        ]);
        $user->profile->phone=$request->input('phone');
        $user->profile->address=$request->input('address');
        // dd($request);
      if($request->hasFile('image'))
        {
            $image = $request->file('image');
            $imageName=time() . '.' . $image->getClientOriginalExtension();
            $location = public_path('storage/uploads/profile/'.$imageName);
            // profile paxi / na vaera it thought that image ko name profile + $imageName halne. so profile ko bhitra na vako aba vitra auxa
            Image::make($image)->fit(1024,1024)->save($location);
            $user->profile->image = $imageName;
        }
        $user->profile->save();
        return redirect()->route('profile.index',$user->id);

    }
    public function cart(User $user){
        $this->authorize('update',$user->profile);
        $orders=Order::where(['user_id'=>$user->id])->get();
        return view('profile.cart')->withOrders($orders);

    }
}
