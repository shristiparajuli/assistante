<?php

namespace App\Http\Controllers;
use App\Service;
use Illuminate\Http\Request;
use Storage;
use Intervention\Image\Facades\Image;

class ServicesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $services=Service::orderBy('created_at','desc')->get();
        return view('admin.services.index')->withServices($services);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.services.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $this->validate($request,
        [
        'name'=>'required',
        'description'=>'required',
        'image'=>'image',
        'price'=>'required|integer'
        ]);
        $service = new Service;
        $service->name = $request->name;
        $service->description = $request->description;
        $service->price = $request->price;

        // dd($request);
      if($request->hasFile('image'))
        {
            $image = $request->file('image');
            $imageName=time() . '.' . $image->getClientOriginalExtension();
            $location = public_path('storage/uploads/services/'.$imageName);
            Image::make($image)->fit(1024,1024)->save($location);
            $service->image = $imageName;
        }
        $service->save();
        return redirect()->route('services.index');
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
        $service=Service::findOrFail($id);
        return view ('admin.services.edit')->withService($service);
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
        $this->validate($request,
        [
        'name'=>'required',
        'description'=>'required',
        'image'=>'image',
        'price'=> 'required|integer'
        ]);
        $service = Service::findOrFail($id);
        $service->name = $request->input('name');
        $service->description = $request->input('description');
        $service->price = $request->input('price');
        // dd($request);
      if($request->hasFile('image'))
        {
            $image = $request->file('image');
            $imageName=time() . '.' . $image->getClientOriginalExtension();
            $location = public_path('storage/uploads/services/'.$imageName);
            Image::make($image)->fit(1024,1024)->save($location);
            $old = $service->image;
            Storage::delete($old);
            $service->image = $imageName;
        }
        $service->save();
        return redirect()->route('services.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $service = Service::findOrFail($id);
        Storage::delete($service->image);
        $service->delete();
        return redirect()->route('services.index');
    }
}
