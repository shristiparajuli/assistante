@extends('layouts.app')
@section('stylesheets')
<link rel="stylesheet" href="{{asset('assets/css/cart.css')}}">
@endsection
@section('content')

<div class="cart-body" style="background-image:url('{{asset('assets/images/service-bg.jpg')}}'); width:100vw; height:100vh;">

<div class="cart-container">
    @if (count($orders)==0)
    <h1>You Have not Ordered anything.</h1>
@else
    <div class="profile-info">
      <div class="profile-img">
        <img src="logo.png" alt="" />
      </div>
      <div class="profile-name">
      <h2><a href="{{route('profile.index',auth()->user()->id)}}">{{auth()->user()->name}}</a></h2>
      </div>
    </div>
    <div class="cart-items">
      <table class="table">
        <thead class="font-weight-bold">
          <tr>
            <th><h5 class="text-black">#</h5></th>
            <th><h5 class="text-black">Service Image</h5></th>
            <th><h5 class="text-black">Service Name</h5></th>
            <th><h5 class="text-black">Service Price</h5></th>
            <th><h5 class="text-black">Remove</h5></th>
          </tr>
        </thead>
        <tbody>
            <?php $count = 1;?>
            @foreach ($orders as $order)
            <tr>
                <td style="vertical-align:middle"><h6>{{$count}}</h6></td>
                <td>
                    <div class="img" style="width:100px;height:100px;border-radius:50%">
                        <img src="/storage/uploads/services/{{$order->service->image}}" style="height:100%;width:100%;object-fit:cover;border-radius:50%;box-shadow:0 0 6px 0 grey;"alt="">
                    </div>
                </td>
                <td style="vertical-align:middle"><h6>{{$order->service->name}}</h6></td>
                <td style="vertical-align:middle"><h6>{{$order->service->price}}</h6></td>
                <td style="vertical-align:middle">
                    {!! Form::open(['route'=>['cart.delete',$order->id],'method'=>'post']) !!}
                        @method('DELETE')
                        <button><i class="fas fa-trash-alt"></i></button>
                    {!! Form::close() !!}
                </td>
              </tr>
              <?php $count++ ?>
            @endforeach


        </tbody>
      </table>
    </div>
  </div>
  @endif
</div>

@endsection
@section('scripts')
<script src="https://kit.fontawesome.com/7b32ce4356.js"crossorigin="anonymous"></script>
@endsection
