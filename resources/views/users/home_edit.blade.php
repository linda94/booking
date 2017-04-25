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
						<div class="col-sm-11">
							<h1><input class="room_inputs" id="room_inputs_special" type="text" name="users_name" value="{{ Auth::user()->name }}" required ></input></h1>
						</div>
					</div>
				</div>
			  <!-- Page content -->
				<div class="container-fluid col-sm-6">
					<div class="row">
						<div class="well well-sm">
							<br/>
							<p><b>Bedriftsnavn:</b><span><input class="room_inputs" type="text" 
							name="users_company" value="{{ Auth::user()->company }}" required ></input></span></p>
							<p><b>E-post adresse:</b><span><input class="room_inputs" type="text" 
							name="users_email" value="{{ Auth::user()->email }}" required ></input></span></p>
							<p><b>Telefon:</b><span><input class="room_inputs" type="int" 
							name="users_phone" value="{{ Auth::user()->phone }}" required ></input></span></p>
							<label for="comment"><b>Beskrivelse:</b></label>
							<textarea class="form-control" rows="9" id="comment" name="desciption">Mitt navn er {{ Auth::user()->name }}, og jeg jobber for min egen bedrift som heter {{ Auth::user()->company }}. Vist du vil ha tak i meg kan du kontake meg via mail {{ Auth::user()->email }} eller du kan ringe meg på {{ Auth::user()->phone }}.</textarea>
							<br/>
							<button type="submit" class="btn_frontPage"> Lagre endringene </button>
						</div>
					</div>
				</div>
				{{ Form::close() }}
				{{ Form::model($users, array('route' => array('delete_user', Auth::user()->id), 'method' => 'delete')) }}
				<div class="container-fluid col-sm-1"></div>
				<div class="container-fluid col-sm-5">
					<div class="row">
						<img src="{{ asset('images/meeting-room-g1.jpg')}}" height="50%" width="100%"/>
						<br/><br/>
						<button type="submit" class="btn_frontPage"> Slett bruker </button>
						<br/><br/>
						{{ Form::close() }}
						<!-- Dette gjøres senere, når mail server er oppe -->
						<button class="btn_frontPage"> Endre passord </button>
						<br/></br>
						<div class="dropdown">
							<button class="btn dropdown-toggle" id="home_dd_styling" href="#" data-toggle="dropdown" 
							aria-haspopup="true" aria-expanded="false"> Brukerrettigheter <span class="caret"></span></button>
							<ul class="dropdown-menu" id="home_dd_styling">
								<li class="dropdown-header dd_text_header"> Brukerrettigheter </li>
								<!-- Give items in this list class="dd_text_item" -->
								<li class="dd_text_item"><a href="#"> Bruker </a></li>
								<li class="dd_text_item"> <a href="#"> Super bruker </a> </li>
								<li class="dd_text_item"><a href="#"> Administrator </a></li>
							</ul>
						</div>
						
					</div>
				</div>
			</div>
		</div>
	</div>
@include ('layouts.footer')
</body>
</html>