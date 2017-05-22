@extends('layouts.app')

@section('htmlheader_title')
	Home
@endsection


@section('main-content')

		<div class="row">
			<div class="col-lg-offset-1 col-md-offset-0 col-sm-offset-0 col-xs-offset-0" >
				<iframe class="videogrande pull-left" src="//www.youtube.com/embed/ePbKGoIGAXY" allowfullscreen></iframe>
				<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12" style="background-color:white;margin:0px 0px 0px 10px;padding:5px">
<table align="center" width="*%" >
@for($i = 0; $i < 3	; $i++)
<tr>
	<td style="padding:5px 1px 5px 0px">
		<img class="videopeque" src="https://i.ytimg.com/vi/pDaa70OTA34/hqdefault.jpg?custom=true&w=168&h=94&stc=true&jpg444=true&jpgq=90&sp=67&sigh=SxDklSAUzzjUMB2uWswkuNVSaKA" >
	</td>
	<td style="padding-left:3px">
		<label for="">Por un beso de tu boca - Silvestre dangond </label>
		<p>Silvestre dangond <br>
		30,232,121</p>
	</td>
</tr>
@endfor
</table>


				</div>
			</div>
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="background-color:gray;margin-top:10px">
				<h3 style="margin:3px">Noticias</h3>
			</div>
<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">

@for ($i = 0; $i < 4; $i++)
	<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
		<h2>
		Heading
		</h2>
		<p>
		Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Etiam porta sem malesuada magna mollis euismod. Donec sed odio dui.
		</p>
				<p>
		<a class="btn" href="#">View details »</a>
	</p>
</div>
@endfor
</div>



<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="background-color:gray;margin-top:10px">
	<h3 style="margin:3px">Tops-Colombia</h3>
</div>
<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">

@for ($i = 0; $i < 4; $i++)
<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
<img src="https://i.ytimg.com/vi/t_jHrUE5IOk/hqdefault.jpg?custom=true&w=196&h=110&stc=true&jpg444=true&jpgq=90&sp=67&sigh=iGYxHdK2MLJb65U9UH19iw8kmLQ" class="img-responsive" alt="">
</div>
<label for="">Por un beso de tu boca</label>
<p>
Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo
</p>
</div>
@endfor
</div>




<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="background-color:gray;margin-top:10px">
	<h3 style="margin:3px">Tops-mundo</h3>
</div>
<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">

@for ($i = 0; $i < 4; $i++)
<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
<h2>
Heading
</h2>
<p>
Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Etiam porta sem malesuada magna mollis euismod. Donec sed odio dui.
</p>
	<p>
<a class="btn" href="#">View details »</a>
</p>
</div>
@endfor
</div>




		</div>
@endsection
