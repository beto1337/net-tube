<section id="slider">
		<div id="full-slider-wrapper">
				<div id="layerslider" style="width:100%;height:400px;">
					@foreach ($imagenes as $imagen)
					<div class="ls-slide" data-ls="transition2d:1;timeshift:-1000;">
							<img src="{{slider($imagen->ruta)}}" class="ls-bg" alt="{{$imagen->descripcion}}"/>
							<a href="{{$imagen->link}}" class="ls-l button" style="border-radius:4px;left:63px;text-align:center; top:315px;background-color: rgba(0, 0, 0, 0.4);;color: #ffffff;font-family: 'Open Sans';font-size: 14px;display: inline-block; text-transform: uppercase; font-weight: bold;" >Ver</a>
					</div>
					@endforeach
				</div>
		</div>
</section><!--end slider-->
