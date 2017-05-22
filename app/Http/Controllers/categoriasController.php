<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use DB;
use Carbon\Carbon;
use Storage;
use Illuminate\Support\Str as Str;

class categoriasController extends Controller
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
    $categorias=DB::table('cms_listas')->where('id_tipolista',4)->get();
    return view('admin/categorias/index')->with(array('categorias'=>$categorias));
  }
  public function editarcategoria($id)
  {
    validaradministrador();
    $categorias=DB::table('cms_listas')->where('valor_item',$id)->where('id_tipolista',4)->get();
    return view('admin/categorias/edit')->with(array('categorias'=>$categorias));
  }
  public function eliminarcategoria($id)
  {
    validaradministrador();
    DB::table('cms_listas')->where('id_tipolista',4)->where('valor_item',$id)->delete();
    return redirect('/admin/categorias');
  }
  public function actualizarcategoria(Request $request)
  {

    $this->validate($request, [
    'nombre' => 'required',
  ]);
  $slug = Str::slug($request->nombre);
  DB::table('cms_listas')->where('id_tipolista',4)->where('valor_item',$request->id)->update(
  ['nombre_lista' => $slug,'descripcion' =>$request->descripcion]
);

    return redirect('admin/categorias');
  }
  public function newcategoria()
  {
    validaradministrador();
    return view('admin/categorias/new');
  }
  public function savecategoria(Request $request)
  {
    validaradministrador();
    $this->validate($request, [
    'nombre' => 'required',
  ]);
    $slug = Str::slug($request->nombre);
    $valor_item=DB::table('cms_listas')->where('id_tipolista',4)->max('valor_item');
    $valor_item=$valor_item+1;
    DB::table('cms_listas')->insert(
    ['nombre_lista' => $slug,'id_tipolista' => 4,'descripcion' =>$request->descripcion,'valor_item'=>$valor_item]
);
    return redirect('admin/categorias');
  }


}
