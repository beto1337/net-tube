<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use View;
use DB;
use Carbon\Carbon;
use Storage;
use Illuminate\Support\Str as Str;
use Image;

class ListatopController extends Controller
{
    public function index()
    {
     return view('top/topprueba');
    }
    public function detallado()
    {
      return view('top/detallado');
    }
    public function comprar()
    {
      return view('top/comprar');
    }
}
