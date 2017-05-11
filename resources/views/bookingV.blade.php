<!DOCTYPE html>
<html>
  <head>
    <title></title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link href="{{ asset('css/signin.css') }}" rel="stylesheet">
	<link href="{{ asset('css/navbar-fixed-side.css') }}" rel="stylesheet">
    <link href="{{ asset('css/booking.css') }}" rel="stylesheet">


    <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <!-- Ikke sikkert vi trenger denne -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.18.1/moment.js"></script>
    <!-- Ikke sikkert vi trenger denne -->
    <script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/jquery-ui.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/js/bootstrap-datetimepicker.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/css/bootstrap-datetimepicker.min.css" />
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/js/bootstrap-datepicker.min.js"></script>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/css/bootstrap-datepicker3.css"/>
	<!--<script src="{{ asset('js/nb.js') }}"></script>-->
	<!--<script src="{{ asset('js/kalender.js') }}"></script>-->
	<script src="{{ asset('js/tooltip.js') }}"></script>
  <!--<script src="{{ asset('js/booking.js') }}"></script>-->
  <script>
        $(document).ready(function(){
      $("#date").datepicker({
        format: 'dd/mm/yyyy',
        language: 'nb',
        todayHighlight: true,
        //calendarWeeks: true,
        autoclose: true,
        weekStart: 1,
      }).datepicker("setDate", new Date());

    //var dateStr = "";
    var dateStr = {!! json_encode(session('dateStr')) !!}

    var user_idAuth = {!! Auth::user()->id !!}

    //alert(dateStr);

    /* Vise tabeller for riktig dato, og sørge for at det er i riktig dato-format */
    var strDateTime = "";
    if(dateStr == null) {
      var currDate = new Date($('#date').datepicker('getDate'));
      strDateTime =  currDate.getDate() + "/" + (currDate.getMonth()+1) + "/" + currDate.getFullYear();
      /* Hente ut dagens dato */
    }
    else {
      strDateTime = dateStr;  
      var parts = dateStr.split('/');
      //please put attention to the month (parts[1]), Javascript counts months from 0:
      // January - 0, February - 1, etc
        //parts[2] = year, parts[1]-1 = month, parts[0] = day
      var mydate = new Date(parts[2],parts[1]-1, parts[0]);
      //alert("strDateTime: " + strDateTime);
      //alert(mydate.toDateString()); 
      $('#date').datepicker("setDate", mydate);
    }

    $('.datetimepicker3').each(function(k, v) {
      var $input = $(v).find('.datetimepicker3');
        $input.datetimepicker({
          format: 'HH:mm',
          stepping: 30,
          disabledHours: [0,1,2,3,4,5,6,7,22,23]
        });
      $(v).find('span.input-group-addon').click(function(e) {
        $input.focus();
      });

    });

    var rooms = {!! str_replace("'", "\'", json_encode($rooms)) !!};

    var bookings = {!! str_replace("'", "\'", json_encode($bookings)) !!};

    var users = {!! str_replace("'", "\'", json_encode($users)) !!};

    $('#calender-table').empty();

    // Takes starttime and endtime, return list with the times in half hour format
    var makeTimeHalfHour = function(start_tid, slutt_tid) {
      var x = 30; //minutes interval
      var times = []; // time array
      var tt = start_tid*60; // start time

      //loop to increment the time and push results in array
      for (var i=0;tt<slutt_tid*60; i++) {
        var hh = Math.floor(tt/60); // getting hours of day in 0-24 format
        var mm = (tt%60); // getting minutes of the hour in 0-55 format
        times[i] = ("0" + (hh)).slice(-2) + ':' + ("0" + mm).slice(-2); // pushing data in array in [00:00 - 12:00 AM/PM format]
        tt = tt + x;
      }
      return times;
    }

    var times = makeTimeHalfHour(8, 22);


    var makeRoomTables = function(rooms, times) {
      for (var i = 0; i < rooms.length; i++) {
          var roomId = rooms[i]['id'];
          //var table = '<div class="col-sm-3 col-md-3"><table class="roomTable" id=' + roomId + '>'+ rooms[i]['name'] +'</table></div>';
          var table = '<div class="col-sm-4 col-md-3"><table class="roomTable" id=' + roomId + '>'
            + '<div class="room_header text-center"><h4 class="room_title">'
              + '<a href="/rooms/'+ rooms[i]['id'] +'" style="text-decoration: none;">'+ rooms[i]['name'] +'</a></h4>'
              + '<p>'+ rooms[i]['capacity'] +'</p><p>'+ rooms[i]['equipment'] +'</p>'
            + '</div>'
          +'</table></div>';
          $(table).appendTo('#calender-table');

          for(var j = 0; j < times.length; j++) {
            $('<tr class="roomTr"><th class="roomTd" id="firstTd">'+ times[j] +'</th><td role="button" class="roomTd tdspacing" data-toggle="modal" data-target="#myModal" id=' + (times[j]+':00') + ' name='+ (times[j]+':00') +'></td></tr>').appendTo('table#'+ roomId +'');
          }
        } 
      
    };

    makeRoomTables(rooms, times);

    //bookings[i]['room_id']

    // bookings[0]['room_id'] = 1
    // bookings[1]['room_id'] = 2
    // bookings[2]['room_id'] = 1

    //var tdsInTable = $('table#'+ '1' +'').find('td');

    var makeBookingClickable = function () {
      $(".colorMe").attr("data-target", "#booking_modal");
      $(".colorMe").attr("data-toggle", "modal");
    }

    // Find the user that is linked to the booking
    var findUserWithBooking = function(user_id) {
      for(var i = 0; i<users.length; i++) {
        if(users[i]['id'] == user_id) {
          return users[i];
        }
      }
      return null;
    };

    var displayBookings = function(bookings, strDateTime) {

      for(var i = 0; i<bookings.length; i++) {

        //alert(bookings[i]['dateString']);
        if(bookings[i]['dateString'] == strDateTime) {

          var tdsInTable = $('table#'+ bookings[i]['room_id'] +'').find('td');

          for(var j = 0; j <tdsInTable.length; j++) {

            if (bookings[i]['from'] == tdsInTable[j].id) {
              $(tdsInTable[j])/*.append(bookings[i]['from'])*/.attr('id', 'bookStart').addClass('colorMe booked').attr('holdID', bookings[i]['id']).attr('bookUser_id', bookings[i]['user_id']);
              /*$(tdsInTable[j]).append('<a href="/bookingV/'+bookings[i]['id']+'" id="'+ bookings[i]['id'] +'">vis booking</a>');*/
              var userWithBooking = findUserWithBooking(bookings[i]['user_id']);
              $(tdsInTable[j]).append('<p style="color:white;margin-bottom:-2px">'+ userWithBooking['name'] + '</p>');

            } 
            else if (bookings[i]['to'] == tdsInTable[j].id) {
              $(tdsInTable[j-1])/*.append(bookings[i]['to'])*/.attr('id', 'bookEnd').addClass('colorMe booked').attr('holdID', bookings[i]['id']).attr('bookUser_id', bookings[i]['user_id']);
            }
          }
        }
      }
    };

    displayBookings(bookings, strDateTime);

    // Fargelegge alle celler/td fra og med bookstart til og med bookend, for alle celler i tabell
    // + setter inn booking ID for tabellrader som ikke har id bookStart eller bookEnd
    var colorBookings = function() {
      var start = false;
      var bookingID = "";
      var bookUser_id = "";
          $("table td").filter(function(){
            // Hente ID til booking gjennom atributtet holdID
            if(this.id == "bookStart") {
              bookingID = this.getAttribute('holdID');
              bookUser_id = this.getAttribute('bookUser_id');
            }
            if(this.id == "bookStart" || start) {
              if(this.id == "bookEnd"){
                  start = false;
                  return true;
              }
              start = true;
              $(this).attr('holdID', bookingID);
              $(this).attr('bookUser_id', bookUser_id);
          }
        return start;

      }).addClass('colorMe booked');
    };

    colorBookings();
    makeBookingClickable();



    var findBookingInList = function(bookings, id) {
      for(var i = 0; i<bookings.length; i++) {
        if(id == bookings[i]['id']) {
          return bookings[i];
        }
      }
      return null;
    };


/*
    var getBookingInfo = function() {
    /* Henter ut info fra booking som er trykket på, legger inn i modal-felt *//*
      $('.colorMe').click({bookings, user_idAuth}, function (e) {
        // delete funksjonalitet
        var bookUser_id = this.getAttribute('bookUser_id');
        var nyBookingID = this.getAttribute('holdID');
        var actualBookingObject = findBookingInList(bookings, nyBookingID);
        //alert("nyBookingID: " + nyBookingID);
        //alert("holdID attribute: " + this.getAttribute('holdID'));
        //alert("Actual booking object id: " + actualBookingObject['id']);
        $('#delete_booking').show();
        if(bookUser_id != user_idAuth) {
          $('#delete_booking').hide();
        }
        var url = window.location.href + "/" + nyBookingID;
        //alert('url: ' + url);
        $('#booking_modal form').attr('action', url);
        // vis fra og til
        //var bookingID = this.getAttribute('holdID') - 1;
        //alert("bookingID: " + bookingID);

        //$('.booking_from').empty();
        $('.booking_from').html(actualBookingObject['from']);
        //$('.booking_to').empty();
        $('.booking_to').html(actualBookingObject['to']);
      });
    }*/

    //$('.colorMe').click(getBookingInfo());

    $('#booking_modal').on('show.bs.modal', function (event) {
      var relTarEvent = $(event.relatedTarget); // Sender en liste, ikke objektet selv
      var tdClickedOn = relTarEvent[0];
      //console.log(tdClickedOn);
      var bookUser_id = tdClickedOn.getAttribute('bookUser_id');
      //console.log("bookUser_id: " + bookUser_id);
      var nyBookingID = tdClickedOn.getAttribute('holdID');
      var actualBookingObject = findBookingInList(bookings, nyBookingID);

      $('#delete_booking').show();
      if(bookUser_id != user_idAuth) {
        $('#delete_booking').hide();
      }

      var url = window.location.href + "/" + nyBookingID;
      $('#booking_modal form').attr('action', url);

      //var userBooking = findUserWithBooking(bookUser_id);

      //$('#showBookingModalLabel').html(userBooking['name']);
      $('#showBookingModalLabel').html('<a href="/user_list/'+ bookUser_id +'">'+users[bookUser_id-1]['name']+'</a>');
      $('.booking_from').html(actualBookingObject['from']);
      $('.booking_to').html(actualBookingObject['to']);

      //console.log("actualBookingObject from: " + actualBookingObject['from']);
    });



    /* Event handlers for hva som skjer når selected day, next day, eller prev day trykkes på */
    var dateSetTables = function() {
        /* Sletter bookings som er satt på tabellene, dvs fjerner "booked" og "bookedFrom" attributter */
         $('.roomTable td').filter(function() {
          $(this).attr('class', 'roomTd tdspacing').attr('id', $(this).attr("name")).html("").attr('data-target', "#myModal").attr('holdID', "");
        });
        var currDate = new Date($('#date').datepicker('getDate'));
        var strDateTime2 =  currDate.getDate() + "/" + (currDate.getMonth()+1) + "/" + currDate.getFullYear();
        //alert(strDateTime2);
        /* Går gjennom bookings og setter inn de som skal inn på den dagen det er trykket på */
        //$('.colorMe').click(getBookingInfo());
        displayBookings(bookings, strDateTime2);
        colorBookings();
        makeBookingClickable();
    }

    $('.next-day').on("click", function () {
      var date = $('#date').datepicker('getDate');
      date.setTime(date.getTime() + (1000*60*60*24))
      $('#date').datepicker("setDate", date);
        dateSetTables();
    });

    $('.prev-day').on("click", function () {
      var date = $('#date').datepicker('getDate');
      date.setTime(date.getTime() - (1000*60*60*24))
      $('#date').datepicker("setDate", date);
        dateSetTables();
    });    


    /* bootstrap-datepicker ting som kjører når event 'changeDate' oppstår */
    $('#date').datepicker().on('changeDate', function(e) {
          /* Sletter bookings som er satt på tabellene, dvs fjerner "booked" og "bookedFrom" attributter */
          dateSetTables();
      });



/*
$('table#'+ 1 +' td').filter(function(){

            var thisName = $(this).attr("name");
            console.log(thisName);
            var thisClass = $(this).attr("class");
            console.log(thisClass);
          });
*/


/* Funksjon som blir trigget når du vil lage en ny booking ved å trykke et sted i tabellen */
    $('.roomTable').click(function(e) {
      var tableID = this.getAttribute("id");
      $('.room_id').val(tableID);
      // Add user_id to new-booking form
      $('.user_id').val(user_idAuth);


      var currDate = new Date($('#date').datepicker('getDate'));
      var strDateTime2 =  currDate.getDate() + "/" + (currDate.getMonth()+1) + "/" + currDate.getFullYear();
      $('.dateString').val(strDateTime2);
    });



    var checkIfBooked = function(bookedFrom, bookedTo, room_id) {
      var start = false;
      //var returnStr = "booking proceed";
      var bookable = true;
      $('table#'+ room_id +' td').filter(function(){
        //feks 08:30:00
        var thisName = $(this).attr("name");
        //alert("thisName: " + thisName);
        var thisClass = $(this).attr("class");
        //alert("thisClass: " + thisClass);

        //alert("returnStr: " + returnStr);
        if(thisName == bookedFrom || start) {
          //alert(thisName + " = " + bookedFrom);
          if(thisName == bookedTo) {
            //alert(thisName + " = " + bookedTo);
            start = false;
            if(thisClass == 'roomTd tdspacing colorMe booked') {
              //returnStr = "can't book: the room is already booked at the given times";
              //bookable = false;
              return false;
            }
            return false; // Tilsvarende break;
          }
          start = true;
          if(thisClass == 'roomTd tdspacing colorMe booked') {
            //returnStr = "can't book: the room is already booked at the given times";
            bookable = false;
            return false;
        }
      }
    });
    //return returnStr;
    return bookable;
  };



  $('.save_booking').click(function(e) {
      // bookedFrom = 12:00:00
      var bookedFrom = $(".datetimepicker3").find("input[name='from']").val() + ":00";
      //alert("booked from: " + bookedFrom);
      // bookedTo = 14:00:00
      var bookedTo = $(".datetimepicker3").find("input[name='to']").val() + ":00";

      var bookedFromTime = moment(bookedFrom, "HHmmss").format("HH:mm");
      var bookedToTime = moment(bookedTo, "HHmmss").format("HH:mm");

      if (bookedFromTime >= bookedToTime) {
        alert("Du kan ikke booke på grunn av valgt tid");
        $('.save_booking').attr('type', "button");
      } 
      else {
      //alert("booked to: " + bookedTo);
      // room_id = 2
        var room_id = $(".datetimepicker3").find("input[name='room_id']").val();
        //alert("room_id: " + room_id);

        var bookCheck = checkIfBooked(bookedFrom, bookedTo, room_id);
        //alert("bookable = " + bookCheck);

        if(bookCheck == false) {
          alert("Reservasjonen kan ikke fullføres. Rommet er opptatt ved gitt tidspunkt");
          //$('.form-horizontal').attr('method', "GET");
          //$('.form-horizontal').val();
          $('.save_booking').attr('type', "button");
        }
        else {
          $('.save_booking').attr('type', "sumbit button");
        }
      }
    });


    $("td").click(function () {
      var getTimeFromTd = this.getAttribute("name");
      var removeSecondsFromTime = getTimeFromTd.substring(0, 5);
        $("input[name='from']").val(removeSecondsFromTime);
          //console.log(removeSecondsFromTime);
      var getHour = getTimeFromTd.substring(0, 2);
      var hourStrToInt = parseInt(getHour) + 1;
        if (hourStrToInt < 10) {
          hourStrToInt = "0" + hourStrToInt;
        }
      var addHourIncr = hourStrToInt + ":" + getTimeFromTd.substring(3, 5);
      //console.log("getHour: " + getHour);
      //console.log("hourStrToInt: " + hourStrToInt);
      //console.log("addHourIncr: " + addHourIncr);

          $("input[name='to']").val(addHourIncr);
    });



});

  </script>
  </head>
  <body>
  @role((['Administrator','SuperBruker','Bruker']))
    <!-- css hentet fra http://www.samrayner.com/bootstrap-side-navbar/ -->
    <div class="container-fluid">
		<div class="row">
			@include ('layouts.sidebar')
			<div class="col-sm-10 col-md-10 col-lg-10">
          <!-- your page content -->
          <div class="container-fluid content_placeholder">
          <!-- Setter inn en "bar" øverst dersom nytt rom ble opprettet -->
            @if(session()->has('success'))
              <div class="alert alert-danger">
                {{ session('success') }}
              </div>
            @endif

            <!--<div class="container">-->
              <div class="row" id="calender_date">
                  <div class="calendar_top page-header">
                    <div class="row">
                      <div class="col-xs-2 col-sm-4 col-md-4 text-right">
                        <a class="btn_bookingVCalender btn prev-day"><span class="glyphicon glyphicon-chevron-left"></span><span class="hidden-xs"> Forrige dag</span></a>
                      </div>
                      <div class="col-xs-8 col-sm-4 col-md-4 text-center">
                        <div class="form-group">
                          <div class="input-group date" id="date" name="date">
                                <input class="form-control text-center" type="text" readonly />
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

              <!-- Room tables -->
              <div class="row room_lister book_a_room" id="calender-table">
              </div>
            </div>




          
          <div class="modal" id="booking_modal" tabindex="-1" role="dialog" aria-labelledby="showBookingModal" aria-hidden="true">
          {{Form::open(['url' => 'foo/bar', 'method' => 'delete'])}}
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">x</button>
                  <h4 class="modal-title" id="showBookingModal">Booking</h5>
                </div>
                <div class="modal-body">
                  <h4 id="showBookingModalLabel"></h4>
                  <p>Fra:  <span class="booking_from"></span></p>
                  <p>Til: <span class="booking_to"></span></p>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                  <button type="submit" class="btn btn-danger" id="delete_booking">Slett booking</button>
                  <!--<button type="button" class="btn btn-primary">Save changes</button>-->
                </div>
              </div>
              {{ Form::close() }}
            </div>

          </div>



              <!-- Modal -->
              <div id="myModal" class="modal fade" role="dialog">
                <div class="modal-dialog">
                  <!-- Modal content-->
                  <div class="modal-content">
                    <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal">&times;</button>
                      <h4 class="modal-title">Velg et tidspunkt</h4>
                    </div>
                    <div class="modal-body">
                      <form class="form-horizontal" role="form" method="POST" action="/bookingV">
                      {{ csrf_field() }}

                        <div class="form-group">
                          <label for="message-text" class="control-label">Dato</label>
                          <div class="input-group date" id="date" name="date">
                            <input class="form-control dateString" type="text" name="dateString">
                            <div class="input-group-addon">
                              <span class="glyphicon glyphicon-calendar"></span>
                            </div>
                          </div>
                        </div>

                        <div class="form-group">
                          <label for="message-text" class="control-label">Fra</label>
                            <div class='input-group date datetimepicker3'>
                              <input type='text' class="form-control datetimepicker3" data-format="HH:mm:ss" name="from"/>
                              <span class="input-group-addon">
                                <span class="glyphicon glyphicon-time"></span>
                              </span>
                            </div>
                        </div>

                        <div class="form-group">
                          <label for="message-text" class="control-label">Til</label>
                            <div class='input-group date datetimepicker3'>
                              <input type='text' class="form-control datetimepicker3" data-format="HH:mm:ss" name="to"/>
                              <span class="input-group-addon">
                                <span class="glyphicon glyphicon-time"></span>
                              </span>
                            </div>
                        </div>
                        <div class="form-group">
                          <label for="message-text" class="control-label"></label>
                            <div class='input-group date datetimepicker3'>
                              <input type='hidden' class="form-control datetimepicker3 room_id" data-format="HH:mm:ss" name="room_id"/>
                            </div>
                        </div>
                        <div class="form-group">
                          <label for="message-text" class="control-label"></label>
                            <div class='input-group date datetimepicker3'>
                              <input type='hidden' class="form-control datetimepicker3 user_id" name="user_id"/>
                            </div>
                        </div>


                        <button type="submit button" class="btn btn-default save_booking"> Lagre </button>
                      </form>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal" class="close">Close</button>
                  </div>
                </div>
              </div>
            </div>

            <!--
            <div class="row">
              <div class="calendar_top page-header">
                <div class="row">
                  <div class="col-xs-2 col-sm-4 col-md-4 text-right">
                    <a class="btn_bookingVCalender btn prev-day"><span class="glyphicon glyphicon-chevron-left"></span><span class="hidden-xs"> Forrige dag</span></a>
                  </div>
                  <div class="col-xs-8 col-sm-4 col-md-4 text-center">
                    <div class="form-group">
                      <div class="input-group date" id="date" name="date">
                            <input class="form-control text-center" type="text" readonly />
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
              <div class="book_a_room col-sm-4 col-md-3">
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
            -->
          </div>
        </div>
		</div>
@endrole
</body>
</html>