<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Artist;
class EditController extends Controller
{
    public function artists(){
      $artists = Artist::All();
      return view('edit.artists', compact('artists'));
    }

    public function tracks(){

    }

    public function genres(){

    }
}
