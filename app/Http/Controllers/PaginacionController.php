<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use DB;
use Carbon\Carbon;
use Illuminate\Support\Str as Str;


class PaginacionController extends Controller
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
     $postV=DB::table('cms_paginas')->get();
     return view('admin/paginas/index')->with(array('paginas'=>$postV));
   }
   public function newpagina()
   {
     validaradministrador();
     return view('admin/paginas/new');
   }



   public function editpost($id)
   {
     validaradministrador();
     $postV=DB::table('cms_post')->where('post_id',$id)->get();
     return view('admin/post/edit')->with(array('post'=>$postV));
   }
   public function editpostf(Request $request)
   {
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
       DB::table('cms_post')->where('post_id',$request->id)->update(['post_titulo'=>$request->titulo,
       'post_contenido'=>$contenido,'post_resumen'=>$resumen,'post_tags'=>$request->tags,
       'post_video'=>$video,'post_estado'=>$estado,'post_slug'=>$slug]);

       return back();
   }
   public function newpaginacion()
   {
     validaradministrador();
     return view('admin/paginas/new');
   }
   public function savepaginacion(Request $request)
   {
     validaradministrador();
     $todo=$request->all();
     //return $todo;
     $fecha=Carbon::now();
     $slug = Str::slug($request->titulo);
     DB::table('cms_paginas')->insert(
     ['pagina_titulo' => $request->titulo,'pagina_contenido' =>$request->contenido,
     'pagina_slug' => $slug,'pagina_tags' => $request->tags,'pagina_fecha_registro' =>  $fecha]
 );
     return redirect('admin/pagina');
   }
}
