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

html, body {
    height: 100%;
}
</style>
@endsection

@section('contenido')
<div>

  <!-- Nav tabs -->
  <ul class="nav nav-tabs" role="tablist">
    <li role="presentation" class="active"><a href="#create" aria-controls="home" role="tab" data-toggle="tab">Create</a></li>
    <li role="presentation"><a href="#update" aria-controls="profile" role="tab" data-toggle="tab">Update</a></li>
    <li role="presentation"><a href="#delete" aria-controls="messages" role="tab" data-toggle="tab">Delete</a></li>
  </ul>

  <!-- Tab panes -->
  <div class="tab-content fill">
    <div role="tabpanel" class="tab-pane active" id="create">
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
    {!! Form::open(['style' => "padding:5%; width:50%", 'class' => "center-block fill", 'action' => "ArtistController@create",'files' => true]) !!}
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <div class="form-group" >
          <label for="nameArtist">Name</label>
          <input type="text"name="name" class="form-control " id="name" aria-describedby="nameHelp" placeholder="Enter artist's name">
        </div>
        <div class="form-group">
          <label for="biography">Biography</label>
          <textarea class="form-control" name="biography" id="biography" rows="3"></textarea>
        </div>
        <div class="form-group">
          <label for="picture">Picture</label>
          <input type="file" name="picture" class="form-control-file" id="picture">
        </div>
        <div class="form-group">
          <button type="submit" class="btn btn-primary">Create</button>
        </div>
      </form>
    </div>
    <div role="tabpanel" class="tab-pane" id="update">
      <div class="form-group container" style="margin-top:10px">
        {!! Form::open(['style' => "padding:5%; width:50%", 'class' => "center-block fill", 'action' => "ArtistController@create",'files' => true]) !!}
          <div class="form-group">
            <label for="sel1">Select list:</label>
            <select class="form-control" id="sel1" name="nameArtist" style="width:300px" onchange="">
             @foreach ($artists as $artist)
              <option>{{$artist->name}}</option>
             @endforeach
            </select>
          </div>
          <input type="hidden" name="_token" value="{{ csrf_token() }}">
          <div class="form-group">
            <label for="biography">Biography</label>
            <textarea class="form-control" name="biography" id="biographyUpdate" rows="3"></textarea>
          </div>
          <div class="form-group">
            <label for="picture">Picture</label>
            <input type="file" name="picture" class="form-control-file" id="pictureUpdate">
            <!-- <img src="" alt="Artist pic"> -->
          </div>
          <div class="form-group">
            <button type="submit" class="btn btn-primary">Update</button>
          </div>
        </form>
      </div>
    </div>
    <div role="tabpanel" class="tab-pane" id="delete">...</div>
  </div>
</div>

@endsection
