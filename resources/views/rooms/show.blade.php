<!DOCTYPE html>
<html>
<head>
  <title></title>
    <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <link href="{{ asset('css/signin.css') }}" rel="stylesheet">
  <link href="{{ asset('css/navbar-fixed-side.css') }}" rel="stylesheet">

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

</head>
<body>

	{{ csrf_field() }}

	<div class="container-fluid">
		<div class="row">
			@include ('layouts.sidebar')
			
			<div class="col-sm-10">
				<div class="page-header room_header_div">
					<div class="container-fluid">
						<div class="col-sm-11">
							<h1> {{ $room->name }} <small> {{ $room->capacity }} plasser</small></h1>
						</div>
						<div class="col-sm-1">
							<a href="/rooms/edit_room/{{ $room->id }}" class="btn btn-default btn-lg room_button">
								<span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
							</a>
						</div>
					</div>
				</div>
			  <!-- your page content -->
				<div class="container-fluid col-sm-6">
					<div class="row">
						<img src="{{ asset('images/meeting-room-g1.jpg')}}" height="50%" width="100%"/>
					</div>
					<div class="row">
						<div class="well well-sm">
							<br/>
							<p><b>Room for:</b><span> {{ $room->capacity }} people</span></p>
							<p><b>Equipment:</b><span> {{ $room->equipment }} </span></p>
							<p><b>Floor number:</b><span> 2 </span></p>
							//
						</div>
					</div>
					<div class="row"><br/></div>
					<div class="row">
						<img src="{{ asset('images/maps_place.png')}}" width="100%"/>
					</div>
					<br/>
				</div>
				<div class="container-fluid col-sm-1"></div>
				<div class="container-fluid col-sm-5">
					<div class="row">
						<ul class="list-group">
						  <li class="list-group-item">Cras justo odio</li>
						  <li class="list-group-item">Dapibus ac facilisis in</li>
						  <li class="list-group-item">Morbi leo risus</li>
						  <li class="list-group-item">Porta ac consectetur ac</li>
						  <li class="list-group-item">Vestibulum at eros</li>
						  <li class="list-group-item">Vestibulum at eros</li>
						  <li class="list-group-item">Vestibulum at eros</li>
						  <li class="list-group-item">Vestibulum at eros</li>
						  <li class="list-group-item">Vestibulum at eros</li>
						  <li class="list-group-item">Vestibulum at eros</li>
						  <li class="list-group-item">Vestibulum at eros</li>
						  <li class="list-group-item">Vestibulum at eros</li>
						  <li class="list-group-item">Vestibulum at eros</li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</div>

@include ('layouts.footer')
</body>
</html>