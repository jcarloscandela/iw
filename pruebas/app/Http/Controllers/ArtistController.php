<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Artist;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\URL;


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
      // URL::to('/artist/'.$nameArtist);
      return view('artist.info', compact('artist', 'tracks'));
      //return view('artist.info')->with('artist', $artist);
    }

    public function index(){
        $artists = Artist::All();
        return view('artist.tabla', compact('artists'));
    }

    public function create(Request $request){
      //dd($request->all());

    //  return back()->with('success','Image Upload successful');
      if($request->hasFile('picture')){
  			$file = $request->file('picture');
  			$file->move('imgs', $file->getClientOriginalName());
  			// echo '<img src="imgs/'.$file->getClientOriginalName().'" />';
        DB::table('artists')->insert(
            ['name' => $request->input('name'), 'picture' => 'imgs/'.$file->getClientOriginalName(), 'biography' => $request->input('biography')]
        );
        return back()->with('success','Artist added successfully');
  		}
      else {
        //return back()->with('error','Error empty input');
        return redirect()->back()->with('alert', 'Error! Some input is empty, please fill them all');
      }
    }

    public function update(Request $request){
        return back();
    }
    public function delete(Request $request){
      $name = $request->input('name');
      DB::table('artists')->where('name', '=', $name)->first()->delete();
    }
}
