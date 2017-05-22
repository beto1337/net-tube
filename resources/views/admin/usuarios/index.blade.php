@extends('layouts.app')

@section('htmlheader_title')
	Home
@endsection


@section('main-content')
      <div class="row">
				<div class="col-lg-10">
					<div class="box box-primary">
											<div class="box-header">
												<h3 class="box-title">Post</h3>
											</div>
											<!-- /.box-header -->
											<div class="box-body">

												<table id="user" class="table table-bordered table-striped">
													<thead>
													<tr>
														<th>Id</th>
														<th>Nombre</th>
														<th>Correo</th>
														<th>Perfil</th>
														<th>Editar</th>
													</tr>
													</thead>
													<tbody>
														@foreach ($user as $usuario)
														<tr>
															<td>{{$usuario->id}} </td>
															<td>{{$usuario->name}} </td>
															<td>{{$usuario->email}}</td>
															<td>{{validarlista($usuario->perfil,1)}}</td>
															<td> <a href="{{ url('/admin/post/editpost/'.$usuario->id) }}" class="pull-right"><i class="fa fa-edit"></i>Editar</a></td>
														</tr>
														@endforeach

													</tbody>

													 </table>
												 </div>
												 </div>
											 </div>

</div>

<script type="text/javascript">

$(function () {
	$("#user").DataTable({
		"language": {
					"lengthMenu": "Mostrar _MENU_ usuario por pagina",
					"zeroRecords": "No hay paginas registradas",
					"info": "Pagina _PAGE_ de _PAGES_",
					"infoEmpty": "Ningun usuario encontrado",
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
