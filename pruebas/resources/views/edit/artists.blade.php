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
<div class="container fill" >
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
    <div class="form-group">
      <label for="nameArtist">Name</label>
      <input type="text"name="name" class="form-control" id="name" aria-describedby="nameHelp" placeholder="Enter artist's name">

      <label for="biography">Biography</label>
      <textarea class="form-control" name="biography" id="biography" rows="3"></textarea>

      <label for="picture">Picture</label>
      <input type="file" name="picture" class="form-control-file" id="picture">
      <button type="submit" class="btn btn-primary">Submit</button>
    </div>
  </form>
</div>

@endsection
