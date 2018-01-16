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

    public function addTrack($track_id, $user_id){
        return Cart::create([
            'track_id' => $track_id,
            'user_id' => $user_id,
        ]);
    }
}
