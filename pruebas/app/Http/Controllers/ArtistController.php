<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Artist;
use App\Http\Controllers\Controller;

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
}
