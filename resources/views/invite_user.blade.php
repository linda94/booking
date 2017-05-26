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
@role(('Administrator'))
	<div class="container-fluid">
		<div class="row">
			@include ('layouts.sidebar')
			<div class="col-sm-10">
				@if(session()->has('success'))
					<div class="alert alert-success">
						{{ session('success') }}
					</div>
			    @endif
				<div class="page-header room_header_div">
					<div class="container-fluid" id="invite_user_title_spacer">
						<div class="col-sm-12">
							<h1> Inviter en ny bruker til din l&oslash;sning </h1>
						</div>
					</div>
				</div>
				<div class="container-fluid col-sm-11 invite_user_spacer">
					<div class="row">
						<h4> Det blir sendt en registrerings mail til vedkommende hvor det er mulig &aring; registrere seg
						til din l&oslash;sning</h3>
					</div>
				</div> </br></br>
				<form class="form-horizontal" role="form" method="POST" action="/emails/send">
				{{ csrf_field() }}
					<div class="container-fluid col-sm-11 invite_user_spacer">
						<div class="row">
							<input class="col-lg-8 invite_user_height" name="email"></input>
							<label class="col-sm-1"></label>
							<button class="col-lg-2 btn_main invite_user_height" type="submit"> Send </button>
						</div>
					</div>
				</form>
				<div class="container-fluid col-sm-11 invite_user_spacer">
					<div class="row">
						<div class="book_a_room col-sm-12">
							<div class="userlist_body text-center">
								<table></table>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
@endrole
</body>
</html>