<?php
session_start();
session_unset();
session_destroy();

include_once('/var/www/html/eaterate/header.php');

#author: Soumyatha Gavvala soumyatha.gavvala@colorado.edu
#name: Logout 
#purpose: Logout page for final project
#version: 1

echo"
        <ul class=\"nav navbar-nav\">
			<li class=\"active\"><a href=\"#\">Logout</a></li>      <li><a href=showrest.php>View Restaurants</a></li>
			<li><a href=scoreboard.php>View the winners!</a></li>
		</ul>
		
		<ul class=\"nav navbar-nav navbar-right\">
			<li><a href=login.php><span class=\"glyphicon glyphicon-log-in\"></span> Login</a></a></li>
			<li><a href=index.php>Home Page</a></li>
		</ul>
  </div>
</nav>";


echo "<center>You have been logged out. Thank you for participating!</center>";

?>
