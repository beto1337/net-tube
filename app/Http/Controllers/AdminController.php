<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Storage;
use DB;
use Auth;

class AdminController extends Controller
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
          return view('admin/home');
      }

      public function index2()
      {
      validaradministrador();
        $post=DB::table('cms_post')->where('post_estado',1)->get();
        $imagenes=DB::table('slider')->where('estado',1)->orderby('posicion','desc')->get();
        return view('tube/prueba')->with(array('imagenes'=>$imagenes,'post'=>$post));
      }

      public function actualizarslider(Request $request)
      {
        validaradministrador();
        $todo=$request->all();
  //      return $todo;
        //echo $link=$request->$idf[0];
        //$posicion=$request->$idf[1];

        $ids=DB::table('slider')->select('id')->get();
        foreach ($ids as $id) {
        $idf=$id->id;
        $datos=$request->$idf;
        $link=$datos[0];
        $posicion=$datos[1];
        $contador=count($request->$idf);
          if ($contador>2) {
            DB::table('slider')->where('id', $idf)->update(['estado' => 1,'link'=>$link,'posicion'=>$posicion]);
          }else {
            DB::table('slider')->where('id', $idf)->update(['estado' => 0,'link'=>$link,'posicion'=>0]);
          }
        }

        return back();
        //$todo=$request->all();
        //return $todo;
      }
}
