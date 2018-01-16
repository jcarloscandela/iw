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
<<<<<<< HEAD
                    ->where('genre_id', $genre)
=======
                    ->where('genre_id', $genre_id->id)
>>>>>>> Guille
                    ->get();

     return view('tracks.tabla', compact('tracks'));
   }

   public function create(Request $request){
     $title = $request->input('title');
     $bpm = $request->input('bpm');
     $key = $request->input('key');
     $duration = date("H:i:s", strtotime($request->input('duration')));
     $price = $request->input('price');
     $genre = DB::table('genres')
                  ->where('name', $request->input('selGenre'))
                  ->get()->first();
     $release = $request->input('date');
     $artist = DB::table('artists')
                  ->where('name',$request->input('selArtist'))
                  ->get()->first();
     //echo($title.'<br>'.$bpm.'<br>'.$key.'<br>'.$duration.'<br>'.$price.'<br>'.$genre->id.'<br>'.$release.'<br>'.$artist->id);
     DB::table('tracks')->insert(
         ['title' => $title,
          'bpm' => $bpm,
          'key' => $key,
          'duration' => $duration,
          'price' => $price,
          'genre_id' => $genre->id,
          'release' => $release,
          'artist_id' => $artist->id]
     );
     return back()->with('success','Track added successfully');
   }
}
