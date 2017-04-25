<!DOCTYPE html>
<html lang="no">
<head>
  <title></title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <link href="{{ asset('css/signin.css') }}" rel="stylesheet">
  <link href="{{ asset('css/navbar-fixed-side.css') }}" rel="stylesheet">
  <script src="{{ asset('js/tooltip.js') }}"></script>

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

  <link class="jsbin" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1/themes/base/jquery-ui.css" rel="stylesheet" type="text/css" />
  <script class="jsbin" src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
  <script class="jsbin" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.0/jquery-ui.min.js"></script>

  <!--[if IE]>
  <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
  <![endif]-->

</head>
<body>

	<div class="container-fluid">
		<div class="row">
			@include ('layouts.sidebar')		
			{{ Form::model($room, array('route' => array('update', $room->id), 'method' => 'PUT')) }}
			{{ csrf_field() }}
			<div class="col-sm-10">
				<div class="page-header room_header_div">
					<div class="container-fluid">
						<div class="col-sm-10">
							<h1> 
								<input class="room_inputs" type="text" name="room_name" value="{{ $room->name }}" required ></input>
							</h1>
						</div>
						<div class="col-sm-2 text-left">
							<div class="col-sm-12 edit_room_div">
									<a class="color_edit_button" href="#" data-toggle="tooltip" data-placement="bottom" 
									title="Avbryt endringene, dette vil ikke slette rommet"> Avbryt </a>
							</div>
						</div>
					</div>
				</div>
			  <!-- your page content -->
				<div class="container-fluid col-sm-6">
					<div class="row">
						<img src="{{ asset('images/meeting-room-g1.jpg')}}" id="blah" 
						alt="Last opp ett bilde" height="50%" width="100%"/>
					</div>
					<div class="row">
						<div class="well well-sm">
							<br/>
							<p><b>Room for:</b><span>
							<input class="room_inputs" type="text" name="room_space"
							value="{{ $room->capacity }}" required > people</input></span></p>
							<p><b>Equipment:</b><span>
							<input class="room_inputs" type="text" name="room_equipment" 
							value="{{ $room->equipment }}" required ></input></span></p>
							<p><b>Floor number:</b><span> 2 </span></p>
							<button type="submit" class="btn btn-primary btn_placeholder_room">Lagre endringene</button>
							{{ Form::close() }}
							{{ Form::model($room, array('route' => array('delete', $room->id), 'method' => 'delete')) }}
							<!-- Small modal -->
							<button type="button" class="btn btn-danger" data-toggle="modal" data-target=".bs-example-modal-sm">Slett rom</button>
							<div class="modal bs-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel">
							  <div class="modal-dialog modal-sm" role="document">
								<div class="modal-content">
								  <div class="modal-content">
									  <div class="modal-header">
										<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
										<h4 class="modal-title" id="myModalLabel">Er du sikker pa at du vil slette {{ $room->name }}? </h4>
									  </div>
									  <div class="modal-footer">
										<button type="button" class="btn btn-default" data-dismiss="modal">Lukk</button>
										<button type="submit" class="btn btn-danger">Slett</button>
									  </div>
									</div>
								</div>
							  </div>
							</div>
							{{ Form::close() }}
							<input type='file' onchange="readURL(this);"/>
							<div class="dropdown dd_div">
								<button class="btn dropdown-toggle " href="#" data-toggle="dropdown" 
								aria-haspopup="true" aria-expanded="false"> Brukerrettigheter <span class="caret"></span></button>
								<ul class="dropdown-menu">
									<li class="dropdown-header dd_text_header"> Hvilke brukernivaer kan booke rommet? </li>
									<!-- Give items in this list class="dd_text_item" -->
									<li class="dd_text_item"><a href="#"> Brukere </a></li>
									<li class="dd_text_item"> <a href="#"> Super brukere </a> </li>
									<li class="dd_text_item"><a href="#"> Administrator </a></li>
							  </ul>
							</div>
						</div>
					</div>
					<div class="row"><br/></div>
					<div class="row">
						<input placeholder="Adresse til bygg" />
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