@extends('layouts.app')

@section('htmlheader_title')
	Home
@endsection


@section('main-content')
      <div class="row">
				<div class="col-lg-10">
          @foreach ($post as $post)
					<div class="box box-danger">
											<div class="box-header">
												<h3 class="box-title">Post ID: {{$post->post_id}}</h3>
											</div>
											<!-- /.box-header -->
											<div class="box-body">
												<form role="form" id="form" class="formulario" enctype="multipart/form-data" method="POST" action="{{ url('admin/post/actualizarpost') }}">
													{{ csrf_field() }}
													<input type="hidden" name="id" value="{{$post->post_id}}">
													<div class="form-group">
                              <label for="email">fecha registro</label>
															<p>{{$post->post_fecha_registro}}</p>
														</div>
                          <div class="form-group">
                              <label for="email">Titulo</label>
                              <input type="text" class="form-control" name="titulo" id="email" value="{{$post->post_titulo}}">
                          </div>
                          <div class="form-group">
                            <label for="pwd">Tipo</label>
                            <label for="">{{validarlista($post->post_tipo,2)}}</label>
                          </div>
													@if($post->post_tipo==2)
													<div class="form-group">
													 <label for="pwd">Video</label>
													 <input type="text" class="form-control" id="pwd" name="video" value="{{$post->post_contenido}}">
												 </div>
													@else
													<div class="form-group">
														<label for="email">Contenido</label>
						                    <textarea id="compose-textarea" class="form-control" name="contenido" style="height: 300px">{{$post->post_contenido}}
						                    </textarea>
						              </div>
													<div class="form-group">
															<label for="email">Resumen</label>
															<textarea name="resumen" class="form-control" rows="2" cols="80">{{$post->post_resumen}}</textarea>
													</div>
													@endif


													<div class="form-group">
                            <label for="pwd">Slug</label>
                            <label s class="form-control" name="tags" >{{$post->post_slug}}</label>
                          </div>
													<div class="form-group">
                            <label for="pwd">tags</label>
                            <input type="text" class="form-control" id="pwd" name="tags" value="{{$post->post_tags}}">
                          </div>



                          @if($post->post_estado==1)
                            <div class="form-group">
                            <label for="pwd">estado</label>
                            <input type="checkbox" id="pwd" name="estado" value="1" checked="true">
                            </div>
                          @else
                            <div class="form-group">
                            <label for="pwd">estado</label>
                            <input type="checkbox" id="pwd" name="estado" value="1">
                            </div>
                          @endif
                          @endforeach
                              <button type="submit" class="btn btn-default">Modificar</button>
                             </form>
												 </div>
												 </div>
											 </div>
                     </div>


										 <script>
										   $(function () {
										     //Add text editor
										     $("#compose-textarea").wysihtml5();
										   });
										 </script>


@endsection
