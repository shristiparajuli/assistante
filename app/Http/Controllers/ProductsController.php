<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use Intervention\Image\Facades\Image;
use Storage;
class ProductsController extends Controller
{
    public function __construct(){
        return $this->middleware('auth:admin');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $products = Product::latest()->paginate(5);
        return view('admin.products.index')->withProducts($products);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.products.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
                'name'=>'required',
                'description'=>'required',
                'price'=>'required|integer',
                'image'=>'required|image'
            ]);

            $product= new Product;
            $product->name= $request->name;
            $product->description = $request->description;
            $product->price = $request->price;

            if($request->hasFile('image'))
        {
            $image = $request->file('image');
            $imageName=time() . '.' . $image->getClientOriginalExtension();
            $location = public_path('storage/uploads/products/'.$imageName);
            Image::make($image)->fit(1024,1024)->save($location);
            $product->image = $imageName;
        }
        $product->save();
        return redirect()->route('products.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = Product::findOrFail($id);
        return view ('admin.products.edit')->withProduct($product);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'name'=>'required',
            'description'=>'required',
            'price'=>'required|integer',
            'image'=>'required|image'
        ]);

        $product=  Product::findOrFail($id);
        $product->name= $request->input('name');
        $product->description = $request->input('description');
        $product->price = $request->input('price');

        if($request->hasFile('image'))
    {
        $image = $request->file('image');
        $imageName=time() . '.' . $image->getClientOriginalExtension();
        $location = public_path('storage/uploads/products/'.$imageName);
        Image::make($image)->fit(1024,1024)->save($location);
        $oldImg = $product->image;
        Storage::delete($oldImg);
        $product->image = $imageName;
    }
    $product->save();
    return redirect()->route('products.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product=  Product::findOrFail($id);
        Storage::delete($product->image);
        $product->delete();
        return redirect()->route('products.index');

    }
}
