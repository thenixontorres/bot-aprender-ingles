@extends('layouts.app')
@section('title','Inicio')
@section('content')
  <h1 class="pull-left">Inicio</h1>
	<div class="col-md-12 panel">

					<div id="carousel1" class="carousel slide" data-ride="carousel">
					  	<ol class="carousel-indicators">
					   	 <li data-target="#carousel1" data-slide-to="0" class="active"></li>
					   	 <li data-target="#carousel1" data-slide-to="1"></li>
					   	 <li data-target="#carousel1" data-slide-to="2"></li>
					  	</ol>

					  	<div class="carousel-inner" role="listbox">
					    		<div class="item active">
					      			<img src="http://lorempixel.com/1200/300/city/2" class="img-responsive">
					      			<div class="carousel-caption"> Mi imagen 1 </div>
					      		</div>	   	
					    		<div class="item">
					      			<img src="http://lorempixel.com/1200/300/city/3" class="img-responsive">
					      			<div class="carousel-caption"> Mi imagen 2 </div>
					      		</div>
					      		<div class="item">
					      			<img src="http://lorempixel.com/1200/300/city/1" class="img-responsive">
					      			<div class="carousel-caption"> Mi imagen 3 </div>
					     		 </div>
					    </div>

					  <!-- Controls -->
					  <a class="left carousel-control" href="#carousel1" role="button" data-slide="prev">
					    <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
					    <span class="sr-only">Anterior</span>
					  </a>
					  <a class="right carousel-control" href="#carousel1" role="button" data-slide="next">
					    <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
					    <span class="sr-only">Siguiente</span>
					  </a>
					</div>
				</div>   
    </div>       
        
@endsection