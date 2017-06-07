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
                                    <span class="show-for-sr">Current: </span> Blog
                                </li>
                            </ul>
                         </nav>
                    </div>
                </div>
            </section><!--end breadcrumbs-->

            <section class="category-content">
                <div class="row">
                    <!-- left side content area -->
    <div class="large-8 columns">
      <div id="main" role="main">

        <article class="page">
            <div class="grid">
                <div class="grid__cell">
    <section class="chart">
    <table class="chart-positions">

    <tr class="headings">
        <th class="h-position">Pos</th>
        <th class="h-last-week">LW</th>
        <th class="h-title-artist">Title, Artist</th>
            <th class="h-peak">Peak<br />Pos</th>
            <th class="h-weeks"><abbr title="Weeks on Chart">WoC</abbr></th>
        <th class="h-actions"></th>
            <th class="h-chart-runs">Chart<br />Facts</th>
    </tr>

            <tr>
                <td>
                    <span class="position">1</span>
                </td>
                <td>
                    <span class="last-week ">
                        1
                    </span>
                </td>
                <td>
                    <div class="track">
                        <div class="cover" style="height:60px;width:60px">
                            <img src="http://live.chartsdb.aws.occ.drawgroup.com/img/small?url=https://images-eu.ssl-images-amazon.com/images/I/619fzjO1rmL.jpg" alt="DESPACITO (REMIX)" width="60" height="60"/>
                        </div>
                        <div class="title-artist">
                            <div class="title">
                                    <a href="/search/singles/DESPACITO (REMIX)">DESPACITO (REMIX)</a>
                            </div>
                            <div class="artist">

                                <a href="/artist/51560/LUIS-FONSI-DADDY-YANKEE-BIEBER">LUIS FONSI/DADDY YANKEE/BIEBER</a>
                            </div>
                            <div class="label-cat"><span class="label">DEF JAM/RBMG/REPUBLIC/UMLE</span></div>
                        </div>
                    </div>
                </td>

                    <!-- Peak Position-->
                    <td>1</td>
                    <!-- Wks -->
                    <td>7</td>

                <td>
                    <div class="actions">
                            <a href="javascript:comprar()" data-toggle="actions-view-buy-1">Buy</a>


                            <a href="javascript:comprar()" data-toggle="actions-view-listen-1">Listen</a>
                    </div>
                </td>

                    <td>
                        <a href="javascript:informacion()" data-productid="913394-4G8SW-USUM71703825-SINGLE" data-chartid="7501-20170608" class="chart-runs-icon icon-circle-plus"></a>
                    </td>

            </tr>
            <tr class="mobile-actions">
                <td colspan="7">
                    <div class="actions">
                            <a href="javascript:comprar()" data-toggle="actions-view-buy-1">Buy</a>


                            <a href="javascript:comprar()" data-toggle="actions-view-listen-1">Listen</a>
                    </div>
                </td>
            </tr>
            <tr class="actions-view actions-view-buy-1">
                <td colspan="7">
                    <div>
                            <a href="https://www.amazon.co.uk/Despacito-Remix-feat-Justin-Bieber/dp/B071CH1QFQ?SubscriptionId=AKIAJXJVDGDXF5N26NOQ&amp;tag=theoffcha-21&amp;linkCode=xm2&amp;camp=2025&amp;creative=165953&amp;creativeASIN=B071CH1QFQ" class="amazon" target="_blank">amazon</a>
                            <a href="https://itunes.apple.com/gb/album/despacito-remix-feat-justin-bieber/id1227097621?i=1227097836&amp;uo=4" class="itunes" target="_blank">itunes</a>
                    </div>
                    <a href="" class="close"></a>
                </td>
            </tr>
            <tr class="actions-view actions-view-watch-1">
                <td colspan="7">
                    <div>
                    </div>
                    <a href="" class="close"></a>
                </td>
            </tr>
            <tr class="actions-view actions-view-listen actions-view-listen-1">
                <td colspan="7">
                    <div>
                            <a href="https://open.spotify.com/track/5CtI0qwDJkDQGwXD1H1cLb" class="spotify" target="_blank">spotify</a>
                            <a href="http://www.deezer.com/track/350428781" class="deezer" target="_blank">deezer</a>
                    </div>
                    <a href="" class="close"></a>
                </td>
            </tr>
            <tr class="chart-runs" id="informacion">

            </tr>

            <tr>

                <td>
                    <span class="position">1</span>
                </td>

                <td>

                    <span class="last-week ">
                        1
                    </span>
                </td>

                <td>
                    <div class="track">
                        <div class="cover" style="height:60px;width:60px">
                            <img src="http://live.chartsdb.aws.occ.drawgroup.com/img/small?url=https://images-eu.ssl-images-amazon.com/images/I/619fzjO1rmL.jpg" alt="DESPACITO (REMIX)" width="60" height="60"/>
                        </div>
                        <div class="title-artist">
                            <div class="title">
                                    <a href="/search/singles/DESPACITO (REMIX)">DESPACITO (REMIX)</a>
                            </div>
                            <div class="artist">

                                <a href="/artist/51560/LUIS-FONSI-DADDY-YANKEE-BIEBER">LUIS FONSI/DADDY YANKEE/BIEBER</a>
                            </div>
                            <div class="label-cat"><span class="label">DEF JAM/RBMG/REPUBLIC/UMLE</span></div>
                        </div>
                    </div>
                </td>

                    <!-- Peak Position-->
                    <td>1</td>
                    <!-- Wks -->
                    <td>7</td>

                <td>
                    <div class="actions">
                            <a href="" data-toggle="actions-view-buy-1">Buy</a>


                            <a href="" data-toggle="actions-view-listen-1">Listen</a>
                    </div>
                </td>

                    <td>
                        <a href="" data-productid="913394-4G8SW-USUM71703825-SINGLE" data-chartid="7501-20170608" class="chart-runs-icon icon-circle-plus"></a>
                    </td>

            </tr>
            <tr class="mobile-actions">
                <td colspan="7">
                    <div class="actions">
                            <a href="" data-toggle="actions-view-buy-1">Buy</a>


                            <a href="" data-toggle="actions-view-listen-1">Listen</a>
                    </div>
                </td>
            </tr>
            <tr class="actions-view actions-view-buy-1">
                <td colspan="7">
                    <div>
                            <a href="https://www.amazon.co.uk/Despacito-Remix-feat-Justin-Bieber/dp/B071CH1QFQ?SubscriptionId=AKIAJXJVDGDXF5N26NOQ&amp;tag=theoffcha-21&amp;linkCode=xm2&amp;camp=2025&amp;creative=165953&amp;creativeASIN=B071CH1QFQ" class="amazon" target="_blank">amazon</a>
                            <a href="https://itunes.apple.com/gb/album/despacito-remix-feat-justin-bieber/id1227097621?i=1227097836&amp;uo=4" class="itunes" target="_blank">itunes</a>
                    </div>
                    <a href="" class="close"></a>
                </td>
            </tr>
            <tr class="actions-view actions-view-watch-1">
                <td colspan="7">
                    <div>
                    </div>
                    <a href="" class="close"></a>
                </td>
            </tr>
            <tr class="actions-view actions-view-listen actions-view-listen-1">
                <td colspan="7">
                    <div>
                            <a href="https://open.spotify.com/track/5CtI0qwDJkDQGwXD1H1cLb" class="spotify" target="_blank">spotify</a>
                            <a href="http://www.deezer.com/track/350428781" class="deezer" target="_blank">deezer</a>
                    </div>
                    <a href="" class="close"></a>
                </td>
            </tr>



            <tr>

                <td>
                    <span class="position">1</span>
                </td>

                <td>

                    <span class="last-week ">
                        1
                    </span>
                </td>

                <td>
                    <div class="track">
                        <div class="cover" style="height:60px;width:60px">
                            <img src="http://live.chartsdb.aws.occ.drawgroup.com/img/small?url=https://images-eu.ssl-images-amazon.com/images/I/619fzjO1rmL.jpg" alt="DESPACITO (REMIX)" width="60" height="60"/>
                        </div>
                        <div class="title-artist">
                            <div class="title">
                                    <a href="/search/singles/DESPACITO (REMIX)">DESPACITO (REMIX)</a>
                            </div>
                            <div class="artist">

                                <a href="/artist/51560/LUIS-FONSI-DADDY-YANKEE-BIEBER">LUIS FONSI/DADDY YANKEE/BIEBER</a>
                            </div>
                            <div class="label-cat"><span class="label">DEF JAM/RBMG/REPUBLIC/UMLE</span></div>
                        </div>
                    </div>
                </td>

                    <!-- Peak Position-->
                    <td>1</td>
                    <!-- Wks -->
                    <td>7</td>

                <td>
                    <div class="actions">
                            <a href="" data-toggle="actions-view-buy-1">Buy</a>


                            <a href="" data-toggle="actions-view-listen-1">Listen</a>
                    </div>
                </td>

                    <td>
                        <a href="" data-productid="913394-4G8SW-USUM71703825-SINGLE" data-chartid="7501-20170608" class="chart-runs-icon icon-circle-plus"></a>
                    </td>

            </tr>
            <tr class="mobile-actions">
                <td colspan="7">
                    <div class="actions">
                            <a href="" data-toggle="actions-view-buy-1">Buy</a>


                            <a href="" data-toggle="actions-view-listen-1">Listen</a>
                    </div>
                </td>
            </tr>
            <tr class="actions-view actions-view-buy-1">
                <td colspan="7">
                    <div>
                            <a href="https://www.amazon.co.uk/Despacito-Remix-feat-Justin-Bieber/dp/B071CH1QFQ?SubscriptionId=AKIAJXJVDGDXF5N26NOQ&amp;tag=theoffcha-21&amp;linkCode=xm2&amp;camp=2025&amp;creative=165953&amp;creativeASIN=B071CH1QFQ" class="amazon" target="_blank">amazon</a>
                            <a href="https://itunes.apple.com/gb/album/despacito-remix-feat-justin-bieber/id1227097621?i=1227097836&amp;uo=4" class="itunes" target="_blank">itunes</a>
                    </div>
                    <a href="" class="close"></a>
                </td>
            </tr>
            <tr class="actions-view actions-view-watch-1">
                <td colspan="7">
                    <div>
                    </div>
                    <a href="" class="close"></a>
                </td>
            </tr>
            <tr class="actions-view actions-view-listen actions-view-listen-1">
                <td colspan="7">
                    <div>
                            <a href="https://open.spotify.com/track/5CtI0qwDJkDQGwXD1H1cLb" class="spotify" target="_blank">spotify</a>
                            <a href="http://www.deezer.com/track/350428781" class="deezer" target="_blank">deezer</a>
                    </div>
                    <a href="" class="close"></a>
                </td>
            </tr>



            <tr>

                <td>
                    <span class="position">1</span>
                </td>

                <td>

                    <span class="last-week ">
                        1
                    </span>
                </td>

                <td>
                    <div class="track">
                        <div class="cover" style="height:60px;width:60px">
                            <img src="http://live.chartsdb.aws.occ.drawgroup.com/img/small?url=https://images-eu.ssl-images-amazon.com/images/I/619fzjO1rmL.jpg" alt="DESPACITO (REMIX)" width="60" height="60"/>
                        </div>
                        <div class="title-artist">
                            <div class="title">
                                    <a href="/search/singles/DESPACITO (REMIX)">DESPACITO (REMIX)</a>
                            </div>
                            <div class="artist">

                                <a href="/artist/51560/LUIS-FONSI-DADDY-YANKEE-BIEBER">LUIS FONSI/DADDY YANKEE/BIEBER</a>
                            </div>
                            <div class="label-cat"><span class="label">DEF JAM/RBMG/REPUBLIC/UMLE</span></div>
                        </div>
                    </div>
                </td>

                    <!-- Peak Position-->
                    <td>1</td>
                    <!-- Wks -->
                    <td>7</td>

                <td>
                    <div class="actions">
                            <a href="" data-toggle="actions-view-buy-1">Buy</a>


                            <a href="" data-toggle="actions-view-listen-1">Listen</a>
                    </div>
                </td>

                    <td>
                        <a href="" data-productid="913394-4G8SW-USUM71703825-SINGLE" data-chartid="7501-20170608" class="chart-runs-icon icon-circle-plus"></a>
                    </td>

            </tr>
            <tr class="mobile-actions">
                <td colspan="7">
                    <div class="actions">
                            <a href="" data-toggle="actions-view-buy-1">Buy</a>


                            <a href="" data-toggle="actions-view-listen-1">Listen</a>
                    </div>
                </td>
            </tr>
            <tr class="actions-view actions-view-buy-1">
                <td colspan="7">
                    <div>
                            <a href="https://www.amazon.co.uk/Despacito-Remix-feat-Justin-Bieber/dp/B071CH1QFQ?SubscriptionId=AKIAJXJVDGDXF5N26NOQ&amp;tag=theoffcha-21&amp;linkCode=xm2&amp;camp=2025&amp;creative=165953&amp;creativeASIN=B071CH1QFQ" class="amazon" target="_blank">amazon</a>
                            <a href="https://itunes.apple.com/gb/album/despacito-remix-feat-justin-bieber/id1227097621?i=1227097836&amp;uo=4" class="itunes" target="_blank">itunes</a>
                    </div>
                    <a href="" class="close"></a>
                </td>
            </tr>
            <tr class="actions-view actions-view-watch-1">
                <td colspan="7">
                    <div>
                    </div>
                    <a href="" class="close"></a>
                </td>
            </tr>
            <tr class="actions-view actions-view-listen actions-view-listen-1">
                <td colspan="7">
                    <div>
                            <a href="https://open.spotify.com/track/5CtI0qwDJkDQGwXD1H1cLb" class="spotify" target="_blank">spotify</a>
                            <a href="http://www.deezer.com/track/350428781" class="deezer" target="_blank">deezer</a>
                    </div>
                    <a href="" class="close"></a>
                </td>
            </tr>
    </table>
    </section>
    </div>
    </div>
    </article>
    </div>
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
                    </div>



                </div>
            </section>
<script src="{{ asset('/plugins/jQuery/jQuery-2.1.4.min.js') }}"></script>

<script type="text/javascript">
  function informacion() {
    $('#informacion').load("{{url('/detallado')}}");
  }
  function comprar() {
    $('#informacion').load("{{url('/comprar')}}");
  }
</script>

@endsection
