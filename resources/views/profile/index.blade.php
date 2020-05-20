@extends('layouts.app')
@section('content')
<div class="container" style="position: absolute;top:50%;left:50%;transform:translate(-50%,50%);">
    <a class="btn btn-primary" href="{{route('profile.edit',$user->id)}}">Edit My Profile</a>
    <ul>
    <li>User Name:{{$user->name}}</li>
        <li>User Email:{{$user->email}}</li>
        <li>User Phone Number:{{$user->profile->phone}}</li>
        <li>User Address:{{$user->profile->address}}</li>
    </ul>
</div>
@endsection

