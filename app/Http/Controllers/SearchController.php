<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SearchController extends Controller
{
  public function search(Request $request){
    if(empty($request->input('search'))){
        return back();
    }
    $searchValue = $request->input('search');
    $artists = DB::table('artists')->where('name', 'like', '%'.$searchValue."%")->get();
    $tracks = DB::table('tracks')->where('title', 'like', '%'.$searchValue."%")->get();

    //dd($artists, $tracks);
    return view('search.search', compact('artists', 'tracks', 'searchValue'));
  }
}
