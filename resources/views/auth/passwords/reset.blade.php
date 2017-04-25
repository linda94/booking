<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Reset</title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
		<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.4.8/angular.min.js"></script>
		
		<!-- Custom styles for this template -->
		<link href="{{ asset('css/signin.css') }}" rel="stylesheet">
		<link href="{{ asset('css/navbar-fixed-side.css') }}" rel="stylesheet">

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
						<form class="form-horizontal" role="form" method="POST" action="{{ route('password.request') }}">
							{{ csrf_field() }}
							<input type="hidden" name="token" value="{{ $token }}">
							<div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
								<label for="email" class="control-label reset_spacing">E-post addressen</label>
								<input id="email" type="email" class="form-control" name="email" 
								value="{{ $email or old('email') }}" required autofocus>
								@if ($errors->has('email'))
									<span class="help-block">
										<strong>{{ $errors->first('email') }}</strong>
									</span>
								@endif
							</div>
							<div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
								<label for="password" class="control-label reset_spacing">Password</label>
								<input id="password" type="password" class="form-control" name="password" required>
								@if ($errors->has('password'))
									<span class="help-block">
										<strong>{{ $errors->first('password') }}</strong>
									</span>
								@endif
							</div>
							<div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
								<label for="password-confirm" class="control-label reset_spacing">Confirm Password</label>
								<input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
								@if ($errors->has('password_confirmation'))
									<span class="help-block">
										<strong>{{ $errors->first('password_confirmation') }}</strong>
									</span>
								@endif
							</div>
							<div class="form-group">
								<button type="submit" class="btn_emailPage">Endre passordet</button>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	@include ('layouts.footer')
	</body>
</html>