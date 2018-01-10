<?php

namespace App\Http\Controllers;
use View;
use App\Track;
use Yajra\Datatables\Facades\Datatables;
use Illuminate\Http\Request;

class TracksController extends Controller
{   
    public function index(){
        $tracks = Track::All();
        return view('tracks.tabla', compact('tracks'));
    }
   
}
