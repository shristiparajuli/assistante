@extends('layouts.app')
@section('content')
<div class="container" style="width:100%;height:100vh;display:flex; justify-content:center;align-items:center">
    {!! Form::model($user,['route'=>['profile.update',$user->id],'method'=>'POST','files'=>true]) !!}
    @csrf
    @method('PATCH')
    <label for="address">Address</label>
<input type="text" value="{{$user->profile->address}}" id="address" class="form-control" name="address">
    <label for="phone">Phone</label>
    <input type="text" value="{{$user->profile->phone}}" id="phone" class="form-control" name="phone">
<label for ="image">Profile Image </label>
{{-- mistakeeeee --}}
{{-- paila yo thyo --}}
{{-- yo tala ko line mistake thyo eh eh lol yeahhh aayo ni image see that? leave everythigne else naam aayo ni image ko yupppp--}}
{{-- <input type="file" image="image" image="image"> --}}

<input type="file" name="image" id="image">

<input type="submit" value="submit" class="btn btn-primary">
    {!! Form::close() !!}
</div>
@endsection
