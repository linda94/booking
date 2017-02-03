<html>
	<head>
		<title>Test Site</title>
	</head>

	<body>
		<?php
		########################################################################################
		ini_set('session.use_cookies',0); #set global do not use cookies for session
		session_start();
		
		########################################################################################
		# If user is not logged in, set value of thisUser to empty string (not NULL)
		if (!isset($_SESSION['thisUser'])){
			$SESSION['thisUser'] = ""; # Not logged in
		}
		
		########################################################################################
		$_SESSION['caltype']="eu";

		?>

	</body>
	
</html>