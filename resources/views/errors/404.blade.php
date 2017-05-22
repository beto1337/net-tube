
@extends('tube.layouts.apptube')

@section('htmlheader_title')
	Home
@endsection


@section('main-content')

<section id="breadcrumb" class="breadMargin">
    <div class="row">
        <div class="large-12 columns">
            <nav aria-label="You are here:" role="navigation">
                <ul class="breadcrumbs">
                    <li><i class="fa fa-home"></i><a href="#">Home</a></li>
                    <li>
                        <span class="show-for-sr">Current: </span> page not found
                    </li>
                </ul>
            </nav>
        </div>
    </div>
</section><!--end breadcrumbs-->
<section class="error-page">
    <div class="row secBg">
        <div class="large-8 large-centered columns">
            <div class="error-page-content text-center">
                <div class="error-img text-center">
                    <img src="{{ asset('images/404-error.png')}}" alt="404 page">
                    <div class="spark">
                        <img class="flash" src="{{ asset('images/spark.png')}}" alt="spark">
                    </div>
                </div>
                <h1>Page Not Found</h1>
                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s,</p>
                <a href="home-v1.html" class="button">Go Back Home Page</a>
            </div>
        </div>
    </div>
</section>

@endsection
