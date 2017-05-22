@extends('layouts.app')

@section('htmlheader_title')
	Home
@endsection


@section('main-content')
      <div class="row">
          <div class="col-lg-6">
            <div class="box box-danger">
                        <div class="box-header">
                          <h3 class="box-title"><strong>Nuevo Slider</strong></h3>
                        </div>
                        <!-- /.box-header -->
                      <form role="form" id="fo3"  class="formulario" enctype="multipart/form-data" method="POST" action="{{ url('admin/slider/registrar') }}">
            	          {{ csrf_field() }}
            	          <div class="box-body">
                          <div class="form-group">
                            <label for="">Nombre</label>
                            <input type="text" class="form-control" name="nombre" id="nombre" placeholder="nombre"/>
                          </div>
                          <div class="form-group">
                            <label for="">Descripción</label>
                            <input type="text" class="form-control" name="descripcion" id="link"/>
                          </div>
                          <div class="form-group">
                            <label for="">Link</label>
                            <input type="text" class="form-control" name="link" id="link"/>
                          </div>
                          <div class="form-group">
                            <label for="">Imagen (1600 x 400)</label>
                            <input type="file" class="btn btn-danger" name="imagen" id="imagen"/>
                          </div>

																@if (count($errors) > 0)
    													<div class="alert alert-danger">
        											<ul>
            			@foreach ($errors->all() as $error)
                	<li>{{ $error }}</li>
            	@endforeach
        	</ul>
    	</div>
			@endif                       	<button type="submit" name="final" >Guardar</button>

                          	</div>
                          </form>

            					 	</div>
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
