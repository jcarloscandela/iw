<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Artist;
use App\Genre;
use App\Track;
class EditController extends Controller
{
    public function artists(){
      $artists = Artist::All();
      return view('edit.artists', compact('artists'));
    }

    public function tracks(){
      $artists = Artist::All();
      $genres = Genre::All();
      $tracks = Track::All();
      return view('edit.tracks', compact('artists', 'genres', 'tracks'));
    }

    public function genres(){
      return view('edit.genres');
    }
}
