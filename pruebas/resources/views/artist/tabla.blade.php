@extends('layout')

@section('cabecera')
<h1 style="margin:2%">Artists</h1>
@endsection

@section('contenido')

    <ol>
      @foreach($artists as $artist)
      <?php $aux = str_replace(" ", "_", $artist->name) ?>
      <li> <a href="{{url('artist')}}/{{$aux}}">{{$artist->name}}</a> </li>
      @endforeach
    </ol>


@stop
