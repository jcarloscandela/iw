<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Track;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\URL;

class ListsController extends Controller
{
    public function myLists(){
        return view('lists.mylists');
      }
    
      public function createList(Request $request){

        DB::table('lists')->
        insert(['title' => $request->input('title'),
        'info' => $request->input('info'),
        'user_id' => $request->input('user_id')]);
        return back()->with('success','List added successfully');

      
      }
}
