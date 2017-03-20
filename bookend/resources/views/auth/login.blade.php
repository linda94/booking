<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Logg inn</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.4.8/angular.min.js"></script>
    
    <!-- Custom styles for this template -->
    <link href="{{ asset('css/signin.css') }}" rel="stylesheet">

    <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet">
  </head>
<body>
<div class="container">
	<div class="frame">
        <h1 class="form-signing-heading">Logg inn</h1>
		<form class="form-signing" role="form" method="POST" action="{{ route('login') }}">
			{{ csrf_field() }}
			<div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
				<label for="email" class="label_log_in">E-post</label>
				<input id="email" type="email" class="form-control" id="email" placeholder="E-post" name="email" value="{{ old('email') }}" required autofocus>
				@if ($errors->has('email'))
					<span class="help-block">
						<strong>{{ $errors->first('email') }}</strong>
					</span>
				@endif
			</div>
			<div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
				<label for="pwd" class="label_log_in">Passord</label>
				<input type="password" class="form-control" id="pwd" placeholder="Passord" name="password" required>
					@if ($errors->has('password'))
						<span class="help-block">
							<strong>{{ $errors->first('password') }}</strong>
						</span>
					@endif
			</div>           
			<div class="checkbox">
				<label>
					<input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Husk meg
				</label>
				<button type="submit" class="btn_frontPage" id="btn_log_in" > Logg inn </button>
				<a class="btn btn-link" href="{{ route('password.request') }}">
					Forgot Your Password?
				</a>
				<button class="btn_frontPage col-xs-5" id="btn_new_user" onclick="location.href='{{ route('sign_up') }}'"> Ny bruker</button>
			</div>
		</form>
    </div>
</div>
</body>
