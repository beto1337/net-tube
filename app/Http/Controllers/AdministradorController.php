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
    public function guardarimg(Request $request)
    {
      validaradministrador();
      if ($request->hasfile('logo')) {
        $this->validate($request, [
        'logo' => 'required|dimensions:width=140,height=40',
      ]);
      $logo=$request->logo;
      $imageFileName = "logo" . '.' . $logo->getClientOriginalExtension();
      $public = \Storage::disk('public');
      $public->put('/'.$imageFileName, file_get_contents($request->logo), 'public');
      DB::table('cms_parametros')->where('parametro_id',1)->update(['parametro_logo'=>$imageFileName]);
      }

      if ($request->hasfile('logo_responsive')) {
        $this->validate($request, [
        'logo_responsive' => 'required|dimensions:width=119,height=29',
      ]);
      $logo=$request->logo_responsive;
      $imageFileName = "logo-small" . '.' . $logo->getClientOriginalExtension();
      $public = \Storage::disk('public');
      $public->put('/'.$imageFileName, file_get_contents($request->logo_responsive), 'public');
      DB::table('cms_parametros')->where('parametro_id',1)->update(['parametro_logox29'=>$imageFileName]);
      }

      if ($request->hasfile('icono')) {
        $this->validate($request, [
        'icono' => 'required|dimensions:width=36,height=36',
      ]);
      $logo=$request->icono;
      $imageFileName = "icono" . '.' . $logo->getClientOriginalExtension();
      $public = \Storage::disk('public');
      $public->put('/'.$imageFileName, file_get_contents($request->icono), 'public');
      DB::table('cms_parametros')->where('parametro_id',1)->update(['parametro_icono'=>$imageFileName]);

      }

      return back();

    }
}
