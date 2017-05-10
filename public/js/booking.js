    $(document).ready(function(){
      $("#date").datepicker({
        format: 'dd/mm/yyyy',
        language: 'nb',
        todayHighlight: true,
        //calendarWeeks: true,
        //autoclose: true,
        weekStart: 1,
      }).datepicker("setDate", new Date());

    //var dateStr = "";
    var dateStr = {!! json_encode(session('dateStr')) !!}
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
      //please put attention to the month (parts[0]), Javascript counts months from 0:
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
          disabledHours: [0,1,2,3,4,5,6,7,17,18,19,20,21,22,23]
        });
      $(v).find('span.input-group-addon').click(function(e) {
        $input.focus();
      });

    });

    var rooms = {!! str_replace("'", "\'", json_encode($rooms)) !!};

    var bookings = {!! str_replace("'", "\'", json_encode($bookings)) !!};

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

    var times = makeTimeHalfHour(8, 17);


    var makeRoomTables = function(rooms, times) {
      for (var i = 0; i < rooms.length; i++) {
          var roomId = rooms[i]['id'];
          var table = '<div class="col-sm-5"><table class="roomTable" id=' + roomId + '>'+ rooms[i]['body'] +'</table></div>';
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

    var displayBookings = function(bookings, strDateTime) {

      for(var i = 0; i<bookings.length; i++) {

        //alert(bookings[i]['dateString']);
        if(bookings[i]['dateString'] == strDateTime) {

          var tdsInTable = $('table#'+ bookings[i]['room_id'] +'').find('td');

          for(var j = 0; j <tdsInTable.length; j++) {

            if (bookings[i]['from'] == tdsInTable[j].id) {
              $(tdsInTable[j]).append(bookings[i]['from']).attr('id', 'bookStart').addClass('colorMe booked').attr('holdID', bookings[i]['id']);
              $(tdsInTable[j]).append('<a href="/fargeklatt/'+bookings[i]['id']+'" id="'+ bookings[i]['id'] +'">vis booking</a>');
            } 
            else if (bookings[i]['to'] == tdsInTable[j].id) {
              $(tdsInTable[j-1]).append(bookings[i]['to']).attr('id', 'bookEnd').addClass('colorMe booked').attr('holdID', bookings[i]['id']);
            }
          }
        }
      }
    };

    displayBookings(bookings, strDateTime);

    // Fargelegge alle celler/td fra og med bookstart til og med bookend, for alle celler i tabell
    var colorBookings = function() {
      var start = false;
      var bookingID = "";
          $("table td").filter(function(){
            // Hente ID til booking gjennom atributtet holdID
            if(this.id == "bookStart") {
              bookingID = this.getAttribute('holdID');
            }
            if(this.id == "bookStart" || start) {
              if(this.id == "bookEnd"){
                  start = false;
                  return true;
              }
              start = true;
              $(this).attr('holdID', bookingID);
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



    var getBookingInfo = function() {
    /* Henter ut info fra booking som er trykket på, legger inn i modal-felt */
      $('.colorMe').click({bookings}, function (e) {
        // delete funksjonalitet
        var nyBookingID = this.getAttribute('holdID');
        var actualBookingObject = findBookingInList(bookings, nyBookingID);
        alert("nyBookingID: " + nyBookingID);
        alert("holdID attribute: " + this.getAttribute('holdID'));
        alert("Actual booking object id: " + actualBookingObject['id']);
        var url = window.location.href + "/" + nyBookingID;
        alert('url: ' + url);
        $('#booking_modal form').attr('action', url);
        // vis fra og til
        //var bookingID = this.getAttribute('holdID') - 1;
        //alert("bookingID: " + bookingID);

        $('.booking_from').empty();
        $('.booking_from').append(actualBookingObject['from']);
        $('.booking_to').empty();
        $('.booking_to').append(actualBookingObject['to']);
      });
    }

    $('.colorMe').click(getBookingInfo());



    /* Event handlers for hva som skjer når selected day, next day, eller prev day trykkes på */
    var dateSetTables = function() {
        /* Sletter bookings som er satt på tabellene, dvs fjerner "booked" og "bookedFrom" attributter */
         $('.roomTable td').filter(function() {
          $(this).attr('class', 'roomTd tdspacing').attr('id', $(this).attr("name")).html("").attr('data-target', "#myModal");
        });
        var currDate = new Date($('#date').datepicker('getDate'));
        var strDateTime2 =  currDate.getDate() + "/" + (currDate.getMonth()+1) + "/" + currDate.getFullYear();
        //alert(strDateTime2);
        /* Går gjennom bookings og setter inn de som skal inn på den dagen det er trykket på */
        $('.colorMe').click(getBookingInfo());
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




$('table#'+ 1 +' td').filter(function(){

            var thisName = $(this).attr("name");
            console.log(thisName);
            var thisClass = $(this).attr("class");
            console.log(thisClass);
          });



/* Funksjon som blir trigget når du vil lage en ny booking ved å trykke et sted i tabellen */
    $('.roomTable').click(function(e) {
      var tableID = this.getAttribute("id");
      $('.room_id').val(tableID);

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
      //alert("booked to: " + bookedTo);
      // room_id = 2
      var room_id = $(".datetimepicker3").find("input[name='room_id']").val();
      //alert("room_id: " + room_id);

      var bookCheck = checkIfBooked(bookedFrom, bookedTo, room_id);
      //alert("bookable = " + bookCheck);

      if(bookCheck == false) {
        alert("Can't book: the room is already booked at the given times");
        //$('.form-horizontal').attr('method', "GET");
        //$('.form-horizontal').val();
        $('.save_booking').attr('type', "button");
        $('#myModal').modal('hide');
      }
      else {
        $('.save_booking').attr('type', "sumbit button");
      }

    });



});