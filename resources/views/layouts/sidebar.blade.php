<div class="col-sm-2 col-lg-2 stay_on_top">
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
				  <button class="btn dropdown-toggle dd_knappen" href="#" data-toggle="dropdown" 
				  aria-haspopup="true" aria-expanded="false"> CoWorx <span class="caret"></span></button>
				  <ul class="dropdown-menu">
					<li class="dropdown-header dd_text_header"> Dine andre løsninger </li>
					<!-- Give items in this list class="dd_text_item" -->
					<li class="dd_text_item"><a href="#"> Google </a></li>
				  </ul>
				</div>
			  </li>
			  <li class="name_placeholder"><a href="/users/home" class="override_color">{{ Auth::user()->name }}</a></li>
			  <li><a class="active" href="/bookingV">Booking</a></li>
			  <li><a class="active" href="/users/home">Min profil</a></li>
			  <li><a href="/room_list" data-toggle="tooltip" data-placement="bottom" title="Trykk på en av rommene nedenfor for å vise rom-profilen"> Romliste </a>
			  <ul class="room_list" id="limit_elements">
				<!-- Give each room <span class="glyphicon glyphicon-calendar glyphicon_style calendar_glyp"> for calendar icon-->
			   <?php foreach ($rooms as $room) { ?>
					<li>
						<span class="glyphicon glyphicon-calendar glyphicon_style calendar_glyp"></span> 
						<a href="/rooms/{{ $room->id }}"> 
							<?php echo $room->name; ?>
						</a>
					</li>
        		<?php } ?>
				  <ul>
					<li class="new_item"> <a href="#" class="add_a_white"
					data-toggle="modal" data-target=".new_room" title="Legg til ett nytt rom i din løsning"> + Nytt rom </a> </li>
					<div class="modal new_room" tabindex="-1" role="dialog" data-backdrop="false" aria-labelledby="mySmallModalLabel2">
					  <div class="modal-dialog modal-sm" role="document">
						<div class="modal-content">
						  <div class="modal-content">
							  <div class="modal-header">
								<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
								<h4 class="modal-title" id="myModalLabel2">Vil du lage ett nytt rom?</h4>
							  </div>
							  <div class="modal-footer">
								<button type="button" class="btn btn-default" data-dismiss="modal">Avbryt</button>
								<button type="button" class="btn btn-default" onclick="location.href='{{action('SidebarController@create')}}'">OK</button>
							  </div>
							</div>
						</div>
					  </div>
					</div>
				  </ul>
			  </ul>
			</li>
			<li><a href="#" class="user_title" data-toggle="tooltip" data-placement="bottom" 
			title="Se en liste over alle brukere i systemet">Brukere </a>
			<ul class="user_list_in_location">
			  <ul>
				<li class="new_item" id="add_user"> <a href="#" class="add_a_white" data-toggle="tooltip" 
				data-placement="bottom" title="Inviter en ny bruker til din løsning"> + Ny bruker </a> </li>
			  </ul>
			</ul>
		  </li>
		  <li class="adm_knapp"><a href="#" data-toggle="tooltip" data-placement="bottom" 
		  title="Administrer din løsning">Administrative </a> </li>
		  <li> <a href="{{ route('logout') }}"> Logg ut </a> </li>
		  <li><a href="#" data-toggle="tooltip" data-placement="bottom" 
		  title="Bytt vising på booking til horisontal visning"> 
		  <span class="glyphicon glyphicon-th-list glyphicon_style"> </span> Bytt visning </a> </li>
		</ul>
		
		</div><!-- /.navbar-collapse -->
		</div><!-- /.container-fluid -->
	</nav>
</div>