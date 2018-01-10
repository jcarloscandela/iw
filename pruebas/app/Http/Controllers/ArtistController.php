<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Artist;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class ArtistController extends Controller
{
    /**
     * Create a new artist instance.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store($name, $picture, $biography)
    {
        // Validate the request...

        $artist = new Artist;

        $artist->name = $name;
        $artist->picture = $picture;
        $artist->biography = $biography;

        $artist->save();
    }

    public function show($name){
      $nameArtist = str_replace("_", " ", $name);
      $artist = DB::table('artists')
                     ->where('name', $nameArtist)
                     ->get()->first();
      $tracks = DB::table('tracks')
                     ->where('artist_id', $artist->id)
                     ->get();
      return view('artist.info', compact('artist', 'tracks'));
      //return view('artist.info')->with('artist', $artist);
    }

    public function index(){
        $artists = Artist::All();
        return view('artist.tabla', compact('artists'));
    }
}
