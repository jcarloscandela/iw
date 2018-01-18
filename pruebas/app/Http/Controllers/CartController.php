<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use View;
use App\Cart;
use Yajra\Datatables\Facades\Datatables;
use Illuminate\Support\Facades\DB;

class CartController extends Controller
{
    public function showCart(){
        //$tracks = Track::All();
        return view('cart.tabla', compact('tracks'));
    }

    public function create(Request $request){
        DB::table('cart')->insert(['track_id' => $request->input('track_id'),'user_id' => $request->input('user_id')]);
        return back()->with('success','Track added successfully to user cart');
    }

    public function addTrack($track_id, $user_id){
        return Cart::create([
            'track_id' => $track_id,
            'user_id' => $user_id,
        ]);
    }

    public function delete(Request $request){
        $track_id = $request->input('track_id');
        $user_id = $request->input('user_id');
        DB::table('cart')->where('track_id', '=', $track_id)->where('user_id', '=', $user_id)->delete();
        return back()->with('success','Track successfully deleted from the cart');
    }
}
