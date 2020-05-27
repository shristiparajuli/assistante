@extends('layouts.app')
@section('content')

{{-- ill clean the code hai ekxin --}}
<section class="single-product-wrapper" style="position: absolute;top:50%;left:50%;transform:translate(-50%,-50%)">
    <div class="container" style="margin-top:70px;">
        <div class="product-main-slider mb-55">
            <div class="row">
                {{-- <div class="col-lg-2 col-md-3 order-2 order-md-1">
                    <div class="gallery-dots"></div>
                </div> --}}
                <div class="col-lg-6 col-md-9 order-1 order-md-2">
                    <div class="gallery-slide-wrap">
                        {{-- <div class="gallery-arrows"></div> --}}
                        <div class="gallery-slider">
                            <div class="single-slider" >
                                 {{-- <a href="assets/images/product-single.jpg" class="image-popup"> --}}
                                    @if($user->profile->image)
                                    <img src="/storage/uploads/profile/{{$user->profile->image}}" alt="Images">
                                    @else
                                    <img src="{{asset('img/avatar.png')}}" alt="Images">
                                    @endif
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 order-3">
                    <div class="short-desc-wrap">
                        <h4 class="title">{{$user->name}}</h4>
                        <div class="divider"></div>
                            <form>
                                <div class="quantity-area d-flex align-items-center">
                                    <label for="quantity">Cart: </label>
                                    <a href="{{route('cart.index',$user->id)}}" class="ml-5 main-btn main-btn-2 add-to-cart d-flex align-items-center p-3">
                                        <i class="fas fa-shopping-cart"></i>


                                        <h6 class="stock-availity ml-2 text-white">{{$orders->count()}}</h6>
                                    </a>

                                </div>
                            </form>
                        <div class="divider"></div>
                        <div class="product-meta">
                             <ul>
                                <li>
                                    <span class="title">Email:</span>
                                    <span>{{$user->email}}</span>
                                </li>
                                <li>
                                    <span class="title">Address:</span>
                                    <span>{{$user->profile->address ?? 'Address not Available' }}</span>
                                </li>
                                <li>
                                     <span class="title">Phone:</span>
                                     <span>{{$user->profile->phone ?? 'Phone not Available'}}</span>
                                </li>
                            </ul>
                        </div>
                        <div class="product-btn mt-45">
                            <a href="{{route('profile.edit',$user->id)}}" class="main-btn main-btn-2 add-to-cart">Edit My Profile</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
{{-- done --}}

{{-- </div> --}}
@endsection

