<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use View;
use App\Orders;
use App\Cart;
use Yajra\Datatables\Facades\Datatables;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class OrdersController extends Controller
{
    public function create(Request $request){
        $tracksInput = $request->input('tracks_id');
        $cartInput = $request->input('cart_id');
        $tracks = explode('a', $tracksInput);
        $carts = explode('c', $cartInput);
        $user_id= $request->input('user_id');
        
        
        foreach ($tracks as $track){
            DB::table('orders')->insert(['track_id' => $track,'user_id' => $user_id ]);  
        }
        
        foreach ($carts as $cart){
            DB::table('cart')->where('id', '=', $cart)->delete();

        }
        return back()->with('success','Track added successfully to user orders');
       
    }

}
