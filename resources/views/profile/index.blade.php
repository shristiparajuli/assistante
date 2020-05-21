@extends('layouts.app')
@section('content')
<div class="container" style="position: absolute;top:50%;left:50%;transform:translate(-50%,50%);">
    <a class="btn btn-primary" href="{{route('profile.edit',$user->id)}}">Edit My Profile</a>
    <div class="image" style="height:100px;width:100px">
        @if(!($user->profile->image))
    <img src="{{asset('img/avatar.png')}}" style="height:100%;width:100%;object-fit:cover;border-radius:50%;box-shadow:0 0 6px 0 grey;" alt="">
        @else
        <img src="/storage/uploads/profile/{{$user->profile->image}}" style="height:100%;width:100%;object-fit:cover;border-radius:50%;box-shadow:0 0 6px 0 grey;"alt="">
        @endif
    </div>
    <ul>
    <li>User Name:{{$user->name}}</li>
        <li>User Email:{{$user->email}}</li>
        <li>User Phone Number:{{$user->profile->phone}}</li>
        <li>User Address:{{$user->profile->address}}</li>
    </ul>
</div>
@endsection

