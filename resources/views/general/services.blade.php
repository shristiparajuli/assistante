@extends('layouts.app')
@section('content')
<section
      class="breadcrumbs-section mt-90 pt-180 pb-180 bg_cover"
      style="background-image: url(assets/images/breadcrumbs.jpg);"
    >
      <div class="container">
        <div class="breadcrumbs-text">
          <h1>Services</h1>
          <ul>
            <li><a href="index.html">Home</a></li>
            <li>Services</li>
          </ul>
        </div>
      </div>
    </section>

    <!--====== SERVICE PART START ======-->
    <section class="services-area services-area-two pb-130">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-lg-8">
            <div class="section-title text-center">
              <img src="assets/images/item.png" alt="" />
              <h2 class="title">
                Provide Worldwide Service For Good Customers
              </h2>
              <span>What We Do</span>
            </div>
          </div>
        </div>
        <div class="row justify-content-center">
            @foreach($services as $service)
          <div class="col-lg-4 col-md-6 col-sm-8">
            <div class="services-item services-item-2 text-center mt-30">
              <div class="services-thumb">
                {{-- <i class="flaticon-property"></i> --}}
              <img src="/storage/uploads/services/{{$service->image}}" style="height:100%;width:100%;object-fit:cover;border-radius:50%;"alt="">
              </div>
              <div class="services-content">
              <h4 class="title">{{$service->name}}</h4>
                <p>
                  {{substr(strip_tags($service->description),0,30)}}{{--yesle chai 1st 12 characters extract garxa k--}}
                  {{strlen(strip_tags($service->description))>30?"...":""}}{{--yesle chai aba total description 12 characters vanda dherai xa vane ... haldinxa natra kei gardai nehaeh lol--}}
                </p>
            <a href="{{route('services.show',$service->id)}}">Read More <i class="flaticon-add"></i></a>
              </div>
            </div>
          </div>
          @endforeach
        </div>
      </div>
    </section>
    <!--====== SERVICE PART ENDS ======-->
    <!--====== FAQ PART START ======-->

    <!--====== FOOTER PART ENDS ======-->
    <!--====== GO TO TOP PART START ======-->
    <div class="go-top-area">
      <div class="go-top-wrap">
        <div class="go-top-btn-wrap">
          <div class="go-top go-top-btn">
            <i class="fal fa-angle-double-up"></i>
            <i class="fal fa-angle-double-up"></i>
          </div>
        </div>
      </div>
    </div>
    @include('partials._footer')
@endsection
