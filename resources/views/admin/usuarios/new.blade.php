@extends('layouts.app')

@section('htmlheader_title')
	Home
@endsection


@section('main-content')
      <div class="row">
				<div class="col-lg-10">
					<div class="box box-danger">
											<div class="box-header">
												<h3 class="box-title">Post</h3>
											</div>
											<!-- /.box-header -->
											<div class="box-body">
												<form role="form" id="form" class="formulario" enctype="multipart/form-data" method="POST" action="{{ url('admin/guardarpost') }}">
													{{ csrf_field() }}
                          <div class="form-group">
                            <label for="sel1">Tipo</label>
                            <select class="form-control" name="tipo" id="tipo" onchange="capturar()" >
                              <option value="1">Post</option>
                              <option value="2">Videos</option>
                            </select>
</div>
                          <div class="form-group">
                              <label for="email">Titulo</label>
                              <input type="text" class="form-control" name="titulo" id="email">
                          </div>
													<div class="" id="contenido">

														<div class="form-group">
															<label for="email">Contenido</label>
																	<textarea id="compose-textarea" class="form-control" name="contenido" style="height: 300px">
																	</textarea>
														</div>
														<div class="form-group">
																<label for="email">Resumen</label>
																<textarea name="resumen" class="form-control" rows="2" cols="80"></textarea>
														</div>

													</div>

													<div class="form-group" style="display:none" id="video">
														<label for="pwd">Url Video</label>
														<input type="text" class="form-control"  name="video">
													</div>

                          <div class="form-group">
                            <label for="pwd">tags</label>
                            <input type="text" class="form-control" id="pwd" name="tags" placeholder="nuevo,video,parra,oficial">
                          </div>

                          <input type="hidden" id="pwd" name="estado" value="1">

                              <button type="submit" class="btn btn-default">Guardar</button>
                             </form>
												 </div>
												 </div>
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
