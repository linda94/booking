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
 <script>
  $(document).ready(function(){
  	$('.searchh').on('keyup',function(){
     var search = $(this).val().toLowerCase();
      $('#Roomtb tr th').each(function(){
       var lineStr = $(this).text().toLowerCase();
        if(lineStr.indexOf(search) === -1){
          $(this).hide();
           }else {
          $(this).show();
        }
      });
    });
   });
  </script>

	<div class="container-fluid">
		<div class="row">
			@include ('layouts.sidebar')
        		<div class="col-sm-10">
          			<div class="page-header" id="roomlist_spacing">
            			<div class="container-fluid row">
              				<div class="col-sm-8">
                			<h2> Roomliste </h2>
              				</div>
              					<div class="col-sm-4"> 
                  				<input type="text" class="searchh form-control" placeholder="søk" />
              					</div>
            			</div>
          			</div>
            			<div class="see_a_room col-sm-12">
              				<div class="roomlist_body text-center">
                				<table class="table table-bordered" id="Roomtb">
                  				@foreach ($rooms as $room)
                  					<tr>
                    					<th scope="row" id="roomlistname">
                                <a href="/rooms/{{ $room->id }}">
                      						{{$room->name}} 
                                </a>
                    					</th>
                  					</tr>
                  				@endforeach
                				</table>
              				</div>
            			</div>
        			</div>
		</div>
	</div>
</body>
