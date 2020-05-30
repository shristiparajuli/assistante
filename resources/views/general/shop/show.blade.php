@extends('layouts.app')
@section('content')



    <!--====== SINGLE PRODUCT PART START ======-->
    <section class="single-product-wrapper " style="position: absolute;top:50%;left:50%;transform:translate(-50%,-50%);margin-top:100px">
        <div class="container">
            <div class="product-main-slider mb-55">
                <div class="row">
                    <div class="col-lg-6 col-md-9 order-1 order-md-2">
                        <div class="gallery-slide-wrap">
                            <div class="gallery-slider">
                                <div class="single-slider" >
                                        <img src="/storage/uploads/products/{{$product->image}}" alt="Images">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 order-3">
                        <div class="short-desc-wrap">
                            <h4 class="title">{{$product->name}}</h4>
                        <p class="price-tag">Rs {{$product->price}} /-</p>
                        <p class="short-desc"> {{$product->description}}</p>
                            <div class="divider"></div>
                            {!! Form::open(['route'=>['productCart.add',$product->id],'method'=>'post']) !!}
                                <div class="quantity-area d-flex align-items-center">
                                    <label for="quantity">Quantity: </label>
                                    <div class="quantity-input">
                                        <div class="quantity-down" id="quantityDown">
                                            <i class="fa fa-angle-left"></i>
                                        </div>
                                        <input id="quantity" type="number" value="1" name="quantity">
                                        <div class="quantity-up" id="quantityUP">
                                            <i class="fa fa-angle-right"></i>
                                        </div>
                                    </div>
                                </div>
                                <div class="divider"></div>
                                <div class="product-btn mt-45">
                                        <button class="main-btn main-btn-2 add-to-cart">Add to Cart</a>
                                </div>
                                {!! Form::close() !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
