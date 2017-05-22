@extends('layouts.app')

@section('htmlheader_title')
	Home
@endsection


@section('main-content')
      <div class="row">
				<div class="col-lg-10">
					<div class="box box-primary">
											<div class="box-header">
												<h3 class="box-title">Categorias</h3>
											</div>
											<!-- /.box-header -->
											<div class="box-body">

												<table id="categoria" class="table table-bordered table-striped">
													<thead>
													<tr>
														<th>Id</th>
														<th>Categoria</th>
														<th>Descripción</th>
														<th>Editar</th>
														<th>Eliminar</th>

													</tr>
													</thead>
													<tbody>
														@foreach ($categorias as $categoria)
														<tr>
															<td>{{$categoria->valor_item}} </td>
															<td>{{convertirastring($categoria->nombre_lista)}} </td>
															<td>{{$categoria->descripcion}}</td>
															<td><a href="{{url('admin/categoria/editarcategoria/'.$categoria->valor_item)}}">editar</a></td>
															<td><a href="{{url('admin/categoria/eliminarcategoria/'.$categoria->valor_item)}}">Eliminiar</a></td>
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

	$("#categoria").DataTable({
		"language": {
					"lengthMenu": "Mostrar _MENU_ categorias por pagina",
					"zeroRecords": "No hay categorias registradas",
					"info": "Pagina _PAGE_ de _PAGES_",
					"infoEmpty": "Ninguna categoria encontradoa",
					"infoFiltered": "(Filtrado de _MAX_ categorias )",
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
