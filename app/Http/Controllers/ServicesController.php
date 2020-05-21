<?php

namespace App\Http\Controllers;
use App\Services;
use Illuminate\Http\Request;
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
        //
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
        ['name'=>'required',
        'description'=>'required',
        'image'=>'image'
        ]);
        $service = new Service;
        $service->name = $request->name;
        $service->description = $request->description;

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
        return redirect()->route('admin.index');
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
