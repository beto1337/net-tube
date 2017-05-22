<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use DB;

class UsuariosController extends Controller
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
     $usuarios=DB::table('users')->get();
     return view('admin/usuarios/index')->with(array('user'=>$usuarios));
   }
}
