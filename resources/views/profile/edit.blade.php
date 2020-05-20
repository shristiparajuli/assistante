@extends('layouts.app')
@section('content')
<div class="container" style="width:100%;height:100vh;display:flex; justify-content:center;align-items:center">
    {!! Form::model($user,['route'=>['profile.update',$user->id],'method'=>'POST']) !!}
    @csrf
    @method('PATCH')
    <label for="address">Address</label>
<input type="text" value="{{$user->profile->address}}" id="address" class="form-control" name="address">
    <label for="phone">Phone</label>
    <input type="text" value="{{$user->profile->phone}}" id="phone" class="form-control" name="phone">
<input type="submit" value="submit" class="btn btn-primary">
    {!! Form::close() !!}
</div>
@endsection
