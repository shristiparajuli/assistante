@extends('layouts.app')



@section('stylesheets')
<link rel="stylesheet" href="{{asset('assets/css/swiper.min.css')}}">

<style>

    .swiper-container {
      width: 100%;
      height: 100%;
    }
  </style>
@endsection

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

        <section
        class="pricing-area pricing-area-two bg_cover pt-130 pb-100"
        style="background-image: url(assets/images/pricing-bg.jpg);"
      >
        <div class="container">
          <div class="row align-items-center">
            <div class="col-lg-12 col-sm-12">
              <div class="tab-content pricing-tab-content">
                <div
                  role="tabpanel"
                  class="tab-pane monthly-tab fade in active show"
                  id="monthly"
                >
                  <div class="row">
                    <div class="swiper-container">
                      <div class="swiper-wrapper">
                          @foreach($services as $service)
                        <div class="swiper-slide w-30">
                          <div class="single-pricing-box bg-white">
                          <h3 class="title">
                              {{$service->name}}</h3>
                            <div class="pricing-icon">
                                <img src="/storage/uploads/services/{{$service->image}}" style="height:100%;width:100%;object-fit:cover;border-radius:50%;"alt="">

                              {{-- <i class="flaticon-property"></i> --}}
                            </div>
                            {!! Form::open(['route'=>['book.store',$service->id]]) !!}
                                <input type="submit" value="Book Now" class="main-btn">
                            {!! Form::close() !!}
                           {{-- <a href="#" class="main-btn">Book Now</a> --}}

                            <p>
                                {{substr(strip_tags($service->description),0,30)}}
                                {{strlen(strip_tags($service->description))>30?"...":""}}
                                <a href="{{route('services.show',$service->id)}}" class="d-block">Read More>></a>
                            </p>
                        <span class="price-tag" style="font-size:2.5rem"> Nrs {{$service->price}} /-</span>
                          </div>
                        </div>
                        @endforeach
                      </div>
                      <!-- Add Pagination -->
                      <div class="swiper-pagination"></div>
                    </div>
                  </div>
                </div>

              </div>
            </div>
          </div>
        </div>
      </section>
    {{-- ill brb hai ekxin huss:)  --}}
    {{-- php artisan serve garya xauu? nopegara ta --}}


        {{-- <div class="row justify-content-center">
            @foreach($services as $service)
          <div class="col-lg-4 col-md-6 col-sm-8">
            <div class="services-item services-item-2 text-center mt-30">
              <div class="services-thumb">
              <img src="/storage/uploads/services/{{$service->image}}" style="height:100%;width:100%;object-fit:cover;border-radius:50%;"alt="">
              </div>
              <div class="services-content">
              <h4 class="title">{{$service->name}}</h4>
                <p>
                  {{substr(strip_tags($service->description),0,30)}}}
                  {{strlen(strip_tags($service->description))>30?"...":""}}
                </p>
            <a href="{{route('services.show',$service->id)}}">Read More <i class="flaticon-add"></i></a>
              </div>
            </div>
          </div>
          @endforeach
        </div> --}}
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


@section('scripts')
<script src="{{asset('assets/js/swiper.min.js')}}"></script>

<!-- Initialize Swiper -->
<script>
  var swiper = new Swiper('.swiper-container', {
    slidesPerView: 3,
    spaceBetween: 30,
    slidesPerGroup: 3,
    loop: true,
    loopFillGroupWithBlank: true,
    pagination: {
      el: '.swiper-pagination',
      clickable: true,
    },
    navigation: {
      nextEl: '.swiper-button-next',
      prevEl: '.swiper-button-prev',
    },
  });
</script>
@endsection
