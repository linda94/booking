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
  </head>
  <body>
    <!-- css hentet fra http://www.samrayner.com/bootstrap-side-navbar/ -->
<<<<<<< HEAD
    <div class="container-fluid">
      <div class="row">
        <div class="col-sm-2 col-lg-2">
          <nav class="navbar navbar-default navbar-fixed-side">
            <div class="container-fluid test">
              <!-- Brand and toggle get grouped for better mobile display -->
              <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                </button>
              </div>
              <!-- Collect the nav links, forms, and other content for toggling -->
              <div class="collapse navbar-collapse nb_div" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                  <li>
                    <div class="dropdown dd_div">
                      <button class="btn dropdown-toggle dd_knappen" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> CoWorx <span class="caret"></span></button>
                      <ul class="dropdown-menu">
                        <li class="dropdown-header dd_text_header"> Dine andre løsninger </li>
                        <!-- Give items in this list class="dd_text_item" -->
                        <li class="dd_text_item"><a href="#"> Google </a></li>
                        <li class="dropdown-header dd_text_header"> Brukerinnstillinger </li>
                        <li class="dd_text_item"> <a href="#"> Logg ut </a> </li>
                      </ul>
                    </div>
                  </li>
                  <li class="name_placeholder"><p>Kevin Benjamin Zeppo Adriaansen</p></li>
                  <li><a href="#">Min profil</a></li>
                  <li><a href="#">Rom liste </a>
                  <ul class="room_list">
                    <!-- Give each room <span class="glyphicon glyphicon-calendar glyphicon_style calendar_glyp"> for calendar icon-->
                    <li> <a href="#"> <span class="glyphicon glyphicon-calendar glyphicon_style calendar_glyp"></span> Markens </a></li>
                    <li> <a href="#"> <span class="glyphicon glyphicon-calendar glyphicon_style calendar_glyp"></span> Markens </a></li>
                      <ul>
                        <li class="new_item"> <a href="#" class="add_a_white"> + Nytt rom </a> </li>
                      </ul>
                  </ul>
                </li>
                <li><a href="#" class="user_title">Brukere </a>
                <ul class="user_list_in_location">
                  <ul>
                    <li class="new_item" id="add_user"> <a href="#" class="add_a_white"> + Ny bruker </a> </li>
                  </ul>
                </ul>
              </li>
              <li class="adm_knapp"><a href="#">Administrative </a> </li>
              <li><a href="#"> <span class="glyphicon glyphicon-th-list glyphicon_style"> </span> Bytt visning </a> </li>
            </ul>
            
            </div><!-- /.navbar-collapse -->
            </div><!-- /.container-fluid -->
          </nav>
        </div>
        <div class="col-sm-10 col-lg-10 innhold">
          <!-- your page content --><p> Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc nec faucibus orci. Maecenas ut tempor massa, non faucibus felis. Vivamus facilisis lorem nec nisl rhoncus ultricies. Fusce in consequat nisl. Vivamus vel rhoncus diam. Aenean vitae arcu pharetra, dictum lectus ac, convallis lectus. Proin eget rutrum erat. Vestibulum suscipit convallis lacus, maximus efficitur mauris elementum vel. Donec pharetra augue eu diam porttitor ultricies.
          Donec a tincidunt sem. Phasellus tempus ut purus id pharetra. Sed interdum metus mi, a commodo nunc dapibus vitae. Nullam ante lacus, sodales a tortor sed, rhoncus elementum nunc. Aliquam ultrices eu velit vitae porttitor. Sed lobortis felis dui, vitae viverra velit iaculis ac. Mauris non scelerisque orci. Pellentesque vitae lorem tortor. Mauris posuere tellus vel luctus ultricies. Nam vitae sodales nibh, sed consequat nulla.
          Phasellus viverra congue libero sit amet faucibus. Mauris cursus neque et nisi blandit suscipit. Ut ut lacinia nulla. Cras ex nisi, gravida nec commodo non, varius eu dolor. Etiam sit amet nulla vel diam gravida sagittis. Phasellus nisl nunc, vehicula at mauris id, auctor interdum libero. Nulla facilisi. Vivamus pharetra lectus urna, non tincidunt lectus facilisis vitae. Fusce sed magna libero.
          Donec eget eros sit amet purus vehicula ullamcorper. Quisque ac augue vitae nisl feugiat molestie eget fringilla dolor. Maecenas malesuada, eros nec vehicula viverra, sapien tellus suscipit ex, nec sagittis tellus odio vel sem. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Nunc at interdum dui. Sed non augue eget libero dapibus laoreet. Sed felis ante, pulvinar a egestas at, sodales id magna. Phasellus dignissim nibh urna, eget tincidunt purus rutrum vitae. Nulla suscipit elit fringilla augue placerat lacinia. Mauris luctus venenatis gravida. Aliquam eget felis sit amet neque pretium semper id eget lacus. Aliquam erat volutpat. Nam id rutrum elit. Donec ut ullamcorper elit. Nullam blandit, mauris sit amet porttitor molestie, velit augue semper massa, sit amet accumsan turpis diam at ante. Cras eleifend laoreet enim, sit amet congue ante aliquet vel.
          Praesent diam diam, hendrerit ut suscipit eleifend, sodales nec sem. Quisque id augue et enim egestas interdum. Vivamus feugiat libero ut massa rutrum vehicula quis eu ligula. Aliquam erat volutpat. Sed nec condimentum elit, at dignissim mauris. Praesent auctor nibh vel libero euismod fringilla. Donec in tortor congue, sollicitudin enim in, eleifend velit. Nulla quis facilisis lorem.
        </p>
      </div>
    </div>
  </div>
=======
    <div class="container-fluid stay_on_top">
		<div class="row">
			@include ('layouts.sidebar')
			<div class="col-sm-10 col-lg-10 innhold">
			  <!-- your page content --><p> Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc nec faucibus orci. Maecenas ut tempor massa, non faucibus felis. Vivamus facilisis lorem nec nisl rhoncus ultricies. Fusce in consequat nisl. Vivamus vel rhoncus diam. Aenean vitae arcu pharetra, dictum lectus ac, convallis lectus. Proin eget rutrum erat. Vestibulum suscipit convallis lacus, maximus efficitur mauris elementum vel. Donec pharetra augue eu diam porttitor ultricies.
			  Donec a tincidunt sem. Phasellus tempus ut purus id pharetra. Sed interdum metus mi, a commodo nunc dapibus vitae. Nullam ante lacus, sodales a tortor sed, rhoncus elementum nunc. Aliquam ultrices eu velit vitae porttitor. Sed lobortis felis dui, vitae viverra velit iaculis ac. Mauris non scelerisque orci. Pellentesque vitae lorem tortor. Mauris posuere tellus vel luctus ultricies. Nam vitae sodales nibh, sed consequat nulla.
			  Phasellus viverra congue libero sit amet faucibus. Mauris cursus neque et nisi blandit suscipit. Ut ut lacinia nulla. Cras ex nisi, gravida nec commodo non, varius eu dolor. Etiam sit amet nulla vel diam gravida sagittis. Phasellus nisl nunc, vehicula at mauris id, auctor interdum libero. Nulla facilisi. Vivamus pharetra lectus urna, non tincidunt lectus facilisis vitae. Fusce sed magna libero.
			  Donec eget eros sit amet purus vehicula ullamcorper. Quisque ac augue vitae nisl feugiat molestie eget fringilla dolor. Maecenas malesuada, eros nec vehicula viverra, sapien tellus suscipit ex, nec sagittis tellus odio vel sem. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Nunc at interdum dui. Sed non augue eget libero dapibus laoreet. Sed felis ante, pulvinar a egestas at, sodales id magna. Phasellus dignissim nibh urna, eget tincidunt purus rutrum vitae. Nulla suscipit elit fringilla augue placerat lacinia. Mauris luctus venenatis gravida. Aliquam eget felis sit amet neque pretium semper id eget lacus. Aliquam erat volutpat. Nam id rutrum elit. Donec ut ullamcorper elit. Nullam blandit, mauris sit amet porttitor molestie, velit augue semper massa, sit amet accumsan turpis diam at ante. Cras eleifend laoreet enim, sit amet congue ante aliquet vel.
			  Praesent diam diam, hendrerit ut suscipit eleifend, sodales nec sem. Quisque id augue et enim egestas interdum. Vivamus feugiat libero ut massa rutrum vehicula quis eu ligula. Aliquam erat volutpat. Sed nec condimentum elit, at dignissim mauris. Praesent auctor nibh vel libero euismod fringilla. Donec in tortor congue, sollicitudin enim in, eleifend velit. Nulla quis facilisis lorem.
			</p>
		</div>
    </div>
  </div>
@include ('layouts.footer')
>>>>>>> bdd4f14329373f0148fcafec131d3c807ca80c12
</body>
</html>