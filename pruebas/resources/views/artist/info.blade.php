@extends('layouts.app')
@section('content')
<div class="">
  <h1>{{$artist->name}}</h1>
  <div class="">
    <img src="http://www.cochesenpie.es/images/sin-imagen.gif" style="float:left" alt="" height="10%" width="10%">
    <p style="float:left; margin-left:30px; margin-top:10px">{{$artist->biography}}</p>
  </div>
</div>



<table class="table">
  <thead class="thead-dark">
    <tr>
      <th scope="col">Title</th>
      <th scope="col">Genre</th>
      <th scope="col">BPM</th>
      <th scope="col">Key</th>
      <th scope="col">Duration</th>
      <th scope="col">Price</th>
    </tr>
  </thead>
  <tbody>
    @foreach($tracks as $track)
    <tr>
       <td>{{$track->title}}</td>
       <td>{{$track->genre}}</td>
       <td>{{$track->bpm}}</td>
       <td>{{$track->key}}</td>
       <td>{{$track->duration}}</td>
       <td>{{$track->price}}</td>
    </tr>
    @endforeach
  </tbody>
</table>


@stop
