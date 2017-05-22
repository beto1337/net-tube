<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Http\Requests;

class DireccionesController extends Controller
{
    public function index($categoria, $slug)
    {
      $existecategoria=DB::table('cms_listas')->where('id_tipolista',4)->where('nombre_lista',$categoria)->count();
      if ($existecategoria>0) {
        $categoria=DB::table('cms_listas')->where('id_tipolista',4)->where('nombre_lista',$categoria)->select('valor_item')->get();
        foreach ($categoria as $key) {
          $cat=$key->valor_item;
        }
      }else {

      return view('errors/404');
    }
    $existepost=DB::table('cms_post')->where('post_categoria',$cat)->where('post_slug',$slug)->count();
    $tipo=DB::table('cms_post')->where('post_categoria',$cat)->where('post_slug',$slug)->get();
    foreach ($tipo as $key) {
      $tip=$key->post_tipo;
    }
    if ($existepost>0) {
      if ($tip==1) {//post
        return view('tube/post')->with(array('post' =>$tipo ));
          }elseif ($tip==2) {//video
            return view('tube/video');
      }
    }else {
          return view('errors/404');
    }

    }

    public function paginas($slug)
    {

    $existepagina=DB::table('cms_paginas')->where('pagina_slug',$slug)->count();

    if ($existepagina>0) {
    $pagina=DB::table('cms_paginas')->where('pagina_slug',$slug)->get();
    return view('tube/paginas')->with(array('pagina' =>$pagina ));
    }else {
    return view('errors/404');
    }

    }




}
