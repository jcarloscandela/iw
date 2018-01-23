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

@section('contenido')
<div class="container fill" height="100%">

  <!-- Nav tabs -->
  <ul class="nav nav-tabs" role="tablist">
    <li role="presentation" class="active"><a href="#mylists" aria-controls="home" role="tab" data-toggle="tab">My lists</a></li>
    <li role="presentation"><a href="#create" aria-controls="profile" role="tab" data-toggle="tab">Create</a></li>
    <li role="presentation"><a href="#delete" aria-controls="messages" role="tab" data-toggle="tab">Delete</a></li>
  </ul>

  <!-- Tab panes -->
  <div class="tab-content fill">
    <div role="tabpanel" class="tab-pane active" id="mylists" style="height:100%; min-height:100%;">
    <p>TODO lists of lists</p>
    </div>

    <div role="tabpanel" class="tab-pane" id="create">
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
          <button type="submit" class="btn btn-primary">Create</button>
        </div>
        <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
        
      </form>
      </div>
    </div>

    <div class="alert alert-danger">
      <ul>
        @foreach ($errors->all() as $error)
          <li>{{ $error }}</li>
        @endforeach
      </ul>
    </div>
</div>

@endsection
