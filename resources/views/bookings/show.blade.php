<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title></title>
		<!-- Latest compiled and minified CSS -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
		<!-- Latest compiled and minified JavaScript -->
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
	</head>
	<body>
		<div class="container-fluid">
			<br/>
			<br/>
			<a href="/bookingV">Tilbake</a>
			<br/>
			<br/>
			<p>From: {{$booking->from}}</p>
			<p>To: {{$booking->to}}</p>
			<br/>
			<br/>
			<button type="button-btn" class="btn btn-danger" data-toggle="modal" data-target=".bs-example-modal-sm">Delete booking</button>
			{{ Form::model($booking, array('route' => array('delete_booking', $booking->id), 'method' => 'DELETE')) }}
			<div class="modal bs-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel">
				<div class="modal-dialog modal-sm" role="document">
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
							<h4 class="modal-title">Er du sikker på at du vil slette booking?</h4>
						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
							<button type="submit" class="btn btn-danger">Delete</button>
						</div>
						</div><!-- /.modal-content -->
					</div>
				</div>
				{{ Form::close() }}
			</div>
			
		</body>
	</html>