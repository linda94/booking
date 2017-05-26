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
{{ csrf_field() }}
	<div class="container-fluid">
		<div class="row">
			@include ('layouts.sidebar')
			<div class="col-sm-10">
				<div class="page-header room_header_div">
					<div class="container-fluid">
						<div class="col-sm-10">
							<h1> {{ Auth::user()->name }} </h1>
						</div>
						<div class="col-sm-1">
						<a href="/bookingV" class="btn btn-default btn-lg room_button"
						data-toggle="tooltip" data-placement="bottom" title="Gå tilbake til booking">
							<span class="glyphicon glyphicon-arrow-left" aria-hidden="true"></span>
						</a>
						</div>
						<div class="col-sm-1">
							<a href="/users/home_edit" class="btn btn-default btn-lg room_button"
							data-toggle="tooltip" data-placement="bottom" title="Instillinger">
								<span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
							</a>
						</div>
					</div>
				</div>
			  <!-- Page content -->
				<div class="container-fluid col-sm-6">
					<div class="row">
						<div class="well well-sm">
							<br/>
							<div class="col-sm-12 home_spacing_div home_margin_spacing">
							<p><b class="col-sm-3">Bedriftsnavn:</b><span class="col-sm-9"> {{ Auth::user()->company }} </span></p>
							</div>
							<div class="col-sm-12 home_spacing_div home_margin_spacing">
							<p><b class="col-sm-3">E-post:</b><span class="col-sm-9"> {{ Auth::user()->email }} </span></p>
							</div>
							<div class="col-sm-12 home_spacing_div home_margin_spacing">
							<p><b class="col-sm-3">Telefon:</b><span class="col-sm-9"> {{ Auth::user()->phone }} </span></p>
							</div>
							<label for="comment" id="home_spacing_label"><b>Beskrivelse:</b></label>
							<textarea readonly class="form-control" rows="9" id="comment"> {{ Auth::user()->description }} </textarea>
							<br/><br/>
						</div>
					</div>
				</div>
				<div class="container-fluid col-sm-1"></div>
				<div class="container-fluid col-sm-5">
					<div class="row">
						<img src="{{ asset('images/meeting-room-g1.jpg')}}" height="100%" width="100%"/>
						<br/> <br/>
					</div>
				</div>
			</div>
		</div>
	</div>
@endrole
</body>
</html>