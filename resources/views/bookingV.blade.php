<!DOCTYPE html>
<html>
  <head>
    <title></title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link href="{{ asset('css/signin.css') }}" rel="stylesheet">
	<link href="{{ asset('css/navbar-fixed-side.css') }}" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/js/bootstrap-datepicker.min.js"></script>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/css/bootstrap-datepicker3.css"/>
	<script src="{{ asset('js/nb.js') }}"></script>
	<script src="{{ asset('js/kalender.js') }}"></script>
  </head>
  <body>
    <!-- css hentet fra http://www.samrayner.com/bootstrap-side-navbar/ -->
    <div class="container-fluid">
		<div class="row">
			@include ('layouts.sidebar')
			<div class="col-sm-9 col-md-10 col-lg-10">
          <!-- your page content -->
          <div class="container-fluid content_placeholder">
            <div class="row">
              <div class="calendar_top page-header">
                <div class="row">
                  <div class="col-xs-2 col-sm-4 col-md-4 text-right">
                    <a class="btn_bookingVCalender btn prev-day"><span class="glyphicon glyphicon-chevron-left"></span><span class="hidden-xs"> Forrige dag</span></a>
                  </div>
                  <div class="col-xs-8 col-sm-4 col-md-4 text-center">
                    <div class="form-group">
                      <div class="input-group date" id="date" name="date">
                            <input class="form-control" type="text" readonly />
                            <div class="input-group-addon"> 
                              <span class="glyphicon glyphicon-calendar"></span> 
                            </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-xs-2 col-sm-4 col-md-4 text-left">
                    <a class="btn_bookingVCalender btn next-day"><span class="hidden-xs">Neste dag </span><span class="glyphicon glyphicon-chevron-right"></span></a>
                  </div>
                </div>
              </div>
            </div>
            <div class="row room_lister">
			@foreach ($rooms as $room)
              <div class="book_a_room col-sm-6 col-md-4">
                <div class="room_header text-center">
                  <h4 class="room_title"> <a href="/rooms/{{ $room->id }}" style="text-decoration: none;">{{ $room->name }} </a></h4>
                  <p> {{ $room->capacity }} sitteplasser </p>
                  <p> {{ $room->equipment }} </p>
                </div>
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
			@endforeach
            </div>
          </div>
        </div>
			@include ('layouts.footer')
		</div>
	</div>

</body>
</html>