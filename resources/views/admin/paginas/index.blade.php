@extends('layouts.app')

@section('htmlheader_title')
	Home
@endsection


@section('main-content')
      <div class="row">
				<div class="col-lg-10">
					<div class="box box-danger">
											<div class="box-header">
												<h3 class="box-title"><strong>Paginas</strong></h3>
											</div>
											<div class="box-body">

												<table id="pagina" class="table table-bordered table-striped">
													<thead>
													<tr>
														<th>Id</th>
														<th>Título</th>
														<th>Slug</th>
														<th>Fecha</th>
														<th>Estado</th>
														<th>Opciones</th>
													</tr>
													</thead>
													<tbody>

														@foreach ($paginas as $pagina)
														<tr>
															<td>{{$pagina->pagina_id}} </td>
															<td>{{$pagina->pagina_titulo}} </td>
															<td>{{$pagina->pagina_slug}}</td>
															<td><strong>Publicado </strong>{{fecha($pagina->pagina_fecha_registro)}} / {{hora($pagina->pagina_fecha_registro)}}</td>
															@if($pagina->pagina_estado==0)
															<td><small class="label label-danger">desactivado</small></td>
														<td>
																<div class="pull-left">
																	<a style="margin:5px;font-size:20px;"  href="{{ url('/admin/pagina/editpagina/'.$pagina->pagina_id) }}" ><i class="fa fa-edit"></i></a>
																	<a style="margin:5px;font-size:20px;"  href="javascript:confirmareliminacion({{$pagina->pagina_id}} , '{{$pagina->pagina_titulo}}' )" ><i style="color:red" class="fa fa-trash"></i></a>
																</div>
															</td> @else
															<td><small class="label label-success">activado</small></td>
															<td>
																<div class="pull-left">
																	<a style="margin:5px;font-size:20px;"  href="{{ url('/admin/pagina/editpagina/'.$pagina->pagina_id) }}" ><i class="fa fa-edit"></i></a>
																	<a style="margin:5px;font-size:20px;"  href="javascript:confirmareliminacion({{$pagina->pagina_id}} , '{{$pagina->pagina_titulo}}' )" ><i style="color:red" class="fa fa-trash"></i></a>
															</div>
															</td>
																@endif
														</tr>
														@endforeach

													</tbody>

													 </table>
												 </div>
												 </div>
											 </div>

</div>

<script type="text/javascript">

function confirmareliminacion(id , titulo) {
	if (confirm("Esta a punto de borrar la pagina con id: "+ id+" y titulo: "+titulo)) {
location.href="{{url('admin/pagina/deletepagina/')}}"+"/"+id;
	}
}

$(function () {
	$("#pagina").DataTable({
		"language": {
					"lengthMenu": "Mostrar _MENU_ pagina por pagina",
					"zeroRecords": "No hay paginas registrados",
					"info": "Pagina _PAGE_ de _PAGES_",
					"infoEmpty": "Ningun pagina encontrado",
					"infoFiltered": "(Filtrado de _MAX_ pagina )",
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
