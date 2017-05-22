@extends('tube.layouts.apptube')

@section('htmlheader_title')
	Home
@endsection


@section('main-content')

<!-- Premium Videos -->
@include('tube.layouts.home.slider')
<!-- End Premium Videos -->

<!-- Premium Videos -->
@include('tube.layouts.home.premiunvideo')
<!-- End Premium Videos -->

<!-- Category -->
@include('tube.layouts.home.categorias')
<!-- End Category -->


<!-- main content -->
<section class="content">
		<!-- newest video -->
@include('tube.layouts.home.newvideos')
	<!-- End newest video -->
</section>
		<!-- End newest video -->

<section class="content">
		<!-- End newest video -->
		<!-- ad Section -->
		<div class="googleAdv">
				<a href="#"><img src="images/goodleadv.png" alt="googel ads"></a>
		</div>
		<!-- End ad Section -->

		<!-- popular Videos -->
		<div class="main-heading">
				<div class="row secBg padding-14">
						<div class="medium-8 small-8 columns">
								<div class="head-title">
										<i class="fa fa-star"></i>
										<h4>Most Popular Videos</h4>
								</div>
						</div>
						<div class="medium-4 small-4 columns">
								<ul class="tabs text-right pull-right" data-tabs id="popularVideos">
										<li class="tabs-title is-active"><a href="#popular-all">all</a></li>
										<li class="tabs-title"><a href="#popular-hd">HD</a></li>
								</ul>
						</div>
				</div>
		</div>
		@include('tube.layouts.home.popularvideo')

		<!-- ad Section -->
		<div class="googleAdv">
				<a href="#"><img src="images/goodleadv.png" alt="googel ads"></a>
		</div><!-- End ad Section -->
</section><!-- End main content -->
<!-- movies -->

<div class="googleAdv text-center">
		<a href="#"><img src="images/goodleadv.png" alt="googel ads"></a>
</div><!-- End ad Section -->
<!-- footer -->

@endsection
