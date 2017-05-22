<!DOCTYPE html>

<html class="no-js" lang="en">

<html lang="en">

@section('htmlheader')
    @include('tube.layouts.partials.htmlheader')
@show


<body>
  <div class="off-canvas-wrapper">
      <div class="off-canvas-wrapper-inner" data-off-canvas-wrapper>
  @include('tube.layouts.partials.main')

        <div class="off-canvas-content" data-off-canvas-content>

      @include('tube.layouts.partials.mainheader')

      @yield('main-content')

    @include('tube.layouts.partials.footer')
    </div>
    </div>
</div>

@section('scripts')
    @include('tube.layouts.partials.scripts')
@show


</body>
</html>
