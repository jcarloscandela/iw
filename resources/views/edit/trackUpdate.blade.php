<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <link rel="stylesheet" href="//code.jquery.com/ui/1.11.2/themes/smoothness/jquery-ui.css">
    </head>
    <body>
      <?php
        $track = DB::table('tracks')->where('title', $_GET['q'])->get()->first();
        $artists = DB::table('artists')->get();
        $genres = DB::table('genres')->get();     ?>
      {!! Form::open(['style' => "padding:5%; width:50%", 'class' => "center-block fill", 'action' => "TracksController@update",'files' => true]) !!}
          <input type="hidden" name="_token" value="{{ csrf_token() }}">
          <input type="hidden" name="idTrack" value="{{$track->id}}">
          <div class="form-group" >
            <label for="title">Title</label>
            <input type="text"name="title" class="form-control " id="title" value="{{$track->title}}">
          </div>
          <div class="form-group" >
            <label for="bpm">bpm</label>
            <input type="text"name="bpm" class="form-control " id="bpm" value="{{$track->bpm}}">
          </div>
          <div class="form-group" >
            <label for="key">Key</label>
            <input type="text"name="key" class="form-control " id="key" value="{{$track->key}}">
          </div>
          <div class="form-group" >
            <label for="duration">Duration</label>
            <input type="text"name="duration" class="form-control " id="duration" value="{{$track->duration}}">
          </div>
          <div class="form-group" >
            <label for="price">Price</label>
            <input type="text"name="price" class="form-control " id="price" value="{{$track->price}}">
          </div>
          <div class="form-group" >
            <label for="selGenre">Genre</label>
            <select class="form-control" id="selGenre" name="selGenre">
              @foreach ($genres as $genre)
                @if($genre->id == $track->genre_id)
                  <option selected="selected">{{$genre->name}}</option>
                @else
                  <option>{{$genre->name}}</option>
                @endif
              @endforeach
            </select>
          </div>
          <div class="form-group" >
            <label for="date">Release date</label>
            <input type="text" class="form-control datepicker" id="datepicker" name="date" value="{{$track->release}}">
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
          </div>
          <div class="form-group" >
            <label for="selArtist">Artist</label>
            <select class="form-control" id="selArtist" name="selArtist">
              @foreach ($artists as $artist)
                @if($artist->id === $track->artist_id)
                  <option selected="selected">{{$artist->name}}</option>
                @else
                  <option>{{$artist->name}}</option>
                @endif
              @endforeach
            </select>
          </div>
          <div class="form-group">
            <label for="url">Track</label>
            <input type="file" name="url" class="form-control-file" id="url">
          </div>
          </div>
          <div class="form-group">
            <button type="submit" class="btn btn-primary">Update</button>
          </div>
        </form>
    </body>
</html>
