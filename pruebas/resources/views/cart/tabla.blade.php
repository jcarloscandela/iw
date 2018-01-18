@extends('layout')

@section('cabecera')
<h1 style="margin:2%">Tracks in my cart</h1>
<script src="./js/audio.min.js"></script>
@endsection

@section('contenido')

<script>
  audiojs.events.ready(function() {
    var as = audiojs.createAll();
  });
</script>
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
  <?php
  $tracksCart =  DB::table('tracks')
  ->join('cart', 'tracks.id', '=', 'cart.track_id')->where('user_id', Auth::user()->id)
  ->get();
   ?>
  @foreach($tracksCart as $track)
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
     <?php
        $genre = $genre = DB::table('genres')
                       ->where('id', $track->genre_id)
                       ->get()->first();
       
      ?>
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

     @if ($mostrar == false)
     <form method="DELETE" action="{{url('/cart')}}">
     <button type="submit" class="btn" style="background:#ff53a0; color:#fff;" >X</button>
                                            <input type="hidden" name="track_id" value="{{$track->id}}">
                                            <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                                           <input type="hidden" name="_token" value="{{ csrf_token() }}">
    </form>
    @endif
     </td>
  </tr>
  @endforeach
  </tbody>
</table>


@stop
