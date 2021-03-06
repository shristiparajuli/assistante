@extends('layouts.admin')
@section('stylesheets')
<style>
.table-container{
    height:400px;
    overflow-y:scroll;
    border:1px solid red;
}
</style>
@endsection
@section('content')
<div class="container flex-column" style="width:100%;height:100vh;display:flex; justify-content:center;align-items:center">
    <div class="row d-flex align-items-center p-5 w-100" style="justify-content:space-around">

        <h1 class="text-light"> All Services </h1>
        <a href="{{route('services.create')}}" class="btn btn-primary"> Create a New Service </a>
    </div>
    <div class="table-container">
        <table class="table">
            <thead>
                <th> #</th>
                <th> Image </th>
                <th> Name </th>
                <th> Description </th>
                <th> Price </th>
                <th> Action </th>
            </thead>
            <tbody>

                @foreach($services as $service)
                <tr>
                    <td> {{$service->id}}</td>
                    <td>
                        <div class="img" style="width:100px;height:100px;border-radius:50%">
                            <img src="/storage/uploads/services/{{$service->image}}" style="height:100%;width:100%;object-fit:cover;border-radius:50%;box-shadow:0 0 6px 0 grey;"alt="">
                        </div>
                    </td>
                    <td> {{$service->name}} </td>
                    <td>
                        {{substr(strip_tags($service->description),0,30)}}
                        {{strlen(strip_tags($service->description))>30?"...":""}}
                    </td>
                    <td> {{$service->price}}</td>
                    <td>
                        <div class="btn-group d-flex align-items-center">
                            <a href="{{route('services.edit',$service->id)}}" class="btn btn-warning">Edit this Service</a>
                            {!! Form::open(['route'=>['services.destroy',$service->id],'method'=>'post']) !!}
                                @method('DELETE')
                                <input type="submit" value="Delete" class="btn btn-danger">
                            {!! Form::close() !!}
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
