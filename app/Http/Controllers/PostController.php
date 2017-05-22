<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use DB;
use Carbon\Carbon;
use Storage;
use Illuminate\Support\Str as Str;
use Image;

class PostController extends Controller
{
  //
  /**
   * Create a new controller instance.
   *
   * @return void
   */
  public function __construct()
  {
      $this->middleware('auth');
  }

  /**
   * Show the application dashboard.
   *
   * @return Response
   */


  public function index()
  {
    validaradministrador();
    $postV=DB::table('cms_post')->whereNotIn('post_estado',[2])->get();

    return view('admin/post/index')->with(array('post'=>$postV));
  }
  public function editpost($id)
  {
    validaradministrador();
    $postV=DB::table('cms_post')->where('post_id',$id)->get();
    $categorias=DB::table('cms_listas')->where('id_tipolista',4)->select('nombre_lista','valor_item')->orderby('valor_item','asc')->get();
    return view('admin/post/edit')->with(array('post'=>$postV,'categorias'=>$categorias));
  }
  public function deletepost($id)
  {
    validaradministrador();
    DB::table('cms_post')->where('post_id',$id)->update(['post_estado'=> 2]);
    return redirect('/admin/post');
  }
  public function editpostf(Request $request)
  {

    $this->validate($request, [
    'titulo' => 'required',
  ]);
    $slug = Str::slug($request->titulo);
      $todo=$request->all();
      $estado=0;
      if ($request->has('estado')) {
        $estado=1;
      }

      if ($request->has('video')) {
        $video=$request->video;
        $contenido=$video;
        $resumen="";
      }else {
        $video="";
        $contenido=$request->contenido;
        $resumen=$request->resumen;
      }
      if ($request->hasfile('imagen')) {
        $this->validate($request, [
        'imagen' => 'required|dimensions:width=480,height=360',
      ]);
        $file=$request->imagen;
        $slug = Str::slug($request->titulo);
        $imageFileName = $slug . '.' . $file->getClientOriginalExtension();
        $public = \Storage::disk('public');
        $public->put(carpetaslider().'/'.$imageFileName, file_get_contents($request->image), 'public');


        DB::table('cms_post')->where('post_id',$request->id)->update(['post_imagen'=>$imageFileName]);
      }


      DB::table('cms_post')->where('post_id',$request->id)->update(['post_titulo'=>$request->titulo,
      'post_contenido'=>$contenido,'post_resumen'=>$resumen,'post_tags'=>$request->tags,
      'post_video'=>$video,'post_estado'=>$estado,'post_slug'=>$slug,'post_categoria'=>$request->categoria]);

      return back();
  }
  public function newpost()
  {
    validaradministrador();
        $categorias=DB::table('cms_listas')->where('id_tipolista',4)->select('nombre_lista','valor_item')->orderby('valor_item','asc')->get();
    return view('admin/post/new')->with(array('categorias' => $categorias ));
  }
  public function savepost(Request $request)
  {
    validaradministrador();
    $todo=$request->all();
    $this->validate($request, [
    'titulo' => 'required',
  ]);

    if ($request->has('estado')) {
      $estado=1;
    }else {
      $estado=0;
    }
    if ($request->tipo==1) {
      $this->validate($request, [
      'titulo' => 'required',
      'contenido' => 'required',
      'resumen' => 'required',
    ]);
    $contenido=$request->contenido;
    $resumen=$request->resumen;
      $video='';
    }else {
      $this->validate($request, [
      'titulo' => 'required',

    ]);
      $contenido=$request->video;
      $resumen='';
      $video=$request->video;
    }

    if ($request->hasfile('imagen')) {
      $this->validate($request, [
      'imagen' => 'required|dimensions:width=480,height=360',
    ]);

      $file=$request->imagen;
      $slug = Str::slug($request->titulo);
      $imageFileName = $slug . '-480x360.' . $file->getClientOriginalExtension();
      //return public_path();
      //return $file->getClientOriginalName();
      $public = \Storage::disk('public');

      $public->put(carpetapost().'/'.$imageFileName, file_get_contents($request->imagen), 'public');


      $image = \Image::make($request->imagen);
      $image->resize(260, 200);
      $imagename = $slug . '-260x200.' . $file->getClientOriginalExtension();
      $public->put(carpetapost().'/'.$imagename, $image->encode(), 'public');
      $url=$imageFileName.','.$imagename;
    }else {

      $url="";
    }

    $fecha=Carbon::now();
    $slug = Str::slug($request->titulo);
    DB::table('cms_post')->insert(
    ['post_titulo' => $request->titulo,'post_tipo' => $request->tipo,'post_categoria' => $request->categoria,'post_contenido' =>$contenido,
    'post_resumen' => $resumen,'post_slug' => $slug,'post_tags' => $request->tags,'post_estado' => $estado,
    'post_fecha_registro' =>  $fecha,'post_imagen'=>$url]
);
    return redirect('admin/post');
  }
}
