<?php
session_start();
session_regenerate_id();
include_once('/var/www/html/eaterate/project-lib.php');
include_once('/var/www/html/eaterate/header.php');
connect($db);

#author: Soumyatha Gavvala soumyatha.gavvala@colorado.edu
#name: Login
#purpose: Login page for final project
#date: 2017/12/11
#version: 1

echo"
    <ul class=\"nav navbar-nav\">
    <li class=\"active\"><a href=\"\">Login</a></li>
    </ul>
	</div>	
	</nav>";

echo "  <center>
		<h4>Login</h4>
		<form action=\"authentitype.php?\" method=post>
		<table>
			<tr><td><b> Username: </b></td>
			<td><input type=\"text\" placeholder=\"Enter Username\" name=\"postUser\" required></td></tr>
			<tr><td><b> Password: </b></td>
			<td><input type=\"password\" placeholder=\"Enter Password\" name=\"postPass\" required></td></tr>
			<center><tr><td colspan=2><button type=\"submit\"> Login </button></td><tr></center>
		</table>
		</form></center>
		</html>";:
?>

