@extends('layouts.app')

@section('htmlheader_title')
	Home
@endsection


@section('main-content')
      <div class="row">
				<div class="col-lg-10">
          @foreach ($paginas as $pagina)
					<div class="box box-danger">
											<div class="box-header">
												<h3 class="box-title"><strong>Editar Pagina ID: {{$pagina->pagina_id}}</strong></h3>
											</div>
											<!-- /.box-header -->
											<div class="box-body">
												<form role="form" id="form" class="formulario" enctype="multipart/form-data" method="POST" action="{{ url('admin/pagina/actualizarpagina') }}">
													{{ csrf_field() }}
													<input type="hidden" name="id" value="{{$pagina->pagina_id}}">
													<div class="form-group">
                              <label for="email">Fecha Registro</label>
															<p>{{$pagina->pagina_fecha_registro}}</p>
														</div>
                          <div class="form-group">
                              <label for="email">Título</label>
                              <input type="text" class="form-control" name="titulo" id="email" value="{{$pagina->pagina_titulo}}">
                          </div>


													<div class="form-group">
														<label for="email">Contenido</label>
						                    <textarea id="compose-textarea" class="form-control" name="contenido" style="height: 300px">{{$pagina->pagina_contenido}}
						                    </textarea>
						              </div>

													<div class="form-group">
															<label for="email">Descripción Corta</label>
															<textarea name="descripcion" class="form-control" rows="2" cols="80">{{$pagina->pagina_descripcion}}</textarea>
													</div>

													<div class="form-group">
                            <label for="pwd">Slug</label>
                            <label s class="form-control" name="tags" >{{$pagina->pagina_slug}}</label>
                          </div>
													<div class="form-group">
                            <label for="pwd">Tags</label>
                            <input type="text" class="form-control" id="pwd" name="tags" value="{{$pagina->pagina_tags}}">
                          </div>



                          @if($pagina->pagina_estado==1)
                            <div class="form-group">
                            <label for="pwd">Estado</label>
                            <input type="checkbox" id="pwd" name="estado" value="1" checked="true">
                            </div>
                          @else
                            <div class="form-group">
                            <label for="pwd">Estado</label>
                            <input type="checkbox" id="pwd" name="estado" value="1">
                            </div>
                          @endif
                          @endforeach
                              <button type="submit" class="btn btn-default">Guardar Cambios</button>
                             </form>
												 </div>
												 </div>
												 @foreach ($errors->all() as $error)
												 <li>{{ $error }}</li>
										 @endforeach
											 </div>
                     </div>


										 <script>
										   $(function () {
										     //Add text editor
										     $("#compose-textarea").wysihtml5();
										   });
										 </script>


@endsection
