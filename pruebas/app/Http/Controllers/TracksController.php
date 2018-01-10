<?php

namespace App\Http\Controllers;
use View;
use App\Track;
use Yajra\Datatables\Facades\Datatables;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TracksController extends Controller
{
    public function index(){
        $tracks = Track::All();
        return view('tracks.tabla', compact('tracks'));
    }

   public function showByGenre($genre){
     $tracks = DB::table('tracks')
                    ->where('genre', $genre)
                    ->get();
     return view('tracks.tabla', compact('tracks'));
   }
}
