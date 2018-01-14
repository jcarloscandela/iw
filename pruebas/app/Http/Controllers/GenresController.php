<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class GenresController extends Controller
{
    public function create(Request $request){

      DB::table('genres')->insert(['name' => $request->input('name')]);
      return back()->with('success','Genre added successfully');
    }
}
