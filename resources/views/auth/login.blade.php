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
	<link href="{{ asset('css/navbar-fixed-side.css') }}" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet">

	<script type="text/javascript">
		var cookie = document.cookie
	</script>
  </head>
<body>
@if(session()->has('success'))
  <div class="alert alert-success">
	{{ session('success') }}
  </div>
@endif
<div class="container-fluid">
	<div class="frame">
        <h1 class="form-signing-heading">Logg inn</h1>
		<form class="form-signing" role="form" method="POST" action="{{ route('login') }}">
			{{ csrf_field() }}
			<div class="error_class text-center">
				@if ($errors->has('email'))
						<span class="help-block">
							<strong>{{ $errors->first('email') }}</strong>
						</span>
				@endif
				@if ($errors->has('password'))
						<span class="help-block">
							<strong>{{ $errors->first('password') }}</strong>
						</span>
				@endif
			</div>
			<div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
				<label for="email" class="label_log_in">E-post</label>
				<input id="email" type="email" class="form-control" id="email" placeholder="Din e-post"
				data-toggle="tooltip" data-placement="right" title="Må ha følgende format: 'test@test.com'"
				name="email" value="{{ old('email') }}" required autofocus>
			</div>
			<div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
				<label for="pwd" class="label_log_in">Passord</label>
				<input type="password" class="form-control" id="pwd" placeholder="Skriv ditt passord" name="password" required>
			</div>           
			<div class="checkbox">
				<label>
					<input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Husk meg
				</label>
			</div>
			<button type="submit" class="btn_frontPage" id="btn_log_in" > Logg inn </button>
			<button class="btn_frontPage" id="btn_new_user" onclick="location.href='{{ route('register') }}'"> Ny bruker</button>
			<a class="btn btn-link" id="flytt_deg" href="{{ route('password.request') }}"> Glemt ditt passord? </a>
		</form>
    </div>
</div>
@include ('layouts.footer')


</body>
</html>