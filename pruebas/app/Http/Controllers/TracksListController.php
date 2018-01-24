<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Track;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\URL;

class TracksListController extends Controller
{
    public function create(Request $request){
        DB::table('tracktolists')->insert(['list_id' => $request->input('list_id'),'track_id' => $request->input('track_id_list')]);
        if(!empty($request->input('search'))){
          $searchValue = $request->input('search');
          $artists = DB::table('artists')->where('name', 'like', '%'.$searchValue."%")->get();
          $tracks = DB::table('tracks')->where('title', 'like', '%'.$searchValue."%")->get();
          return view('search.search', compact('artists', 'tracks', 'searchValue'))
                      ->with('success','Track added successfully to list');
        }
        return back()->with('success','Track added successfully to list');
    }
}
