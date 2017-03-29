<!DOCTYPE html>
<html lang="en">
<head>
  <title>Book And Meet </title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  
	<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.4.8/angular.min.js"></script>

	<link href="{{ asset('css/signin.css') }}" rel="stylesheet">
	<link href="{{ asset('css/navbar-fixed-side.css') }}" rel="stylesheet">

    <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet">
	
</head>
<body>


<div class="mid">
	<div class="container col-xs-8 slideshow" id="carousel">

	<div id="myCarousel" class="carousel slide" data-ride="carousel" data-interval="3000" data-pause="null"> 
		<div class="carousel-inner" role="listbox">
			<div class="item active"> 
				<img src="{{ asset('images/Alternate booking.png')}}" width="600" height="600">
			</div>
			<div class="item"> 
				<img src="{{ asset('images/Booking.png')}}" width="600" height="600">
			</div>
		</div>
	<a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
		<span class="glyphicon glyphicon-chevron-left" aria-hidden="true"> </span>
		<span class="sr-only"> Previous </span>
	</a>
	<a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
		<span class="glyphicon glyphicon-chevron-right" aria-hidden="true"> </span>
		<span class="sr-only"> Next </span>
	</a>
	</div>

	</div>
	<div class="text col-xs-4">
		<h1 class="product_name"> Book And Meet </h1>
		<h5 class="product_info"> A new booking system </h5>
		<hr class="fancy">
		<p class="product_text"> Create your own booking system, fit for your own company! </p>

		<div class="fancy text-center btn-group-justified">
		<br>
			<button type="submit" class="btn_main col-xs-5 col-centered" id="login" onclick="location.href='{{ route('login') }}'"> Logg inn </button>
			
			<button type="submit" class="btn_main col-xs-5 col-centered" onclick="location.href='{{ route('register') }}'"> Ny bruker </button>
		</div>
	</div>
</div>

@include ('layouts.footer')

</body>
</html>