<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use View;
use App\Cart;
use Yajra\Datatables\Facades\Datatables;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function showCart(){
        //$tracks = Track::All();
        return view('cart.tabla', compact('tracks'));
    }

    public function create(Request $request){
        DB::table('cart')->insert(['track_id' => $request->input('track_id'),'user_id' => $request->input('user_id')]);
        if(!empty($request->input('search'))){
          $searchValue = $request->input('search');
          $artists = DB::table('artists')->where('name', 'like', '%'.$searchValue."%")->get();
          $tracks = DB::table('tracks')->where('title', 'like', '%'.$searchValue."%")->get();
          return view('search.search', compact('artists', 'tracks', 'searchValue'));
        }
        return back()->with('success','Track added successfully to user cart');
    }

    public function addTrack($track_id, $user_id){
        return Cart::create([
            'track_id' => $track_id,
            'user_id' => $user_id,
        ]);
    }

    public function deleteTrack(Request $request){
      // if(Auth::guest()){
      //   abort(404, 'Not what are you looking for');
      // }
      $track = $request->input('id');
      DB::table('cart')->where('track_id', $track)
                       ->where('user_id', Auth::user()->id)->delete();
      return back()->with('success','Track deleted successfully');
    }
}
