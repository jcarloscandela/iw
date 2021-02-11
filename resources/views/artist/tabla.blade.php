@extends('layout')
@section('css')

@endsection
@section('cabecera')
<h1 style="margin:2%">Artists</h1>
@endsection

@section('contenido')
<div class="container" style="margin-bottom:20px">
  <ul class="list-inline">
    @foreach($artists as $artist)
    <?php $aux = str_replace(" ", "_", $artist->name) ?>
    <li class="jumbotron" style="background-image:url({{$artist->picture}})">
      <a href="{{url('artist')}}/{{$aux}}" style="color:white; font-size:large; font-weight:bold">
        {{$artist->name}}
      </a>
    </li>
    @endforeach
  </ul>
</div>



@stop
