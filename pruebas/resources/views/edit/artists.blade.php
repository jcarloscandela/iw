@extends('layout')
@section('js')
function showArtist(str) {
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
        xmlhttp.open("GET","editartist?q="+str,true);
        xmlhttp.send();
    }
}
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
<div class="container fill" height="100%">

  <!-- Nav tabs -->
  <ul class="nav nav-tabs" role="tablist">
    <li role="presentation" class="active"><a href="#create" aria-controls="home" role="tab" data-toggle="tab">Create</a></li>
    <li role="presentation"><a href="#update" aria-controls="profile" role="tab" data-toggle="tab">Update</a></li>
    <li role="presentation"><a href="#delete" aria-controls="messages" role="tab" data-toggle="tab">Delete</a></li>
  </ul>

  <!-- Tab panes -->
  <div class="tab-content fill">
    <div role="tabpanel" class="tab-pane active" id="create" style="height:100%; min-height:100%;">
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
          <div class="form-group">
            <label for="sel1">Select list:</label>
            <select class="form-control" id="nameArtist" name="nameArtist" style="width:300px" onchange="showArtist(this.value)">
              <option selected="selected"></option>
             @foreach ($artists as $artist)
              <option>{{$artist->name}}</option>
             @endforeach
            </select>
            <div id="txtHint"><b>Artist info will be displayed here...</b></div>
          </div>
      </div>
    </div>
    <div role="tabpanel" class="tab-pane" id="delete">
      <table class="table-condensed table-hover" style="width:50%">
        <thead class="thead-dark">
          <tr>
            <th scope="col" style="">Picture</th>
            <th scope="col" style="">Artist</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($artists as $artist)
            <tr>
              <td> <img src="{{$artist->picture}}" alt="" height="35px" width="60px" id="pic "name="pic"> </td>
              <td><label>{{$artist->name}}</label></td>
              <td>
                {!! Form::open(['action' => "ArtistController@delete",'class' => "center-block fill"]) !!}
                  <input type="hidden" name="name" id="name" value="{{$artist->name}}" ></input>
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
