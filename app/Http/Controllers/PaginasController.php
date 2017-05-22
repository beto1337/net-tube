<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use DB;
use Carbon\Carbon;
use Illuminate\Support\Str as Str;

class PaginasController extends Controller
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
     $postV=DB::table('cms_paginas')->whereNotIn('pagina_estado',[2])->get();
     return view('admin/paginas/index')->with(array('paginas'=>$postV));
   }
   public function newpagina()
   {
     validaradministrador();
     return view('admin/paginas/new');
   }

   public function savepagina(Request $request)
   {
     validaradministrador();
     $fecha=Carbon::now();
     $slug = Str::slug($request->titulo);

     DB::table('cms_paginas')->insert(
     ['pagina_titulo' => $request->titulo,'pagina_contenido' =>$request->contenido,
     'pagina_slug' => $slug,'pagina_tags' => $request->tags,'pagina_fecha_registro' =>  $fecha, 'pagina_estado'=>1,'pagina_descripcion'=>$request->descripcion]
 );
     return redirect('admin/pagina');
   }
   public function editpagina($id)
   {
     validaradministrador();
     $postV=DB::table('cms_paginas')->where('pagina_id',$id)->get();
     return view('admin/paginas/edit')->with(array('paginas'=>$postV));
   }

   public function editpaginaf(Request $request)
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

      $contenido=$request->contenido;

       DB::table('cms_paginas')->where('pagina_id',$request->id)->update(['pagina_titulo'=>$request->titulo,
       'pagina_contenido'=>$contenido,'pagina_tags'=>$request->tags,'pagina_estado'=>$estado,'pagina_slug'=>$slug,
     'pagina_descripcion'=>$request->descripcion]);

       return back();
   }
   public function deletepagina($id)
   {
     validaradministrador();
     DB::table('cms_paginas')->where('pagina_id',$id)->update(['pagina_estado'=> 2]);
     return redirect('/admin/pagina');
   }



}
