@extends('layout')

@section('subtitulo')
<h3>{{$donde}}</h3>
@stop

@section('contenido')
  <h2>Agenda</h2>
  <ul>
    @foreach($lista as $p)
      <li>{{$p->nombre}}</li>
    @endforeach
  </ul>

@stop
