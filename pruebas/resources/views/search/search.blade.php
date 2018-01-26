@extends('layout')
@section('css')
<style media="screen">
h1 {
  clear: both;
  margin-left: 30px;
}
</style>
@endsection

@section('cabecera')
<script src="./js/audio.min.js"></script>
@endsection

@section('contenido')
<script>
  audiojs.events.ready(function() {
    var as = audiojs.createAll();
  });
</script>
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
         <td>{{$track->title}} <audio src="{{ asset($track->url)}}" preload="none" ></audio></td>
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
                    <input type="hidden" name="search" value="{{$searchValue}}">
                    <input type="hidden" name="track_id" value="{{$track->id}}">
                    <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                  <button type="submit" class="btn" style="background:#ff53a0; color:#fff;" >{{$track->price}}€</button>
                  </form>
                  @else
                  <button disabled class="btn" style="background:#ff53a0; color:#fff;" >You have the track on the cart</button>
                  @endif
             @else
             <button disabled class="btn" style="background:#94d504; color:#262626;" >You already bought the track</button>
             @endif
          @else
             <a href="{{url('/login')}}" class="btn" style="background:#ff53a0; color:#fff;" >{{$track->price}}€</button>
          @endif
        </td>
        <td>
            @if($auth)

                      <?php
                            if(Auth::user()){
                              $lists = DB::table('lists')
                                            ->where('user_id', Auth::user()->id)->get();
                              }
                              $listsContainTrack = DB::table('tracktolists')->select('list_id')->where('track_id', $track->id)->get();
                          ?>
                        <form method="POST" action="{{url('/tracksList')}}">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <input type="hidden" name="track_id_list" value="{{$track->id}}">
                        <input type="hidden" name="search" value="{{$searchValue}}">
                        <div class="form-group">
                          <select class="form-control" id="list_id" name="list_id" style="width:300px" onchange="this.form.submit()">
                            <option disabled selected value> Select a List </option>
                          @foreach ($lists as $list)
                          <?php
                           $encontrado = false;
                           foreach( $listsContainTrack as $pruebalist){
                             if($pruebalist->list_id == $list->id){
                               $encontrado = true;
                              }
                          }
                          ?>
                            @if(!$encontrado)
                              <option value="{{$list->id}}">{{$list->title}}</option>
                            @endif
                          @endforeach
                          </select>
                      </div>
                      </form>
            @else
               <a href="{{url('/login')}}" class="btn" style="background:#ff53a0; color:#fff;" >Add to list</button>
            @endif
        </td>
      </tr>
      @endforeach
      </tbody>
    </table>
  </div>
  @endif

@stop
