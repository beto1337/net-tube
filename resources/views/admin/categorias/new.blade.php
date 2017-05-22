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
											<div class="box-body">
												<form role="form" id="form" class="formulario" enctype="multipart/form-data" method="POST" action="{{ url('admin/guardarcategoria') }}">
													{{ csrf_field() }}

                          <div class="form-group">
                              <label for="email">Nombre</label>
                              <input type="text" class="form-control" name="nombre" id="email">
                          </div>

													<div class="form-group">
														<label for="pwd">Descripción</label>
														<input type="text" class="form-control"  name="descripcion">
													</div>
                              <button type="submit" class="btn btn-default">Guardar</button>
                        </form>
												 </div>
												 </div>
												 @foreach ($errors->all() as $error)
												 <li>{{ $error }}</li>
										 @endforeach
											 </div>
                     </div>


@endsection
