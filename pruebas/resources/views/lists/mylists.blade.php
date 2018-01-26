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
table{
  margin-bottom: 30px;
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
<div class="container fill" height="100%">

  <!-- Nav tabs -->
  <ul class="nav nav-tabs" role="tablist">
    <li role="presentation" class="active"><a href="#mylists" aria-controls="home" role="tab" data-toggle="tab">My lists</a></li>
    <li role="presentation"><a href="#create" aria-controls="profile" role="tab" data-toggle="tab">Create</a></li>
    <li role="presentation"><a href="#delete" aria-controls="profile" role="tab" data-toggle="tab">Delete</a></li>
  </ul>

  <!-- Tab panes -->
  <div class="tab-content fill">
    <div role="tabpanel" class="tab-pane active" id="mylists" style="height:100%; min-height:100%;">
    <?php
    $lists = DB::table('lists')
    ->where('user_id', Auth::user()->id)
    ->get();
    ?>


    @foreach($lists as $list)
    <?php
    $tracks = DB::table('tracks')
    ->join('tracktolists', 'tracks.id', '=', 'tracktolists.track_id')
    ->where('list_id', $list->id)
    ->get();
    ?>
    <h1>{{$list->title}}</h1>
     <h4>Info: {{$list->info}}</h4>
     <table class="table">
  <thead class="thead-dark">
    <tr>
      <th scope="col" width="30%">Title</th>
      <th scope="col" width="15%">Artist</th>
      <th scope="col" width="8%">Genre</th>
      <th scope="col" width="4%">BPM</th>
      <th scope="col" width="2%">Key</th>
      <th scope="col" width="7%">Duration</th>
      <th scope="col" width="5%">Price</th>
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
                          ->where('track_id', $track->track_id)
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
                        ->where('track_id', $track->track_id)
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
                  <input type="hidden" name="track_id" value="{{$track->track_id}}">
                  <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                  <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <button type="submit" class="btn" style="background:#ff53a0; color:#fff;" >{{$track->price}}€</button>
                </form>
                @else
                <button disabled class="btn" style="background:#ff53a0; color:#fff;" ><p> You have the track </p><p>on the cart</p> </button>
                @endif
           @else
           <button disabled class="btn" style="background:#94d504; color:#262626;" ><p>You already </p><p>bought the track</p></button>
           @endif
        @else
           <a href="{{url('/login')}}" class="btn" style="background:#ff53a0; color:#fff;" >{{$track->price}}€</button>
        @endif
        </td>
        <td>
          <form action="delTrackList" method="post">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <input type="hidden" name="list_id" value="{{$list->id}}">
            <input type="hidden" name="track_id" value="{{$track->track_id}}">
            <button type="submit" class="btn btn-primary" name="button"> x </button>
          </form>
        </td>
  </tr>
  @endforeach
  </tbody>
</table>


     <hr>
    @endforeach

  </div>

    <div role="tabpanel" class="tab-pane" id="create">
    @if (session('alert'))
          <div class="alert alert-danger text-center" id="alert" name="alert">
              {{ session('alert') }}
          </div>
          <script type="text/javascript">
            $(".alert").fadeOut(5000)
          </script>
      @endif
      @if (session('success'))
          <div class="alert alert-success text-center" id="alert" name="alert">
              {{ session('success') }}
          </div>
          <script type="text/javascript">
            $(".alert").fadeOut(5000)
          </script>
      @endif

      <div class="form-group container" style="margin-top:10px">
        {!! Form::open(['style' => "padding:5%; width:50%", 'class' => "center-block fill", 'action' => "ListsController@createList"]) !!}
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <div class="form-group" >
          <label for="name">Title</label>
          <input type="text" name="title" class="form-control " id="title" aria-describedby="titleHelp" placeholder="Enter list name">
        </div>
        <div class="form-group">
            <label for="sel1">Info</label>
            <input type="text" name="info" class="form-control " id="info" aria-describedby="titleHelp" placeholder="Enter some info of the list here">
          </div>
        <div class="form-group">
          <button type="submit" class="btn btn-primary" style="color:#ffff">Create</button>
        </div>
        <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">

      </form>
      </div>

      @if ($errors->any())
    <div class="alert alert-danger">
      <ul>
        @foreach ($errors->all() as $error)
          <li>{{ $error }}</li>
        @endforeach
      </ul>
    </div>
  @endif
    </div>
    <div role="tabpanel" class="tab-pane" id="delete">
      @foreach($lists as $list)
      <tr>
        <td><label>{{$list->title}}</label></td>
        <td>
          <form class="" action="delList" method="post">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <input type="hidden" name="idList" value="{{$list->id}}" ></input>
            <button type="submit" class="btn btn-primary" name="button">Delete</button>
          </form>
        </td>
      </tr>
      @endforeach
    </div>
</div>

@endsection
