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
      {!! Form::open(['style' => "padding:5%; width:50%", 'class' => "center-block fill", 'action' => "GenresController@update"]) !!}
        <div class="form-group">
          <select class="" name="selGenre">
            <option selected="selected"></option>
            @foreach ($genres as $genre)
              <option>{{$genre->name}}</option>
            @endforeach
          </select>
        </div>
        <div class="form-group" >
          <label for="name">Name</label>
          <input type="text" name="name" class="form-control " aria-describedby="titleHelp" placeholder="Enter genre's name">
        </div>
        <div class="form-group">
          <button type="submit" class="btn btn-primary">Update</button>
        </div>
      </form>
    </div>
    <div role="tabpanel" class="tab-pane" id="delete">
      <table class="table-condensed table-hover" style="width:50%">
        <thead class="thead-dark">
          <tr>
            <th scope="col" style=""><h2>Genres</h2></th>
          </tr>
        </thead>
        <tbody>
          @foreach ($genres as $genre)
            <tr>
              <td><label>{{$genre->name}}</label></td>
              <td>
                {!! Form::open(['action' => "GenresController@delete",'class' => "center-block fill"]) !!}
                  <input type="hidden" name="idGenre" value="{{$genre->id}}" ></input>
                  <button type="submit" class="btn btn-primary" name="button">Delete</button>
                </form>
              </td>
            </tr>
          @endforeach
        </tbody>
      </table>
    </div>
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
@endsection
