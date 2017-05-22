@extends('layouts.app')

@section('htmlheader_title')
	Home
@endsection


@section('main-content')
      <div class="row">
				<div class="col-lg-12">
					<div class="box box-danger">
											<div class="box-header">
												<h3 class="box-title"><strong>Sliders</strong></h3>
											</div>
											<!-- /.box-header -->
											<div class="box-body">
												<table id="sliders" class="table table-bordered table-striped">
													<thead>
													<tr>
														<th>Imagen</th>
														<th>Nombre </th>
														<th>Link</th>
														<th>Posición</th>
														<th>Estado</th>
														<th>Opciones</th>
													</tr>
													</thead>
													<tbody>
														@foreach ($imagenes as $imagen)
														<tr>
															<td><img src="{{slider($imagen->ruta) }}" alt="" class="img-responsive" style="width:200px !important"> </td>
															<td style="vertical-align: middle;">{{$imagen->nombre}}</td>
															<td style="vertical-align: middle;">{{$imagen->link}}</td>
															<td style="vertical-align: middle;">{{$imagen->posicion}}</td>

															@if($imagen->estado==0)
															<td style="vertical-align: middle;"><small class="label label-danger">desactivado</small></td>
																<td style="vertical-align: middle;">
																	<div class="pull-left">
																		<a href="{{ url('/admin/slider/editpost/'.$imagen->id) }}" ><i class="fa fa-edit"></i></a>
																		<a href="javascript:confirmareliminacion({{$imagen->id}} , '{{$imagen->nombre}}' )" ><i style="color:red" class="fa fa-trash"></i></a>
																	</div>
																</td>

															 @else
															<td style="vertical-align: middle;"><small class="label label-success">activado</small></td>
																<td style="vertical-align: middle;">
																	<div class="pull-left">
																			<a style="margin:5px;font-size:20px;" href="{{ url('/admin/slider/editslider/'.$imagen->id) }}" ><i class="fa fa-edit"></i></a>
																			<a style="margin:5px;font-size:20px;" href="javascript:confirmareliminacion({{$imagen->id}} , '{{$imagen->nombre}}' )" ><i style="color:red" class="fa fa-trash"></i></a>
																				
																			</div>
																	</td>


															@endif
																											</tr>
														@endforeach

													</tbody>

													 </table>
													 	<button type="submit" name="">actualizar</button>
														<a href="http://localhost/metromusica/public/home2" target="_blank">prueba</a>

													 </form>
												 </div>
												 </div>
											 </div>


</div>

<script type="text/javascript">
function confirmareliminacion(id , titulo) {
	if (confirm("Esta a punto de borrar el post con id: "+ id+" y nombre: "+titulo)) {
location.href="{{url('admin/slider/deleteslider/')}}"+"/"+id;
	}
}
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
