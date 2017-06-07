@extends('layouts.app')

@section('htmlheader_title')
	Home
@endsection


@section('main-content')
      <div class="row">
				@foreach ($entradas as $entrada)

				<div class="col-lg-6 col-md-6 ">
					<div class="box box-danger">
											<div class="box-header">
												<h3 class="box-title"><strong>Ajustes Generales</strong></h3>
											</div>
											<!-- /.box-header -->
											<div class="box-body">
												<form role="form" id="form" class="formulario" enctype="multipart/form-data" method="POST" action="{{ url('admin/guardarinfo') }}">
													{{ csrf_field() }}
                          <div class="form-group">
                              <label for="email">Título Del Sitio</label>
                              <input type="text" class="form-control" name="titulo" id="email" value="{{$entrada->parametro_titulo}}">
                          </div>
                          <div class="form-group">
                            <label for="pwd">Descripción Corta</label>
														<textarea name="descripcion" class="form-control" rows="2" cols="80">{{$entrada->parametro_descripcion}}</textarea>
                          </div>
                          <div class="form-group">
                            <label for="pwd">Tags</label>
                            <input type="text" class="form-control" id="pwd" name="tags" value="{{$entrada->parametro_keys}}">
                          </div>
                          <div class="form-group">
                            <label for="pwd">Dirección del Sitio (URL)</label>
                            <input type="text" class="form-control" id="pwd" name="url" value="{{$entrada->parametro_url}}">
                          </div>
                          <div class="form-group">
                          <label for="pwd">Google Analitics</label>
													<textarea name="analitys"  class="form-control" rows="2" cols="80">{{$entrada->parametro_analytics}}</textarea>
                          </div>
													<div class="form-group has-feedback">
														<label for="">Correo</label>
															<input type="email" class="form-control" value="{{$entrada->parametro_correo}}" name="correo"/>
															<span class="glyphicon glyphicon-envelope form-control-feedback"></span>
													</div>
                          <div class="form-group">
                          <label for="pwd">Facebook</label>
                          <input type="text" class="form-control" id="pwd" name="facebook" value="{{$entrada->parametro_facebook}}">
                          </div>
                          <div class="form-group">
                          <label for="pwd">Twitter</label>
                          <input type="text" id="pwd" class="form-control" name="twitter" value="{{$entrada->parametro_twitter}}">
                          </div>
													<div class="form-group">
                          <label for="pwd">Instagram</label>
                          <input type="text" id="pwd" class="form-control" name="instagram" value="{{$entrada->parametro_instagram}}">
                          </div>


                          @if($entrada->parametro_estado==1)
                            <div class="form-group">
                            <label for="pwd">Estado</label>
                            <input type="checkbox" id="pwd" name="estado" value="1" checked="true">
                            </div>
                          @else
                            <div class="form-group">
                            <label for="pwd">estado</label>
                            <input type="checkbox" id="pwd" name="estado" value="1">
                            </div>
                          @endif
                              <button type="submit" class="btn btn-danger">Guardar Cambios</button>
                             </form>
												 </div>

												 </div>
											 </div>

<div class="col-lg-6 col-md-6">
	<div class="box box-danger">
							<div class="box-header">
								<h3 class="box-title"><strong>Ajustes Generales</strong></h3>
							</div>
							<!-- /.box-header -->
							<div class="box-body">
								<div class="col-lg-12">
<label >LOGO</label>
<img class="pull-right" src="{{ruta().'/'.$entrada->parametro_logo}}" alt="">
								</div>

								<div class="col-lg-12">
<label >LOGO RESPONSIVE</label>
<img class="pull-right" src="{{ruta().'/'.$entrada->parametro_logox29}}" alt="">
								</div>

								<div class="col-lg-12">
<label >ICONO</label>
<img class="pull-right" src="{{ruta().'/'.$entrada->parametro_icono}}" alt="">
								</div>

<form role="form" id="form" class="formulario" enctype="multipart/form-data" method="POST" action="{{ url('admin/guardarimg') }}">
	{{ csrf_field() }}
	<div class="form-group"  id="imagen">
		<label for="pwd">Logo (140x40)</label>
		<input type="file" class="form-control" name="logo">
		@if ($errors->has('logo') )
		<p style="color:red;margin:0px">{{ $errors->first('logo') }}</p>
		@endif
	</div>
	<div class="form-group"  id="imagen">
		<label for="pwd">Logo Responsive(119x29)</label>
		<input type="file" class="form-control" name="logo_responsive">
		@if ($errors->has('logo_responsive') )
		<p style="color:red;margin:0px">{{ $errors->first('logo_responsive') }}</p>
		@endif
	</div>
	<div class="form-group"  id="imagen">
		<label for="pwd">Icono(36 x 36)</label>
		<input type="file" class="form-control" name="icono">
		@if ($errors->has('icono') )
		<p style="color:red;margin:0px">{{ $errors->first('icono') }}</p>
		@endif
		</div>
<button type="submit" name="button">Cambiar Logos</button>

</form>
</div>
</div>
@endforeach
</div>
</div>



@endsection
