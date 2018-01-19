@extends('layout')

@section('cabecera')
<h1 style="margin:2%">Tracks</h1>
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
     @if (!Auth::guest())
     <td>
       <?php
        $auth = false;
          if(Auth::user()){
            $carrito = DB::table('cart')
                          ->where('track_id', $track->id)
                          ->where('user_id', Auth::user()->id)
                          ->count();
            if($carrito != 1){
              $mostrar=true;
            }else{
              $mostrar=false;
            }
            $auth=true;
        }

        if(Auth::user()){
          $isInOrders = DB::table('orders')
                        ->where('track_id', $track->id)
                        ->where('user_id', Auth::user()->id)
                        ->count();
          if($isInOrders != 0){
            $mostrarOrders=false;
          }else{
            $mostrarOrders=true;
          }
      }
        ?>
        @if($auth)
            @if($mostrarOrders)
                @if ($mostrar)
                <form method="POST" action="{{url('/cart')}}">
                  <input type="hidden" name="track_id" value="{{$track->id}}">
                  <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                  <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <button type="submit" class="btn" style="background:#ff53a0; color:#fff;" >{{$track->price}}€</button>
                </form>
                @else 
                <button disabled class="btn" style="background:#ff53a0; color:#fff;" >You have the track on the cart</button>
                @endif
           @else
           <button disabled class="btn" style="background:#ff53a0; color:#fff;" >You already bought the track</button>
           @endif    
        @else
           <a href="{{url('/login')}}" class="btn" style="background:#ff53a0; color:#fff;" >{{$track->price}}€</button>
        @endif
    </td>
    @else
      <td>
        <form method="GET" action="login">
          <button type="submit" class="btn" style="background:#ff53a0; color:#fff;" >{{$track->price}}€</button>
        </form>
      </td>
    @endif
  </tr>
  @endforeach
  </tbody>
</table>


@stop
