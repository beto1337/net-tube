@extends('layouts.app')

@section('htmlheader_title')
	Home
@endsection


@section('main-content')
      <div class="row">
				<div class="col-lg-10">
					<div class="box box-danger">
											<div class="box-header">
												<h3 class="box-title"><strong>Nueva Pagina</strong></h3>
											</div>
											<!-- /.box-header -->
											<div class="box-body">
												<form role="form" id="form" class="formulario" enctype="multipart/form-data" method="POST" action="{{ url('admin/guardarpagina') }}">
													{{ csrf_field() }}
                          <div class="form-group">
                              <label for="email">Título</label>
                              <input type="text" class="form-control" name="titulo" id="email">
                          </div>
													<div class="form-group"  id="imagen">
														<label for="pwd">Descripción</label>
														<input type="text" class="form-control"  name="descripcion">
													</div>

														<div class="form-group">
															<label for="email">Contenido</label>
																	<textarea id="compose-textarea" class="form-control" name="contenido" style="height: 300px">
																	</textarea>
														</div>

                          <div class="form-group">
                            <label for="pwd">Tags</label>
                            <input type="text" class="form-control" id="pwd" name="tags" placeholder="nuevo,video,parra,oficial">
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


<script type="text/javascript">
	$(function () {
		$("#compose-textarea").wysihtml5();
	});


function capturar() {
 vervideo = document.getElementById("video");
 vercontenido = document.getElementById("contenido");
 var item = document.getElementById('tipo');
 if(item.options[item.selectedIndex].value==1){
vervideo.style.display='none';
vercontenido.style.display='block';
}else{
	vervideo.style.display='block';
	vercontenido.style.display='none';
}
}

</script>

@endsection
