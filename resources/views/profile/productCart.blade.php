@extends('layouts.app') @section('stylesheets')
<link rel="stylesheet" href="{{asset('assets/css/cart.css')}}" />
@endsection @section('content')

<div
    class="cart-body"
    style="background-image:url('{{asset('assets/images/service-bg.jpg')}}'); width:100vw; height:100vh;"
>
    <div class="cart-container">
        <div class="profile-info">
            <div class="profile-img">
                <img src="logo.png" alt="" />
            </div>
            <div class="profile-name">
                <h2>
                    <a href="{{route('profile.index',auth()->user()->id)}}"
                        >{{auth()->user()->name}}</a
                    >
                </h2>
            </div>
        </div>
        <div class="cart-items">
            <table class="table">
                <thead class="font-weight-bold">
                    <tr>
                        <th><h5 class="text-black">#</h5></th>
                        <th><h5 class="text-black">Product Image</h5></th>
                        <th><h5 class="text-black">Product Name</h5></th>
                        <th><h5 class="text-black">Product Price</h5></th>
                        <th><h5 class="text-black">Quantity</h5></th>
                        <th><h5 class="text-black">Remove</h5></th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                $count = 1;
                $total=0;

            ?>
                @if(session('cart'))
                    @foreach (session('cart') as $id=>$item)

                    <tr>
                        <td style="vertical-align: middle;">
                            <h6>{{$count}}</h6>
                        </td>
                        <td>
                            <div
                                class="img"
                                style="
                                    width: 100px;
                                    height: 100px;
                                    border-radius: 50%;
                                "
                            >
                                <img
                                    src="/storage/uploads/products/{{$item['image']}}"
                                    style="
                                        height: 100%;
                                        width: 100%;
                                        object-fit: cover;
                                        border-radius: 50%;
                                        box-shadow: 0 0 6px 0 grey;
                                    "
                                    alt=""
                                />
                            </div>
                        </td>

                        <td style="vertical-align: middle;">
                            <h6>{{$item['name']}}</h6>
                        </td>
                        <td style="vertical-align: middle;">
                            <h6>{{$item['price']}}</h6>
                        </td>
                        <td
                            style="vertical-align: middle;"
                            class="d-flex align-items-center mt-4"
                        >
                            <a
                                href="{{route('product.decQuantity',$item['id'])}}"
                                class="text-white btn-sm btn-danger mr-3 rounded-circle"
                                ><i class="fas fa-minus"></i
                            ></a>
                            <h6>{{$item['quantity']}}</h6>
                            <a
                                href="{{route('product.incQuantity',$item['id'])}}"
                                class="text-white btn-sm btn-success ml-3 rounded-circle"
                                ><i class="fas fa-plus"></i
                            ></a>
                        </td>
                        <td style="vertical-align: middle;">
                        <a href="{{route('productCart.remove',['id'=>$item['id']])}}"><i class="fas fa-trash-alt"></i></a>
                        </td>
                    </tr>
                    <?php $count++ ?>
                    <?php $total = $total + $item['price']*$item['quantity'];?>
                    @endforeach
                    @endif
                </tbody>
            </table>
        </div>
        <div class="d-flex flex-row align-items-center" style="width:100%; justify-content:space-between">
            <span class="font-weight-bold">Total: {{$total}}</span>
            <span  class="btn btn-success" data-toggle="modal" data-target="#exampleModal">Checkout</span>
        </div>
    </div>

    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Bill for {{auth()->user()->name}}</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
                Pay Rs {{$total}} from your bank?
            </div>
            <div class="modal-footer">
              <span class="btn btn-danger"  data-dismiss="modal">Cancel</span>
                <a href="{{route('product.bill')}}"class="btn btn-success">Buy These Items</a>
            </div>
          </div>
        </div>
      </div>

</div>

@endsection @section('scripts')
<script
    src="https://kit.fontawesome.com/7b32ce4356.js"
    crossorigin="anonymous"
></script>
@endsection
