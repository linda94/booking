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

	<div class="container-fluid">
		<div class="row">
			@include ('layouts.sidebar')
			{{ Form::model($users, array('route' => array('update_user', Auth::user()->id), 'method' => 'PUT')) }}
			{{ csrf_field() }}
			<div class="col-sm-10">
				<div class="page-header room_header_div">
					<div class="container-fluid">
						<div class="col-sm-10">
							<h1><input id="room_inputs_special" type="text" name="users_name" value="{{ Auth::user()->name }}" required ></input></h1>
						</div>
						<div class="col-sm-1">
						<a href="/users/home" class="btn btn-default btn-lg room_button"
						data-toggle="tooltip" data-placement="bottom" title="Gå tilbake til profil-siden">
							<span class="glyphicon glyphicon-arrow-left" aria-hidden="true"></span>
						</a>
						</div>
						<div class="col-sm-1 text-left">
							<div class="col-sm-12 edit_room_div">
								<a class="color_edit_button" href="/users/home" data-toggle="tooltip" data-placement="bottom" 
								title="Avbryt endringene dine"> Avbryt </a>
							</div>
						</div>
					</div>
				</div>
			  <!-- Page content -->
				<div class="container-fluid col-sm-6">
					<div class="row">
						<div class="well">
							<br/>
							<div class="col-sm-12 home_spacing_div home_margin_spacing">
							<p><b class="col-sm-3">Bedriftsnavn:</b><span class="col-sm-9"><input class="room_inputs" type="text" 
							name="users_company" maxlength="25" value="{{ Auth::user()->company }}" ></input></span></p>
							</div>
							<div class="col-sm-12 home_spacing_div home_margin_spacing">
							<p><b class="col-sm-3">Telefon:</b><span class="col-sm-9"><input class="room_inputs no-spin" type="number" 
							name="users_phone" maxlength="8" minlength="8"
							data-toggle="tooltip" data-placement="right" title="max og minimum 8 tall. Eksempel: '12345678'"
							value="{{ Auth::user()->phone }}" required ></input></span></p>
							</div>
							<label for="comment" id="home_spacing_label"><b>Beskrivelse:</b></label>
							<textarea class="form-control" rows="9" id="comment" name="desciption">Ikke implementert enda</textarea>
							<br/>
							<button type="submit" class="btn_frontPage"> Lagre endringene </button>
						</div>
					</div>
				</div>
				{{ Form::close() }}
				{{ Form::model($users, array('route' => array('delete_user', Auth::user()->id), 'method' => 'delete')) }}
				<div class="container-fluid col-sm-1">
				</div>
				<div class="container-fluid col-sm-5">
					<div class="row">
						<img src="{{ asset('images/meeting-room-g1.jpg')}}" height="50%" width="100%"/>
						<br/><br/>
						<button type="submit" class="btn_frontPage"  data-toggle="tooltip" data-placement="bottom" 
						title="Slette din bruker fra BAM"> Slett bruker </button>
						<br/><br/>
						{{ Form::close() }}
					</div>
				</div>
				<div class="col-sm-1">
				</div>
				<div class="col-sm-5 container-fluid">
					<div class="row">
						<!-- Dette gjøres senere, når mail server er oppe -->
						<button class="btn_frontPage"> Endre passord </button>
						<br/></br>
					</div>
				</div>
				
			</div>
		</div>
	</div>
</body>
</html>