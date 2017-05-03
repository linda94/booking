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
        @include ('layouts.sidebar')
        <div class="col-sm-10">
          <div class="page-header" id="userlist_spacing">
            <div class="container-fluid row">
              <div class="col-sm-8">
                <h2> Brukerliste </h2>
              </div>
              <div class="col-sm-4"> 
                  <input type="text" class="search form-control" placeholder="søk" />
              </div>
            </div>
          </div>
            <div class="book_a_room col-sm-12">
              <div class="userlist_body text-center">
                <table class="table table-bordered" id="Usertb">
                  @foreach ($Users as $user)
                  <tr>
                    <th scope="row" id="userlistname">
                      <a href="/users/{{$user->id}}">
                        {{$user->name}} 
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
    </div>
    @include ('layouts.footer')
  </body>
</html>

