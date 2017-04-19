<!DOCTYPE html>
<html>
<head>
  <title></title>
    <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <link href="{{ asset('css/signin.css') }}" rel="stylesheet">
  <link href="{{ asset('css/navbar-fixed-side.css') }}" rel="stylesheet">

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
  <body>
  	<div class="container-fluid">
  		<div class="row">
        <div class="col-sm-2"></div>
        <div class="col-sm-10">
          <div class="page-header room_header_div">
            <div class="container-fluid">
              <div class="col-sm-10">
                <h1> Userlist </h1>
              </div>
              <div class="col-sm-2 input-group" id="search" name="search">
                <input type="text" name="search" placeholder="search" />
              </div>
            </div>
          </div>
            <ul>
              @foreach ($Users as $user)
                <li> {{$user->name}} </li>
              @endforeach
            </ul> 
        </div>                 
    		</div>
    	</div>
    </div>
  </body>
</html>
