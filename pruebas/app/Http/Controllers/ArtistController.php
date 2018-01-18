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
      $this->validate($request, [
        'name' => 'required|max:255',
        'biography' => 'required',
        'picture' => 'required|image|max:1024',
      ]);
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
      $this->validate($request, [
        'biography' => 'required',
        'picture' => 'required|image|max:1024',
      ]);
      $id_artist = DB::table('artists')
                      ->where('name', '=', $request->input('nameArtist'))
                      ->get()->first()->id;
      // dd($id_artist);
      /*if($request->has('name')){
        DB::table('artists')
                  ->where('id', $id_artist)
                  ->update(['name' => $request->input('name')]);
      }*/
      if($request->has('biography')){
        DB::table('artists')
                  ->where('id', $id_artist)
                  ->update(['biography' => $request->input('biography')]);
      }
      if($request->hasFile('picture') && $request->file('picture')->isValid()){
        $file = $request->file('picture');
  			$file->move('imgs', $file->getClientOriginalName());

        DB::table('artists')
                  ->where('id', $id_artist)
                  ->update(['picture' => 'imgs/'.$file->getClientOriginalName()]);
      }
      return back()->with('success', 'Artist updated successfully');
    }
    public function delete(Request $request){
      $name = $request->input('name');
      DB::table('artists')->where('name', '=', $name)->delete();
      return back()->with('success','Artist deleted successfully');
    }
}
