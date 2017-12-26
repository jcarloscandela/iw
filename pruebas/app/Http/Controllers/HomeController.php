<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use View;
use App\agenda;
use Yajra\Datatables\Facades\Datatables;
class HomeController extends Controller
{
    //
    public function index()
    {
        return View::make('home/principal')->with("donde", "Inicio");
    }
    public function listado()
    {
      $personas = agenda::all();
      return View::make('home/listado')
      ->with("donde", "Listado de personas")
      ->with("lista", $personas);
    }
    public function tabla() {
      return View::make('home/tabla')
      ->with("donde", "Listado de personas");
    }

    public function tabla_ajax() {
      $personas = agenda::all();
      return Datatables::collection($personas)->make(true);
    }
}
