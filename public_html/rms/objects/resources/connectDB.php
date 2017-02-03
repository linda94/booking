<?php
	$hostName = "";
	$userIs = "";
	$passWord = "";
	
	mysql_connect($hostName, $userIs, $passWord) or die(mysql_error());
	
	# select a database, report error if it fails
	mysql_select_db("") or die(mysql_error());
?>