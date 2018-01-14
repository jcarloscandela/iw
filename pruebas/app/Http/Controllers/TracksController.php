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
     $genre_id = DB::table('genres')
                    ->where('name', $genre)
                    ->get()->first();
     $tracks = DB::table('tracks')
                    ->where('genre_id', $genre_id->id)
                    ->get();

     return view('tracks.tabla', compact('tracks'));
   }
}
