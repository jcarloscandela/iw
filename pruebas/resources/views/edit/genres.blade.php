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
    {!! Form::open(['style' => "padding:5%; width:50%", 'class' => "center-block fill", 'action' => "GenresController@create"]) !!}
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <div class="form-group" >
          <label for="name">Name</label>
          <input type="text" name="name" class="form-control " id="name" aria-describedby="titleHelp" placeholder="Enter genre's name">
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
@endsection
