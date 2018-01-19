<?php
include_once('/var/www/html/eaterate/header.php');

#author: Soumyatha Gavvala soumyatha.gavvala@colorado.edu
#name: Index
#purpose: Homepage for final project, redirects to register, login, view winners, view restaurants
#date: 2017/12/11
#version: 1

echo"
    <ul class=\"nav navbar-nav\">
    <li class=\"active\"><a href=\"#\">Home</a></li>
	<li><a href=showrest.php>View Restaurants</a></li>  
    <li><a href=scoreboard.php>View the winners!</a></li>
    </ul>

	<ul class=\"nav navbar-nav navbar-right\">
	<li><a href=register.php><span class=\"glyphicon glyphicon-user\"></span> Register</a></a></li>
	<li><a href=login.php><span class=\"glyphicon glyphicon-log-in\"></span> Login</a></a></li>
	</ul>
	</div>
</nav>


<center>
	<h1>Welcome to EATERATE Boulder</h1>
	<img src = \"picdark.jpg\">
	<p> A secured web application for rating your favourite restaurants in Boulder.</p>
	<p> Register as a restaurant owner to enter your restaurant in the contest. Register as a foodie to rate your favourite restaurant.</p>
</center>";

?>





