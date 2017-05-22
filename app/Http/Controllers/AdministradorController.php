<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use DB;

class AdministradorController extends Controller
{
    //
    public function index()
    {
      validaradministrador();
      $entradas=DB::table('cms_parametros')->get();
      return view('admin/administrador/index')->with(array('entradas'=>$entradas));
    }
    public function guardarinfo(Request $request)
    {
      validaradministrador();
      $estado=0;
      if ($request->has('estado')) {
        $estado=1;
      }
      $todo=$request->all();
//      return $request->facebook;
      DB::table('cms_parametros')->where('parametro_id',1)->update(['parametro_titulo'=>$request->titulo,
      'parametro_descripcion'=>$request->descripcion,'parametro_keys'=>$request->tags,'parametro_correo'=>$request->correo,
      'parametro_url'=>$request->url,'parametro_estado'=>$estado,'parametro_facebook'=>$request->facebook,'parametro_twitter'=>$request->twitter,
      'parametro_analytics'=>$request->analitys,'parametro_instagram'=>$request->instagram]);

      return back();

    }
}
