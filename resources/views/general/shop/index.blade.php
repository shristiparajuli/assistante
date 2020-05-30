@extends('layouts.app')
@section('content')

<section class="breadcrumbs-section mt-90 pt-180 pb-180 bg_cover"
    style="background-image: url(assets/images/breadcrumbs.jpg);">
    <div class="container">
        <div class="breadcrumbs-text">
            <h1>Our Shop</h1>
            <ul>
                <li><a href="index.html">Home</a></li>
                <li><a href="index.html">Pages</a></li>
                <li>shop</li>
            </ul>
        </div>
    </div>
</section>
<!--====== SHOP PART START ======-->
<section class="shop-wrapper pt-130 pb-130">
    <div class="container">
        <div class="pagination-wrap text-center mt-30">
            {!!$products->links()!!}
        </div>
        <div class="shop-loop">
            <div class="row">
                @foreach ($products as $product)
                <div class="col-lg-3 col-md-4 col-sm-6">
                    <div class="product-items">
                        <div class="product-img">
                            <img src="/storage/uploads/products/{{$product->image}}" alt="Product">
                            <div class="product-action">
                                <ul>
                                    <li><a href="{{route('product.getSingle',$product->id)}}"><i class="fas fa-search"></i></a></li>
                                <li>
                                    {!! Form::open(['route'=>['productCart.add',$product->id],'method'=>'post']) !!}
                                        <button><i class="fas fa-shopping-cart"></i></button>
                                    {!! Form::close() !!}
                                </li>
                                </ul>
                            </div>
                        </div>
                        <h6 class="title"><a href="single-product.html">{{$product->name}}</a></h6>
                        <span class="price-tag">Rs {{$product->price}}</span>
                    </div>
                </div>
                @endforeach
                {{-- <div class="col-lg-3 col-md-4 col-sm-6">
                    <div class="product-items">
                        <div class="product-img">
                            <img src="assets/images/product-1.jpg" alt="Product">
                            <div class="product-action">
                                <ul>
                                    <li><a href="#"><i class="fas fa-search"></i></a></li>
                                    <li><a href="#"><i class="fas fa-shopping-cart"></i></a></li>
                                    <li><a href="#"><i class="far fa-heart"></i></a></li>
                                </ul>
                            </div>
                        </div>
                        <h6 class="title"><a href="single-product.html">Detergent Spray Bottle</a></h6>
                        <span class="price-tag">$26.50</span>
                    </div>
                </div> --}}

            </div>
        </div>

    </div>
</section>

@endsection
