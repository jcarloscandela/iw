@extends('layouts.app')
@section('content')

<table class="table">
  <thead class="thead-dark">
    <tr>
      <th scope="col">Title</th>
      <th scope="col">Artist</th>
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
     <td>TODO Artist</td>
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
