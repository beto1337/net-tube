
@extends('tube.layouts.apptube')

@section('htmlheader_title')
	Home
@endsection


@section('main-content')


<!-- video section -->
@include('tube.layouts.videopost.videosection')
<!-- End  -->

<div class="row">
    <!-- left side content area -->
    <div class="large-8 columns">
        <!-- single post stats -->
@include('tube.layouts.videopost.videodescripcion')
        <!-- related Posts -->

<!--end related posts-->
@include('tube.layouts.videopost.related')
        <!-- Comments -->
@include('tube.layouts.videopost.comment')
<!-- End Comments -->
    </div>
		<!-- end left side content area -->

		<!-- sidebar -->
    <div class="large-4 columns">
        <aside class="secBg sidebar">
            <div class="row">

                <!-- search Widget -->
                <div class="large-12 medium-7 medium-centered columns">
                    <div class="widgetBox">
                        <div class="widgetTitle">
                            <h5>Search Videos</h5>
                        </div>
                        <form id="searchform" method="get" role="search">
                            <div class="input-group">
                                <input class="input-group-field" type="text" placeholder="Enter your keyword">
                                <div class="input-group-button">
                                    <input type="submit" class="button" value="Submit">
                                </div>
                            </div>
                        </form>
                    </div>
                </div><!-- End search Widget -->


                <!-- most view Widget -->
@include('tube.layouts.videopost.mostview')
<!-- end most view Widget -->

                <!-- categories -->
@include('tube.layouts.videopost.categories')

                <!-- social Fans Widget -->
@include('tube.layouts.videopost.social')
	<!-- End social Fans Widget -->

                <!-- ad banner widget -->
@include('tube.layouts.videopost.recent')
							<!-- End Recent post videos -->

                <!-- tags -->
                <div class="large-12 medium-7 medium-centered columns">
                    <div class="widgetBox">
                        <div class="widgetTitle">
                            <h5>Tags</h5>
                        </div>
                        <div class="tagcloud">
                            <a href="#">3D Videos</a>
                            <a href="#">Videos</a>
                            <a href="#">HD</a>
                            <a href="#">Movies</a>
                            <a href="#">Sports</a>
                            <a href="#">3D</a>
                            <a href="#">Movies</a>
                            <a href="#">Animation</a>
                            <a href="#">HD</a>
                            <a href="#">Music</a>
                            <a href="#">Recreation</a>
                        </div>
                    </div>
                </div><!-- End tags -->
            </div>
        </aside>
    </div><!-- end sidebar -->
</div>

<!-- footer -->




@endsection







            <!--breadcrumbs-->
