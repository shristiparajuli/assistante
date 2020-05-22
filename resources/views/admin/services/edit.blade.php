@extends('layouts.admin')
@section('content')
<div class="container" style="width:100%;height:100vh;display:flex; justify-content:center;align-items:center">
    {!! Form::model($service,['route'=>['services.update',$service->id],'method'=>'POST','files'=>true]) !!}
    @csrf
    @method('patch')
{{-- lol files true na vai submit garera yeto vako raixa
    image file ho ni ta so we ned to explicitly say form ma file ni jadai xa vanera
    i thing thats the proble,
    --}}
    <label for="name">Service Name</label>
<input type="text" name="name" id="name" class="form-control" value="{{$service->name}}">

<label for="description">Service Description</label>
<textarea id="description" name="description" rows="4" cols="50" class="form-control"> {{$service->description}} </textarea>

<label for="image">Service Image</label>
<input type="file" name="image" id="image">

<input type="submit" value="Submit" class="btn btn-primary">

 {!! Form::close() !!}
</div>

@endsection
