@extends('layouts.app')
@section('content')

    <h2>Artists</h2>

    <ol>
      @foreach($artists as $artist)
      <?php $aux = str_replace(" ", "_", $artist->name) ?>
      <li> <a href="{{url('artist')}}/{{$aux}}">{{$artist->name}}</a> </li>
      @endforeach
    </ol>


@stop
