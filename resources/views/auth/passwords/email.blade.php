<!DOCTYPE html>
<html lang="en">
	<head>
		<title>E-Mail</title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
		<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.4.8/angular.min.js"></script>
		
		<!-- Custom styles for this template -->
		<link href="{{ asset('css/main.css') }}" rel="stylesheet">

		<link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet">
	</head>
	<body>
		<div class="container">
			<div class="row">
				<div class="frame">
					<h1 class="form-signing-heading">Nytt passord</h1>
					<div class="panel-body">
						@if (session('status'))
							<div class="alert alert-success">
								{{ session('status') }}
							</div>
						@endif
						<form class="form-horizontal" role="form" method="POST" action="{{ route('password.email') }}">
							{{ csrf_field() }}
							<div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
								<label for="email" class="control-label email_spacer">E-post adressen</label>
								<input id="email" type="email" class="form-control email_spacer" name="email" value="{{ old('email') }}" required>
								@if ($errors->has('email'))
									<span class="help-block">
										<strong>{{ $errors->first('email') }}</strong>
									</span>
								@endif
							</div>
							<div class="form-group">
								<button type="submit" class="btn_emailPage">Send nytt passord link</button>
							</div>
						</form>
						<div class="row">
							<button class="btn_emailPage" onclick="location.href='{{action('WelcomeController@index')}}'">Tilbake til hovedsiden</button>
						</div>
					</div>
				</div>
			</div>
		</div>
	@include ('layouts.footer')
	</body>
</html>