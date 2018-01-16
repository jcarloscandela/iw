@extends('layout')
@section('cabecera')
<h1 style="margin:2%">{{$artist->name}}</h1>
@endsection
@section('contenido')
<!-- <div class="">
  <div class="" style="padding-right:20%; padding-left:5%">


  </div>
</div> -->
<div class="media" style="padding-right:20%; padding-left:2%">
    <div class="media-left">
      <img src="{{ asset($artist->picture) }}" alt="profile pic" class="media-object " style="margin-right:5%">
      <!--  -->
    </div>
    <div class="media-body">
      <p>{{$artist->biography}}</p>
    </div>
  </div>
  <hr>



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
        <?php
          $genre = $genre = DB::table('genres')
                        ->where('id', $track->genre_id)
                        ->get()->first();
        
        ?>
      <td>{{$genre->name}}</td>
       <td>{{$track->bpm}}</td>
       <td>{{$track->key}}</td>
       <td>{{$track->duration}}</td>
       <td>{{$track->price}}</td>
    </tr>
    @endforeach
  </tbody>
</table>


@stop
