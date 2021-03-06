<!DOCTYPE html>
<html>
<head>
  <title></title>
    <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <link href="{{ asset('css/main.css') }}" rel="stylesheet">

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
@role((['Administrator','SuperBruker','Bruker']))
	<div class="container-fluid">
		<div class="row">
			@include ('layouts.sidebar')
			{{ Form::model($users, array('route' => array('user_list_update', $user->id), 'method' => 'PUT')) }}
			{{ csrf_field() }}
			<div class="col-sm-10">
			@if(session()->has('success'))
			  <div class="alert alert-success">
				{{ session('success') }}
			  </div>
			@endif
				<div class="page-header room_header_div">
					<div class="container-fluid">
						<div class="col-sm-10">
							<h1><input id="room_inputs_special" type="text" name="users_name" class="highlight_inputfields"
							value="{{ $user->name }}" required ></input></h1>
						</div>
						<div class="col-sm-1">
						<a href="/user_list/{{$user->id}}" class="btn btn-default room_button"
						data-toggle="tooltip" data-placement="bottom" title="Gå tilbake til profil-siden">Tilbake
							<!--<span class="glyphicon glyphicon-arrow-left" aria-hidden="true"></span>-->
						</a>
						</div>
						<div class="col-sm-1">
								<a id="avbryt_knapp" class="btn btn-danger room_button" href="/user_list/{{$user->id}}" data-toggle="tooltip" data-placement="bottom" 
								title="Avbryt endringene dine"> Avbryt </a>
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
							name="users_company" maxlength="25" value="{{$user->company }}" ></input></span></p>
							</div>
							<div class="col-sm-12 home_spacing_div home_margin_spacing">
							<p><b class="col-sm-3">Telefon:</b><span class="col-sm-9"><input class="room_inputs no-spin" type="number" 
							name="users_phone"
							data-toggle="tooltip" data-placement="right" title="max og minimum 8 tall. Eksempel: '12345678'"
							value="{{ $user->phone }}"></input></span></p>
							</div>
							<label for="comment" id="home_spacing_label"><b>Beskrivelse:</b></label>
							<textarea class="form-control" rows="9" id="comment" name="users_description"> {{$user->description }} </textarea>
							<br/>
							<button type="submit" class="btn btn-success btn_save"> Lagre endringene </button>
						</div>
					</div>
				</div>
				{{ Form::close() }}
				{{ Form::model($users, array('route' => array('user_list_delete', $user->id), 'method' => 'delete')) }}
				<div class="container-fluid col-sm-1">
				</div>
				<div class="container-fluid col-sm-5">
					<div class="row">
						<img src="{{ asset('images/no_profile_picture.gif')}}" height="50%" width="100%"/>
						<br/><br/>
						<button type="submit" class="btn btn-danger btn_save"> Slett bruker </button>
						<br/><br/>
						{{ Form::close() }}
					</div>
				</div>
				<div class="col-sm-1">
				</div>
				<div class="col-sm-5 container-fluid">
					<div class="row">
						<button class="btn btn-success btn_save" href="/auth/passwords/email"> Endre passord </button>
						<br/></br>
						<div class="dropdown">
							<button class="btn dropdown-toggle" id="home_dd_styling" href="#" data-toggle="dropdown" 
							aria-haspopup="true" aria-expanded="false"> Brukerrettigheter <span class="caret"></span></button>
							<ul class="dropdown-menu" id="home_dd_styling">
								<li class="dropdown-header dd_text_header"> Brukerrettigheter </li>
								<li class="dd_text_item"><a href="/users/{{$user->id}}/user_home_edit/assign_bruker" 
								type="submit"> Bruker </a></li>
								<li class="dd_text_item"><a href="/users/{{$user->id}}/user_home_edit/assign_superbruker" 
								type="submit"> Super Bruker </a></li>								
								<li class="dd_text_item"><a href="/users/{{$user->id}}/user_home_edit/assign_administrator" 
								type="submit"> Administrator </a></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
@endrole
</body>
</html>