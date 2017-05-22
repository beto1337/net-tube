<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Storage;
use DB;
use Auth;
use Illuminate\Support\Str as Str;

class SliderController extends Controller
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
   $imagenes=DB::table('slider')->get();
   return view('admin/slider/index')->with(array('imagenes'=>$imagenes));
   }
   public function newslider()
   {
     validaradministrador();
     return view('admin/slider/new');
   }

   public function saveslider(Request $request)
   {
     validaradministrador();
     $estado=1;
     $this->validate($request, [
     'link' => 'required',
     'nombre' => 'required',
     'descripcion' => 'required',
     'imagen' => 'required|dimensions:width=1600,height=400',
   ]);

   if ($estado==0) {
   $posicion=0;
   }else {
     $posicion=DB::table('slider')->where('estado',1)->max('posicion');
     if (empty($posicion)) {
       $posicion=1;
     }else {
       $posicion=$posicion+1;
     }
   }

     if ($request->hasfile('imagen')) {
       $file=$request->imagen;
       $slug = Str::slug($request->nombre);
       $imageFileName = $slug . '.' . $file->getClientOriginalExtension();
       $public = \Storage::disk('public');
       $public->put(carpetaslider().'/'.$imageFileName, file_get_contents($request->imagen), 'public');
       DB::table('slider')->insert(['nombre'=>$slug,'descripcion'=>$request->descripcion,'posicion' =>$posicion,'ruta'=> $imageFileName,'estado'=>$estado, 'link'=>$request->link]);
       return redirect('admin/slider');
     }else {
       return "no guardado";
     }
   }
   public function editslider($id)
   {
     validaradministrador();
     $slider=DB::table('slider')->where('id',$id)->get();
     return view('admin/slider/edit')->with(array('slider'=>$slider));
   }
   public function editar(Request $request)
   {
     validaradministrador();
     $this->validate($request, [
     'link' => 'required',
     'nombre' => 'required',
     'descripcion' => 'required',
    ]);

   if ($request->hasfile('imagen')) {
    $this->validate($request, [
    'imagen' => 'required|dimensions:width=1600,height=400',
    ]);
    $file=$request->imagen;
    $nombreimagen=str_replace(" ", "-", $request->nombre);
    $imageFileName = $nombreimagen . '.' . $file->getClientOriginalExtension();
    $public = \Storage::disk('public');
    $filePath = '/slider'.'/' . $imageFileName;
    $public->put($filePath, file_get_contents($request->imagen), 'public');
    $url='http://localhost/metromusica/storage/app/public'.$filePath;
    DB::table('slider')->where('id',$request->id)->update(['ruta'=>$url]);
   }
   $posicion=$request->posicion;
   $estado=0;
   if ($request->has('estado')) {
     $estado=1;
   }else {
     $posicion=0;
   }
  DB::table('slider')->where('id', $request->id)->update(['nombre'=>$request->nombre,
  'descripcion'=>$request->descripcion,'estado' =>$estado,'link'=>$request->link,
  'posicion'=>$posicion]);
  return back();
  }

}
