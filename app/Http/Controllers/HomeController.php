<?php

/*
 * Taken from
 * https://github.com/laravel/framework/blob/5.2/src/Illuminate/Auth/Console/stubs/make/controllers/HomeController.stub
 */

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use Storage;
use DB;
use Auth;

/**
 * Class HomeController
 * @package App\Http\Controllers
 */
class HomeController extends Controller
{

      public function index()
      {
        $post=DB::table('cms_post')->where('post_estado',1)->get();
        $imagenes=DB::table('slider')->where('estado',1)->orderby('posicion','desc')->get();
        return view('tube/home')->with(array('imagenes'=>$imagenes,'post'=>$post));
      }
      public function index2()
      {
          return view('tube/home');
      }

}
