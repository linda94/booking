<!DOCTYPE HTML>
<html lang="en">
<?php
		require_once('./objects/checks/checkSession.php');
		require_once('./objects/resources/pageHeader.php');
		echo('<body>' . $n0);
		
		echo(
				$n1 . '<div id="main">'
				$n2 . '<div>'
				$n3 . '<p>&nbsp;</p>'
				$n2 . '</div>'
				$n2 . '<div class="container">'
				$n3 . '<div class="row">'
				$n4 . '<div class="col-xs-3">'
				$n5 . '<form class="form" name="login" action="./objects/functions/fnVerifyLogin.php">'
				$n6 . '<div class="form-group">'
				$n7 . '<input type="text" class="form-controll" name=strUser" id="strUser" placeholder="User ID">'
				$n6 . '</div>'
				$n6 . '<div class="form-group">'
				$n7 . '<input type="password" class="form-control" name="strPwd" id="strPwd" placeholder="Password">'
				$n6 . '</div>'
				$n6 . '<div class="col-xs-4 pull-right">'
				$n7 . '<div class="form-group">'
				$n8 . '<button type="submit" class="btn btn-success" name="btnLogin">Log In</button>'
				$n7 . '</div>'
				$n6 . '</div>'
				$n5 . '</form>'
				$n4 . '</div>'
				$n3 . '</div>'
				$n2 . '</div>'
				$n1 . '</div>'
		);
		
		require_once('./objects/resources/pageFooter.php');
?>