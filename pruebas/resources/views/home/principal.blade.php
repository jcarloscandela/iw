@extends('layout')
@section('css')
<style media="screen">
  body{ background: darkgrey   !important;}
</style>
@endsection

@section('cabecera')
@endsection

@section('contenido')
<!-- @include('menu') -->
<div class="container" style="height:100%; width:65%">
  <div id="myCarousel" class="carousel slide" data-ride="carousel">
    <!-- Indicators -->
    <ol class="carousel-indicators">
      <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
      <li data-target="#myCarousel" data-slide-to="1"></li>
      <li data-target="#myCarousel" data-slide-to="2"></li>
    </ol>

    <!-- Wrapper for slides -->
    <div class="carousel-inner">
      <div class="item active">
        <img src="imgs/car1.jpg" alt="Los Angeles" style="width:100%;" class="img-responsive">
      </div>

      <div class="item">
        <img src="imgs/car2.jpg" alt="Chicago" style="width:100%;" class="img-responsive">
      </div>

      <div class="item">
        <img src="imgs/car3.jpg" alt="New york" style="width:100%;"class="img-responsive">
      </div>
    </div>

    <!-- Left and right controls -->
    <a class="left carousel-control" href="#myCarousel" data-slide="prev">
      <span class="glyphicon glyphicon-chevron-left"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#myCarousel" data-slide="next">
      <span class="glyphicon glyphicon-chevron-right"></span>
      <span class="sr-only">Next</span>
    </a>
  </div>
</div>
@endsection
