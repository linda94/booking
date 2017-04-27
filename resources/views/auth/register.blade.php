<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<title>Sign up</title>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
		
		<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.4.8/angular.min.js"></script>
		<!-- Custom styles for this template -->
		<link href="{{ asset('css/signin.css') }}" rel="stylesheet">
		<link href="{{ asset('css/navbar-fixed-side.css') }}" rel="stylesheet">
		<link href='http://fonts.googleapis.com/css?family=Lato:400,700' rel='stylesheet' type='text/css'>
	</head>
	<body>
	
	
	
<div class="container">
    <div class="frame">
		<h1 class="form-signing-heading reg_title"> Ny bruker </h1><br>
        <form class="form-signing" role="form" method="POST" action="{{ route('register') }}"> {{ csrf_field() }}
		<div class="error_class text-center">
			@if ($errors->has('email'))
				<span class="help-block">
					<strong>{{ $errors->first('email') }}</strong>
				</span>
			@endif
			@if ($errors->has('name'))
					<span class="help-block">
						<strong>{{ $errors->first('name') }}</strong>
					</span>
			@endif
			@if ($errors->has('password'))
					<span class="help-block">
						<strong>{{ $errors->first('password') }}</strong>
					</span>
			@endif
		</div>
		<div class="text-center{{ $errors->has('name') ? ' has-error' : '' }}">
			<input type="text" class="register-name" id="testinging"
			placeholder="Navn" name="name" maxlength="25" minlength="3"
			value="{{ old('name') }}" required autofocus>
		</div>
		<div class="text-center{{ $errors->has('email') ? ' has-error' : '' }}">	
			<input type="email" class="register-input" placeholder="E-post" 
			name="email" data-toggle="tooltip" data-placement="right" title="Eksempel: 'test@test.com'"
			value="{{ old('email') }}" required>
		</div>
		<div class="text-center{{ $errors->has('password') ? ' has-error' : '' }}">
			<input id="password" type="password" class="register-input" 
			id="confirm_password" placeholder="Passord" name="password" 
			data-toggle="tooltip" data-placement="right" title="Minimum 6 karakterer" required>
		</div>
		<div class="text-center">
			<input type="password" class="register-input" id="confirm_password" 
			placeholder="Bekreft passord" name="password_confirmation" required>
		</div>
		<div class="text-center">
			<input type="tel" class="register-input" placeholder="Telefonnummer, valgfritt felt" name="phone"
			type="number" maxlength="8" minlength="8" 
			data-toggle="tooltip" data-placement="right" title="max og minimum 8 tall. Eksempel: '12345678'" value="{{ old('phone') }}">
		</div>
		<div class="text-center">
			<input type="text" class="register-input" placeholder="Din bedrift, velgfritt felt" name="company"
			maxlength="25" value="{{ old('company') }}">
		</div>
		<div class="text-center">
			<button type="submit" class="btn_reg"> Registrer deg </button>
		</div>
		</form>
		<div class="text-center already_user_div">
			<div class="already_user_text"> Allerede en bruker? <label class="label_alreadyauser" onclick="location.href='{{ route('login') }}'"> Logg inn her </label></div>
		</div>
	</div>
</div>

@include ('layouts.footer')
<script src="{{ asset('js/ConfirmPassword.js') }}"></script>

	</body>
</html>