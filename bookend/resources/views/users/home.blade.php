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
<form>
{{ csrf_field() }}
	<div class="container-fluid">
		<div class="row">
			@include ('layouts.sidebar')
			<div class="col-sm-10">
				<div class="page-header room_header_div">
					<div class="container-fluid">
						<div class="col-sm-11">
							<h1> {{ Auth::user()->name }} </h1>
						</div>
						<div class="col-sm-1">
							<a href="/users/home_edit" class="btn btn-default btn-lg room_button">
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
							<p><b>Bedriftsnavn:</b><span> {{ Auth::user()->company }} </span></p>
							<p><b>E-post adresse:</b><span> {{ Auth::user()->email }} </span></p>
							<p><b>Telefon:</b><span> {{ Auth::user()->phone }} </span></p>
							<label for="comment"><b>Beskrivelse:</b></label>
							<textarea readonly class="form-control" rows="9" id="comment">Mitt navn er {{ Auth::user()->name }}, og jeg jobber for min egen bedrift som heter {{ Auth::user()->company }}. Hvis du vil ha tak i meg kan du kontake meg via mail {{ Auth::user()->email }} eller du kan ringe meg på {{ Auth::user()->phone }}.</textarea>
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
</form>
@include ('layouts.footer')
</body>
</html>