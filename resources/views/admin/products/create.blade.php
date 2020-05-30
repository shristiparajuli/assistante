@extends('layouts.admin')
@section('content')
<div class="container" style="position:absolute;top:50%;left:50%;transform:translate(-50%,-50%);">
    {!! Form::open(['route'=>'products.store','method'=>'POST','files'=>true]) !!}
    <div class="form-group">
        <label for="name" class="text-light"> Product Name</label>
        <input type="text" name="name" id="name" class="form-control">
    </div>

    <div class="form-group">
        <label for="price" class="text-light"> Price</label>
        <input type="text" name="price" id="price" class="form-control">
    </div>

    <div class="form-group">
        <label for="description" class="text-light"> Description </label>
        <textarea name="description" id="description" class="form-control"></textarea>
    </div>

    <div class="form-group">
        <label for="image" class="btn btn-warning"> Choose Product Image </label>

        <input type="file" name="image" id="image" class="form-control d-none">

    <div class="form-group">
        <input type="submit" value="Add Product" class="btn btn-primary">
    </div>

    {!! Form::close() !!}

</div>
@endsection
