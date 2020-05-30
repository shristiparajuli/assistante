<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Order;
use App\Product;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Input;
class ProfileController extends Controller
{

    public function __construct()
    {
        return $this->middleware('auth');
    }
    public function index(User $user){
        $this->authorize('update',$user->profile);
        $orders=Order::where(['user_id'=>$user->id])->get();
        return view('profile.index')->withUser($user)->withOrders($orders);

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

        $orders=Order::where(['user_id'=>$user->id])->latest()->get();
        return view('profile.cart')->withOrders($orders);

    }
    public function deleteItem(Order $order){
        $order->delete();
        return redirect()->back();
    }
    public function productCart(User $user){
        return view('profile.productCart');

    }
    public function addItemToCart(Request $request, $id){
        $product = Product::find($id);
        $quantity = 1;
        // dd($request->input('quantity'));
        if($request->input('quantity')){
            $quantity = $request->input('quantity');
        }

        // dd($quantity);
        $cart = session()->get('cart');
        if(!$cart){
            $cart = [
                $id =>[
                        "id"=>$product->id,
                        "name"=>$product->name,
                        "description"=>$product->description,
                        "price"=>$product->price,
                        "image"=>$product->image,
                        "quantity"=>1
                    ]
                ];
            session()->put('cart',$cart);
            return redirect()->route('productCart.index',auth()->user()->id);


        }
        $cart[$id]= [
            "id"=>$product->id,
            "name"=>$product->name,
            "description"=>$product->description,
            "price"=>$product->price,
            "image"=>$product->image,
            "quantity"=>$quantity
        ];
        session()->put('cart',$cart);
        return redirect()->route('productCart.index',auth()->user()->id);

    }
    public function removeItemFromCart(Request $request){
        if($request->id){
            $cart=session()->get('cart');
            if(isset($cart[$request->id])){
                unset($cart[$request->id]);
                session()->put('cart',$cart);
            }
        }
        return redirect()->route('productCart.index',auth()->user()->id);

    }
    public function incQuantity($id){
        $product =Product::find($id);
        $cart= session()->get('cart');
        $cart[$id]['quantity']++;
        session()->put('cart',$cart);
        return redirect()->route('productCart.index',auth()->user()->id);


    }
    public function decQuantity($id){
        $product =Product::find($id);
        $cart= session()->get('cart');

        if($cart[$id]['quantity']>1){
            $cart[$id]['quantity']--;
            session()->put('cart',$cart);
        }
        return redirect()->route('productCart.index',auth()->user()->id);


    }
    public function bill(){
        return view('profile.bill');
    }
}
