@extends('layouts.admin')
@section('content')
<div class="container" style="width:100%;height:100vh;display:flex; justify-content:center;align-items:center">
    {!! Form::open(['route'=>'services.store','method'=>'POST']) !!}

    <label for="name">Service Name</label>
<input type="text" name="name" id="name" class="form-control">

<label for="description">Service Description</label>
<textarea id="description" name="description" rows="4" cols="50" class="form-control"> </textarea>

<label for="image">Service Image</label>
<input type="file" name="image" id="image">

<input type="submit" value="Submit" class="btn btn-primary">

 {!! Form::close() !!}
</div>

@endsection
