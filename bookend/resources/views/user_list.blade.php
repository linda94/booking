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
  <script src="http://code.jquery.com/jquery-latest.min.js" type="text/javascript"></script>

</head>
  <body>
    <script>
      $(document).ready(function(){
        $('.search').on('keyup',function(){
          var search = $(this).val().toLowerCase();
          $('#Usertb tr th').each(function(){
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
        <div class="col-sm-2"></div>
        <div class="col-sm-10">
          <div class="page-header room_header_div">
            <div class="container-fluid">
              <div class="col-sm-10">
                <h2> Userlist </h2>
              <div class="col-sm-2 input-group"> 
                <input type="text" class="search form-control" id="search" placeholder="søk" />
              </form>
                </div>
              </div>
            </div>
          </div>
             @foreach ($Users as $user)
            <div class="book_a_room col-sm-10">
              <div class="userlist_body text-center">
                <table class="table table-bordered" id="Usertb">
                  <tr>
                    <th scope="row" id="userlistname">
                      {{$user->name}} 
                    </th>
                  </tr>
                </table>
              </div>
            </div>
            @endforeach
        </div>                 
    		</div>
    	</div>
    </div>
  </body>
</html>

