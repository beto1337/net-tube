@extends('tube.layouts.apptube')

@section('htmlheader_title')
	Home
@endsection


@section('main-content')
            <!--breadcrumbs-->
            @foreach ($pagina as $pagina)
            <section id="breadcrumb" class="breadMargin">
                <div class="row">
                    <div class="large-12 columns">
                        <nav aria-label="You are here:" role="navigation">
                            <ul class="breadcrumbs">
                                <li><i class="fa fa-home"></i><a href="#">Home</a></li>
                                <li>
                                    <span class="show-for-sr">Current: </span> {{$pagina->pagina_titulo}}



                                </li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </section><!--end breadcrumbs-->

            <section class="category-content">
                <div class="row">
                    <!-- left side content area -->
                    @include('tube.layouts.paginas.contenidopagina')
    <!-- end left side content area -->
                    <!-- sidebar -->
                      @include('tube.layouts.paginas.aside')
<!-- end sidebar -->
                </div>
            </section><!-- End Category Content-->
            <!-- footer -->
              @endforeach
            @endsection
