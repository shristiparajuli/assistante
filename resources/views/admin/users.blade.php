@extends('layouts.admin')
@section('content')
<div class="container" style="position:absolute;top:50%;left:50%;transform:translate(-50%,-50%);">
    {!!$users->links()!!}
    <table class="table">
        <thead>
            <tr>
                <th>#</th>
                <th>Profile Image</th>
                <th>User Name</th>
                <th>Email</th>
                <th>User Address</th>
                <th>User Phone</th>
            </tr>
        </thead>

        <tbody>
            @foreach($users as $user)
            <tr>
                <td>{{$user->id}}</td>
                <td>
                <div style="height:100px;width:100px;border-radius:50%">
                    @if($user->profile->image)
                        <img src="/storage/uploads/profile/{{$user->profile->image}}" alt="Images" style="height:100%;width:100%;object-fit:cover;border-radius:50%">
                    @else
                        <img src="{{asset('img/avatar.png')}}" alt="Images" style="height:100%;width:100%;object-fit:cover;border-radius:50%">
                    @endif
                    {{-- <img src="/storage/uploads/profile/{{$user->profile->image}}" alt="" style="height:100%;width:100%;object-fit:cover;border-radius:50%"> --}}
                </div>
                </td>
                <td>{{$user->name}}</td>
                <td>{{$user->email}}</td>
                <td>{{$user->profile->address}}</td>
                <td>{{$user->profile->phone}}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>


@endsection
