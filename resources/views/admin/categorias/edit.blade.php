@extends('layouts.app')

@section('htmlheader_title')
	Home
@endsection


@section('main-content')
      <div class="row">
				<div class="col-lg-10">
					<div class="box box-danger">
											<div class="box-header">
												<h3 class="box-title">Categoria</h3>
											</div>
											<!-- /.box-header -->
											@foreach ($categorias as $categoria)
											<div class="box-body">
												<form role="form" id="form" class="formulario" enctype="multipart/form-data" method="POST" action="{{ url('admin/categoria/editarcategoria') }}">
													{{ csrf_field() }}
													<input type="hidden" name="id" value="{{$categoria->valor_item}}">
                          <div class="form-group">
                              <label for="email">Nombre</label>
                              <input type="text" class="form-control" name="nombre" id="email" value="{{convertirastring($categoria->nombre_lista)}}">
                          </div>

													<div class="form-group">
														<label for="pwd">Descripción</label>
														<input type="text" class="form-control"  name="descripcion" value="{{$categoria->descripcion}}">
													</div>
                              <button type="submit" class="btn btn-default">Guardar cambios</button>
                        </form>
												 </div>
											@endforeach

												 </div>
												 @foreach ($errors->all() as $error)
												 <li>{{ $error }}</li>
										 @endforeach
											 </div>
                     </div>


@endsection
