<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
    </head>
    <body>
      <?php   $artist = DB::table('artists')->where('name', $_GET['q'])->get()->first(); ?>
      {!! Form::open(['style' => "padding:5%; width:50%", 'class' => "center-block fill", 'action' => "ArtistController@update",'files' => true]) !!}
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <input type="hidden" name="id" value="{{$artist->id}}">
        <div class="form-group" >
          <label for="nameArtist">Name</label>
          <input type="text"name="name" class="form-control " id="name" aria-describedby="nameHelp" value="{{$artist->name}}">
        </div>
        <div class="form-group">
          <label for="biography">Biography</label>
          <textarea class="form-control" name="biography" id="biographyUpdate" rows="3">{{$artist->biography}}</textarea>
        </div>
        <div class="form-group">
          <label for="picture">Picture</label>
          <input type="file" name="picture" class="form-control-file" id="pictureUpdate">
          <img src="{{$artist->picture}}" alt="Artist pic">
        </div>
        <div class="form-group">
          <button type="submit" class="btn btn-primary">Update</button>
        </div>
      </form>
    </body>
</html>
