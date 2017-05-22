@extends('layouts.app')

@section('htmlheader_title')
	Home
@endsection


@section('main-content')
      <div class="row">
				<div class="col-lg-12">
					<div class="box box-danger">
											<div class="box-header">
												<h3 class="box-title"><strong>Entradas</strong></h3>
											</div>
											<!-- /.box-header -->
											<div class="box-body">

												<table id="post" class="table table-bordered table-striped">
													<thead>
													<tr>
														<th>Id</th>
														<th>Titulo</th>
														<th>Tipo</th>
														<th>Fecha</th>
														<th>Estado</th>
														<th>Opciones</th>

													</tr>
													</thead>
													<tbody>
														@foreach ($post as $post)
														<tr>
															<td>{{$post->post_id}} </td>
															<td>{{$post->post_titulo}} </td>
															<td>{{validarlista($post->post_tipo,2)}}</td>
															<td><strong>Publicado </strong>{{fecha($post->post_fecha_registro)}} / {{hora($post->post_fecha_registro)}}</td>
															@if($post->post_estado==0)
															<td><small class="label label-danger">desactivado</small></td>
																<td>
																	<div class="pull-left">
																		<a style="margin:5px;font-size:20px;" href="{{ url('/admin/entrada/editarentrada/'.$post->post_id) }}" ><i class="fa fa-edit"></i></a>
																		<a style="margin:5px;font-size:20px;" href="javascript:confirmareliminacion({{$post->post_id}} , '{{$post->post_titulo}}' )" ><i style="color:red" class="fa fa-trash"></i></a>
																	</div>
																</td>
															@else
															<td><small class="label label-success">activado</small>
														</td>
														<td><div class="pull-left">
														<a style="margin:5px;font-size:20px;" href="{{ url('/admin/entrada/editarentrada/'.$post->post_id) }}" ><i class="fa fa-edit"></i></a>
														<a style="margin:5px;font-size:20px;" href="javascript:confirmareliminacion({{$post->post_id}} , '{{$post->post_titulo}}' )" ><i style="color:red" class="fa fa-trash"></i></a>
												</div></td>
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
	if (confirm("Esta a punto de borrar el post con id: "+ id+" y titulo: "+titulo)) {
location.href="{{url('admin/post/deletepost/')}}"+"/"+id;
	}
}

$(function () {

	$("#post").DataTable({
		"language": {
					"lengthMenu": "Mostrar _MENU_ entradas por pagina",
					"zeroRecords": "No hay entradas registradas",
					"info": "Pagina _PAGE_ de _PAGES_",
					"infoEmpty": "Ninguna entrada encontrado",
					"infoFiltered": "(Filtrado de _MAX_ post )",
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
