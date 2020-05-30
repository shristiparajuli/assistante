@extends('layouts.admin')
@section('content')
<div class="container" style="position:absolute;top:50%;left:50%;transform:translate(-50%,-50%);">
    {!! Form::model($product,['route'=>['products.update',$product->id],'method'=>'POST','files'=>true]) !!}
@method('PATCH')
    <div class="form-group">
        <label for="name" class="text-light"> Product Name</label>
    <input type="text" name="name" id="name" class="form-control"  value="{{$product->name}}">
    </div>

    <div class="form-group">
        <label for="price" class="text-light"> Price</label>
        <input type="text" name="price" id="price" class="form-control" value="{{$product->price}}" >

    </div>

    <div class="form-group">
        <label for="description" class="text-light"> Description </label>
        <textarea name="description" id="description" class="form-control" > {{$product->description}} </textarea>
    </div>

    <div class="form-group">
        <label for="image" class="btn btn-warning"> Choose Product Image </label>

        <input type="file" name="image" id="image" class="form-control d-none">

    <div class="form-group">
        <input type="submit" value="Update Product" class="btn btn-primary">
    </div>

    {!! Form::close() !!}

</div>
@endsection
