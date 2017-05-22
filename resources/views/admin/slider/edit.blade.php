@extends('layouts.app')

@section('htmlheader_title')
	Home
@endsection


@section('main-content')
      <div class="row">
          <div class="col-lg-6">
						@foreach ($slider as $slider)
            <div class="box box-danger">
                        <div class="box-header">
                          <h3 class="box-title"><strong>Editar Slider</strong></h3>
                        </div>
                        <!-- /.box-header -->
                      <form role="form" id="fo3"  class="formulario" enctype="multipart/form-data" method="POST" action="{{ url('admin/slider/editar') }}">
            	          {{ csrf_field() }}
            	          <div class="box-body">
													<input type="hidden" name="id" value="{{$slider->id}}">
                          <div class="form-group">
                            <label for="">Nombre</label>
                            <input type="text" class="form-control" name="nombre" id="nombre" value="{{$slider->nombre}}"/>
                          </div>
                          <div class="form-group">
                            <label for="">Descripción</label>
                            <input type="text" class="form-control" name="descripcion" value="{{$slider->descripcion}}"/>
                          </div>
                          <div class="form-group">
                            <label for="">Link</label>
                            <input type="text" class="form-control" name="link" value="{{$slider->link}}"/>
                          </div>

													<div class="form-group">
														<label for="">Posición</label>
														<input type="number" class="form-control" name="posicion" value="{{$slider->posicion}}"/>
													</div>
                          <div class="form-group">
                          <label for="">Imagen (1600 x 400)</label>
														<img src="{{slider($slider->ruta)}}" style="width:300px;margin:15px" alt="">
                            <input style="margin:10px" type="file" class="" name="imagen" id="imagen"/>
                          </div>
													<div class="form-group">
													<label for="">Estado</label>
													@if($slider->estado==0)
													<input type="checkbox" name="estado" value="1">
													@else
													<input type="checkbox" name="estado" value="1" checked="true">
													@endif
													</div>

																@if (count($errors) > 0)
    													<div class="alert alert-danger">
        											<ul>
            										@foreach ($errors->all() as $error)
                									<li>{{ $error }}</li>
            										@endforeach
        											</ul>
    													</div>
															@endif
			<button type="submit" name="final" >Guardar Cambios</button>

                          	</div>
                          </form>

            					 	</div>
												@endforeach

                             	</div>
                         	</div>

<script type="text/javascript">

$(function () {
	$("#sliders").DataTable({
		"language": {
					"lengthMenu": "Mostrar _MENU_ sliders por pagina",
					"zeroRecords": "No hay Sliders registrados",
					"info": "Pagina _PAGE_ de _PAGES_",
					"infoEmpty": "Ningun cliente encontrado",
					"infoFiltered": "(Filtrado de _MAX_ imagenes )",
					"search":         "Buscar:",
					"paginate": {
			"first":      "Primero",
			"last":       "Ultimo",
			"next":       "Siguiente",
			"previous":   "Anterior"
	}
			}
	});
});

</script>

@endsection
