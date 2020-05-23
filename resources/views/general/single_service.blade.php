@extends('layouts.app')
@section('content')
<section class="breadcrumbs-section mt-90 pt-180 pb-180 bg_cover"
		style="background-image: url(assets/images/breadcrumbs.jpg);">
		<div class="container">
			<div class="breadcrumbs-text">
				<h1>{{$service->name}}</h1>
				<ul>
					<li><a href="index.html">Home</a></li>
					<li><a href="service-1.html">Service</a></li>
					<li>{{$service->name}}</li>
				</ul>
			</div>
		</div>
    </section>
    {{-- wait hai ta --}}
	<!--====== BREADCRUMBS PART END ======-->
	<!--====== DETAILS PART START ======-->
	<section class="service-details-wrap pt-130 pb-130">
		<div class="container">
			<div class="row">
				<div class="col-lg-4 order-2 order-lg-1">
					<div class="sidebar">
						<div class="widgets service-cat">
							<h4 class="widget-title">Popular Service</h4>
							<ul class="service-cat-list">
								<li class="active"><a href="#">Kitchen Cleaning<i class="far fa-angle-right"></i></a>
								</li>
								<li><a href="#">Glass Cleaning<i class="far fa-angle-right"></i></a></li>
								<li><a href="#">Tolilet Cleaning<i class="far fa-angle-right"></i></a></li>
								<li><a href="#">Office Cleaning<i class="far fa-angle-right"></i></a></li>
								<li><a href="#">Carpet Cleaning<i class="far fa-angle-right"></i></a></li>
							</ul>
						</div>
                    </div>
                    <h2 class="title text-align-right">Nrs. {{$service->price}} /-</h2>
                    <a href="#" class="main-btn">Book Now</a>


				</div>
				<div class="col-lg-8 order-1 order-lg-2">
					<div class="service-details">
                        <h2 class="title">{{$service->name}}</h2>
                        <div style="width:100%;height:300px;">
                        <img src="/storage/uploads/services/{{$service->image}}" style="width:100%;height:100%;object-fit:cover" alt="Images" class="mb-35" />
                        </div>
						<p>
                            {{$service->description}}
                        </p>
					</div>
				</div>
			</div>
		</div>
    </section>

@endsection
