@extends('layout')
@section('head')
    <link rel="stylesheet" href="//code.jquery.com/ui/1.11.2/themes/smoothness/jquery-ui.css">
@endsection
@section('css')

@endsection

@section('contenido')
<div class="container">

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
    {!! Form::open(['style' => "padding:5%; width:50%", 'class' => "center-block fill", 'action' => "TracksController@create"]) !!}
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
          <input type="text"name="duration" class="form-control " id="duration" aria-describedby="titleHelp">
        </div>
        <div class="form-group" >
          <label for="price">Price</label>
          <input type="text"name="price" class="form-control " id="price" aria-describedby="titleHelp" placeholder="Enter track's title">
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
          <button type="submit" class="btn btn-primary">Create</button>
        </div>
      </form>
    </div>
    <div role="tabpanel" class="tab-pane" id="update">
      ...
    </div>
    <div role="tabpanel" class="tab-pane" id="delete">
      ...
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
