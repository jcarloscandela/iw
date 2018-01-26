<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Track;
use App\Lists;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\URL;

class ListsController extends Controller
{
    public function myLists(){
        return view('lists.mylists');
      }

      public function createList(Request $request){
        $this->validate($request, [
          'title' => 'required|max:40',
          'info' => 'required|max:255',
        ]);

        DB::table('lists')->
        insert(['title' => $request->input('title'),
        'info' => $request->input('info'),
        'user_id' => $request->input('user_id')]);
        return back()->with('success','List added successfully');


      }
}
