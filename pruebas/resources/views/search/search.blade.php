@extends('layout')
@section('css')
<style media="screen">
.fill {
  min-height: 100%;
  height: 100%;
}
#map {
    width: 100%;
    height: 100%;
    min-height: 100%;
}
body {                /* body - or any parent wrapper */
  display: flex;
  flex-direction: column;
  min-height: 100vh;
}

main {
  flex: 1;
}
</style>
@endsection

@section('contenido')

<div class="container fill">
  @if($artists->count()>0)
  <div class="">
    <h1>Artists</h1>
    @foreach ($artists as $artist)
    <?php $aux = str_replace(" ", "_", $artist->name) ?>
    <div class="thumbnail col-md-2">
      <a href="{{url('artist')}}/{{$aux}}">
        <img src="{{$artist->picture}}" alt="Lights" style="width:100%">
        <div class="caption">
          <p>{{$artist->name}}</p>
        </div>
      </a>
    </div>
    @endforeach
  </div>
  @endif
  @if($tracks->count()>0)
  <div class="">
    <h1>Tracks</h1>
    <table class="table">
      <thead class="thead-dark">
        <tr>
          <th scope="col" width="35%">Title</th>
          <th scope="col" width="15%">Artist</th>
          <th scope="col" width="10%">Genre</th>
          <th scope="col" width="10%">BPM</th>
          <th scope="col" width="10%">Key</th>
          <th scope="col" width="10%">Duration</th>
          <th scope="col" width="10%">Price</th>
        </tr>
      </thead>
      <tbody>
      @foreach($tracks as $track)
      <tr>
         <td>{{$track->title}} <audio src="./mp3/juicy.mp3" preload="none" ></audio></td>
         <?php
            $artist = $artist = DB::table('artists')
                           ->where('id', $track->artist_id)
                           ->get()->first();
            $aux = str_replace(" ", "_", $artist->name);
            $genre = $genre = DB::table('genres')
                           ->where('id', $track->genre_id)
                           ->get()->first();
          ?>
         <td><a href="{{url('artist')}}/{{$aux}}">{{$artist->name}}</a> </td>
         <td>{{$genre->name}}</td>
         <td>{{$track->bpm}}</td>
         <td>{{$track->key}}</td>
         <td>{{$track->duration}}</td>

         <td>
           <?php

              $carrito = DB::table('cart')
                            ->where('track_id', $track->id)
                            ->where('user_id', Auth::user()->id)
                            ->count();
              if($carrito != 1){
                $mostrar=true;
              }else{
                $mostrar=false;
              }

            ?>
           <form method="POST" action="{{url('/cart')}}">
              <input type="hidden" name="track_id" value="{{$track->id}}">
              <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
              <input type="hidden" name="_token" value="{{ csrf_token() }}">
             @if ($mostrar)<button type="submit" class="btn" style="background:#ff53a0; color:#fff;" >{{$track->price}}€</button>
             @else <button type="submit" disabled class="btn" style="background:#ff53a0; color:#fff;" >You have the track on the cart</button>
             @endif
           </form>
        </td>
      </tr>
      @endforeach
      </tbody>
    </table>
  </div>
  @endif
</div>

@stop
