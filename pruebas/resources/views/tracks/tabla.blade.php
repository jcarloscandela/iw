@extends('layout')

@section('cabecera')
<h1 style="margin:2%">Tracks</h1>
@endsection

@section('contenido')

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
     <?php
        $artist = $artist = DB::table('artists')
                       ->where('id', $track->artist_id)
                       ->get()->first();
        $aux = str_replace(" ", "_", $artist->name)
      ?>
     <td><a href="{{url('artist')}}/{{$aux}}">{{$artist->name}}</a> </td>
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
