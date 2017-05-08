<!DOCTYPE html>
<html lang="no">
<head>
  <title></title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <link href="{{ asset('css/signin.css') }}" rel="stylesheet">
  <link href="{{ asset('css/navbar-fixed-side.css') }}" rel="stylesheet">
  <script src="{{ asset('js/tooltip.js') }}"></script>

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

  <link class="jsbin" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1/themes/base/jquery-ui.css" rel="stylesheet" type="text/css" />
  <script class="jsbin" src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
  <script class="jsbin" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.0/jquery-ui.min.js"></script>

  <!--[if IE]>
  <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
  <![endif]-->

</head>
<body>
@role(('Administrator'))
	<div class="container-fluid">
		<div class="row">
			@include ('layouts.sidebar')		
			{{ Form::model($room, array('route' => array('update', $room->id), 'method' => 'PUT')) }}
			{{ csrf_field() }}
			<div class="col-sm-10">
				<div class="page-header room_header_div">
					<div class="container-fluid">
						<div class="col-sm-10">
							<h1> 
								<input class="room_inputs" id="room_spacing_name" type="text" name="room_name" value="{{ $room->name }}" required ></input>
							</h1>
						</div>
						<div class="col-sm-2">
							<a href="/rooms/{{ $room->id }}" class="btn btn-default room_button"
							data-toggle="tooltip" data-placement="bottom" title="Tilbake til profil siden">Tilbake
								<!--<span class="glyphicon glyphicon-arrow-left" aria-hidden="true"></span>-->
							</a>
							<a id="avbryt_knapp" class="btn btn-danger room_button" href="/rooms/{{ $room->id }}" data-toggle="tooltip" data-placement="bottom" 
									title="Avbryt endringene, dette vil ikke slette rommet"> Avbryt </a>
						</div>
					</div>
				</div>
			  <!-- your page content -->
				<div class="container-fluid col-sm-6">
					<div class="row">
						<div class="well well-sm row" id="well_spacing">
							<br/>
							<div class="col-sm-12 home_spacing_div home_margin_spacing test_spacing">
								<p><b class="col-sm-4">Plass til:</b><span class="col-sm-8">
								<input class="room_inputs" type="text" name="room_space"
								value="{{ $room->capacity }}" required > personer</input></span></p>
							</div>
							<div class="col-sm-12 home_spacing_div home_margin_spacing test_spacing">
								<p><b class="col-sm-4">Utstyr:</b><span class="col-sm-8">
								<input class="room_inputs" type="text" name="room_equipment"
								data-toggle="tooltip" data-placement="bottom" title="Eksempel: 'TV, Prosjektor, HDMI'"
								value="{{ $room->equipment }}" required ></input></span></p>
							</div>
							<div class="col-sm-12 home_spacing_div home_margin_spacing test_spacing">
								<p><b class="col-sm-4">Etasje:</b><span class="col-sm-8">
								<input class="room_inputs" type="text" name="room_floor" 
								value="2" readonly></input></span></p>
							</div>
							<div class="col-sm-12 home_spacing_div home_margin_spacing test_spacing">
								<p><b class="col-sm-4">Adresse til bygg:</b><span class="col-sm-8">
								<input class="room_inputs" type="text" name="room_adress"
								data-toggle="tooltip" data-placement="bottom" title="Eksempel: 'testeveien21, 4518 oslo'" readonly></input></span></p>
							</div>
							<div class="col-sm-12 home_spacing_div home_margin_spacing test_spacing" id="drop_this_div">
								<button type="submit" class="btn btn-success  col-sm-3" id="margin_left_button">Lagre endringene</button>
								<label class="col-sm-1"></label>
								{{ Form::close() }}
								{{ Form::model($room, array('route' => array('delete', $room->id), 'method' => 'delete')) }}
								<!-- Small modal -->
								<button type="button" class="btn btn-danger col-sm-3" data-toggle="modal" data-target=".bs-example-modal-sm">Slett rom</button>
								<div class="modal bs-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel">
								  <div class="modal-dialog modal-sm" role="document">
									<div class="modal-content">
									  <div class="modal-content">
										  <div class="modal-header">
											<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
											<h4 class="modal-title" id="myModalLabel">Er du sikker pa at du vil slette {{ $room->name }}? </h4>
										  </div>
										  <div class="modal-footer">
											<button type="button" class="btn btn-default" data-dismiss="modal">Lukk</button>
											<button type="submit" class="btn btn-danger">Slett</button>
										  </div>
										</div>
									</div>
								  </div>
								</div>
								<label class="col-sm-1"></label>
								{{ Form::close() }}
								<div class="dropdown dd_div col-sm-3">
									<button class="btn dropdown-toggle" href="#" data-toggle="dropdown" 
									aria-haspopup="true" aria-expanded="false"
									data-placement="bottom" title="Dette er ikke implementert enda!"
									> Brukerrettigheter <span class="caret"></span></button>
									<ul class="dropdown-menu">
										<li class="dropdown-header dd_text_header"> Hvilke brukernivaer kan booke rommet? </li>
										<!-- Give items in this list class="dd_text_item" -->
										<li class="dd_text_item"><a href="#"> Brukere </a></li>
										<li class="dd_text_item"> <a href="#"> Super brukere </a> </li>
										<li class="dd_text_item"><a href="#"> Administrator </a></li>
									</ul>
								</div>
								<label class="class-sm-1"></label>
							</div>
						</div>
					</div>
					<br/>
				</div>
				<div class="container-fluid col-sm-1"></div>
				<div class="row room_lister">
				  <div class="book_a_room col-sm-5">
					<table class="roomTable">
						<tr class="roomTr">
							<th class="roomTd" id="firstTd">
								08:00
							</th>
							<td class="roomTd tdspacing">
								
							</td>
						</tr>
					<tr class="roomTr">
							<th class="roomTd">
								08:30
							</th>
							<td class="roomTd tdspacing">
								
							</td>
						</tr>
						<tr class="roomTr">
							<th class="roomTd">
								09:00
							</th>
							<td class="roomTd tdspacing">

							</td>
						</tr>
					<tr class="roomTr">
					  <th class="roomTd">
						09:30
					  </th>
					  <td class="roomTd tdspacing">
						
					  </td>
					</tr>
					<tr class="roomTr">
					  <th class="roomTd">
						10:00
					  </th>
					  <td class="roomTd tdspacing">
						
					  </td>
					</tr>
					<tr class="roomTr">
					  <th class="roomTd">
						10:30
					  </th>
					  <td class="roomTd tdspacing">
						
					  </td>
					</tr>
					<tr class="roomTr">
					  <th class="roomTd">
						11:00
					  </th>
					  <td class="roomTd tdspacing">

					  </td>
					</tr>
					<tr class="roomTr">
					  <th class="roomTd">
						11:30
					  </th>
					  <td class="roomTd tdspacing">
						
					  </td>
					</tr>

					<tr class="roomTr">
					  <th class="roomTd">
						12:00
					  </th>
					  <td class="roomTd tdspacing">
						
					  </td>
					</tr>

					<tr class="roomTr">
					  <th class="roomTd">
						12:30
					  </th>
					  <td class="roomTd tdspacing">
						
					  </td>
					</tr>

					<tr class="roomTr">
					  <th class="roomTd">
						13:00
					  </th>
					  <td class="roomTd tdspacing">
						
					  </td>
					</tr>

					<tr class="roomTr">
					  <th class="roomTd">
						13:30
					  </th>
					  <td class="roomTd tdspacing">
						
					  </td>
					</tr>

					<tr class="roomTr">
					  <th class="roomTd">
						14:00
					  </th>
					  <td class="roomTd tdspacing">
						
					  </td>
					</tr>

					<tr class="roomTr">
					  <th class="roomTd">
						14:30
					  </th>
					  <td class="roomTd tdspacing">
						
					  </td>
					</tr>

					<tr class="roomTr">
					  <th class="roomTd">
						15:00
					  </th>
					  <td class="roomTd tdspacing">
						
					  </td>
					</tr>

					<tr class="roomTr">
					  <th class="roomTd">
						15:30
					  </th>
					  <td class="roomTd tdspacing">
						
					  </td>
					</tr>

					<tr class="roomTr">
					  <th class="roomTd">
						16:00
					  </th>
					  <td class="roomTd tdspacing">
						
					  </td>
					</tr>

					<tr class="roomTr">
					  <th class="roomTd">
						16:30
					  </th>
					  <td class="roomTd tdspacing">
						
					  </td>
					</tr>
					</table>
				  </div>
				</div>
			</div>
		</div>
	</div>
@endrole
</body>
</html>