@extends('layout')
@section('head')
    <link rel="stylesheet" href="//code.jquery.com/ui/1.11.2/themes/smoothness/jquery-ui.css">
@endsection
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
@section('js')
function showTrack(str) {
    if (str == "") {
        document.getElementById("txtHint").innerHTML = "";
        return;
    } else {
        if (window.XMLHttpRequest) {
            // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
        } else {
            // code for IE6, IE5
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("txtHint").innerHTML = this.responseText;
            }
        };
        xmlhttp.open("GET","edittrack?q="+str,true);
        xmlhttp.send();
    }
}
@endsection

@section('contenido')
<div class="container">

  <!-- Nav tabs -->
  <ul class="nav nav-tabs" role="tablist">
    <li role="presentation" class="active"><a href="#create" aria-controls="home" role="tab" data-toggle="tab">Create</a></li>
    <li role="presentation"><a href="#update" aria-controls="profile" role="tab" data-toggle="tab">Update</a></li>
    <li role="presentation"><a href="#delete" aria-controls="messages" role="tab" data-toggle="tab">Delete</a></li>
  </ul>
  <div class="" style="">
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
  <!-- Tab panes -->
  <div class="tab-content fill">
    <div role="tabpanel" class="tab-pane active" style="" id="create">
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

      <!-- <form class="center-block fill" action="created" method="post" style="padding:5%; width:50%" files> -->
    {!! Form::open(['style' => "padding:5%; width:50%", 'class' => "center-block fill", 'action' => "TracksController@create" ,'files' => true]) !!}
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <div class="form-group" >
          <label for="title">Title</label>
          <input type="text"name="title" class="form-control " id="title" aria-describedby="titleHelp" placeholder="Enter track's title">
        </div>
        <div class="form-group" >
          <label for="bpm">bpm</label>
          <input type="text"name="bpm" class="form-control " id="bpm" aria-describedby="titleHelp">
        </div>
        <div class="form-group" >
          <label for="key">Key</label>
          <input type="text"name="key" class="form-control " id="key" aria-describedby="titleHelp">
        </div>
        <div class="form-group" >
          <label for="duration">Duration</label>
          <input type="text"name="duration" class="form-control " id="duration" aria-describedby="durationHelp" placeholder="hh:mm:ss">
        </div>
        <div class="form-group" >
          <label for="price">Price</label>
          <input type="text"name="price" class="form-control " id="price" aria-describedby="titleHelp" placeholder="9.02">
        </div>
        <div class="form-group" >
          <label for="selGenre">Genre</label>
          <select class="form-control" id="selGenre" name="selGenre">
            @foreach ($genres as $genre)
              <option>{{$genre->name}}</option>
            @endforeach
          </select>
        </div>
        <div class="form-group" >
          <label for="date">Release date</label>
          <input type="text" class="form-control datepicker" id="datepicker" name="date">
        </div>
        <div class="form-group" >
          <label for="selArtist">Artist</label>
          <select class="form-control" id="selArtist" name="selArtist">
            @foreach ($artists as $artist)
              <option>{{$artist->name}}</option>
            @endforeach
          </select>
        </div>
        <div class="form-group">
          <label for="url">Track</label>
          <input type="file" name="url" class="form-control-file" id="url">
        </div>
        <div class="form-group">
          <button type="submit" class="btn btn-primary">Create</button>
        </div>
      </form>
    </div>
    <div role="tabpanel" class="tab-pane" id="update">
      <div class="form-group container" style="margin-top:10px">
          <div class="form-group">
            <label for="sel1">Select list:</label>
            <select class="form-control" id="titleTrack" name="titleTrack" style="width:300px" onchange="showTrack(this.value)">
              <option selected="selected"></option>
             @foreach ($tracks as $track)
              <option>{{$track->title}}</option>
             @endforeach
            </select>
            <div id="txtHint"><b>Track info will be displayed here...</b></div>
          </div>
      </div>
    </div>
    <div role="tabpanel" class="tab-pane" id="delete">
      <table class="table-condensed table-hover" style="width:50%">
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
             <?php
                $artist = $artist = DB::table('artists')
                               ->where('id', $track->artist_id)
                               ->get()->first();
                $aux = str_replace(" ", "_", $artist->name);
                $genre = $genre = DB::table('genres')
                               ->where('id', $track->genre_id)
                               ->get()->first();
              ?>
             <td>{{$track->title}}</td>
             <td><a href="{{url('artist')}}/{{$aux}}">{{$artist->name}}</a> </td>
             <td>{{$genre->name}}</td>
             <td>{{$track->bpm}}</td>
             <td>{{$track->key}}</td>
             <td>{{$track->duration}}</td>
             <td>{{$track->price}}€</td>
             <td>
               {!! Form::open(['action' => "TracksController@delete",'class' => "center-block fill"]) !!}
                 <input type="hidden" name="id" id="id" value="{{$track->id}}" ></input>
                 <button type="submit" class="btn btn-primary" name="button">Delete</button>
               </form>
             </td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>

</div>
<script src="//code.jquery.com/jquery-1.10.2.js"></script>
  <script src="//code.jquery.com/ui/1.11.2/jquery-ui.js"></script>
  <script>
    $(function() {
      $( "#datepicker" ).datepicker({
        changeMonth: true,
        changeYear: true,
        dateFormat: "yy/mm/dd",
        minDate: '-20y',
        maxDate: '+0d',
        language: "es"
      });
    });
  </script>
@endsection
