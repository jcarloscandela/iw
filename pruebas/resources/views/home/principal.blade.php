@extends('layout')
@section('css')
<!-- <style media="screen">
  body{ background: darkgrey   !important;}
</style> -->
<style media="screen">
.carousel-inner img {
  
  width: 65%; /* Set width to 100% */
  margin: auto;
}

.carousel-caption h3 {
  color: #fff !important;
}

@media (max-width: 600px) {
  .carousel-caption {
      display: none; /* Hide the carousel text when the screen is less than 600 pixels wide */
  }
}
</style>
@endsection

@section('cabecera')
@endsection

@section('contenido')
<!-- @include('menu') -->
<div id="myCarousel" class="carousel slide" data-ride="carousel">
    <!-- Indicators -->
    <ol class="carousel-indicators">
      <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
      <li data-target="#myCarousel" data-slide-to="1"></li>
      <li data-target="#myCarousel" data-slide-to="2"></li>
    </ol>

    <!-- Wrapper for slides -->
    <div class="carousel-inner" role="listbox">
      <div class="item active">
        <img src="imgs/car1.jpg" alt="New York" width="800" height="600">
      </div>

      <div class="item">
        <img src="imgs/car2.jpg" alt="Chicago" width="800" height="600">
      </div>

      <div class="item">
        <img src="imgs/car3.jpg" alt="Los Angeles" width="800" height="700">
      </div>
    </div>

    <!-- Left and right controls -->
    <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
      <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
      <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
      <span class="sr-only">Next</span>
    </a>
</div>
@endsection
