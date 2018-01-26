<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class GenresController extends Controller
{
    public function create(Request $request){
      $this->validate($request, [
        'name' =>  'required',
      ]);
      DB::table('genres')->insert(['name' => $request->input('name')]);
      return back()->with('success','Genre added successfully');
    }

    public function update(Request $request){
       $this->validate($request, [
         'name' =>  'required',
       ]);
       $name = $request->input('name');
       DB::table('genres')->where('name', $request->input('selGenre'))
                          ->update(['name' => $name]);
       return back()->with('success','Genre updated successfully');
    }

    public function delete(Request $request){
      DB::table('genres')->where('id', $request->input('idGenre'))->delete();
      return back()->with('success','Genre deleted successfully');
    }
}
