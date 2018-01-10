@extends('layout')

@section('cabecera')
<h3>{{$donde}}</h3>
@endsection

@section('contenido')
@include('menu')
<h2>En esta web podrás hacer</h2>
@endsection
