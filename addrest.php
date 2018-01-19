<?php
session_start();
include_once('/var/www/html/eaterate/project-lib.php');
include_once('/var/www/html/eaterate/header.php');
connect($db);

#author: Soumyatha Gavvala soumyatha.gavvala@colorado.edu
#name: Add rest
#purpose: Restaurant owner page for final project, allows to add restaurant details, view winners, view restaurants
#date: 2017/12/11
#version: 1

echo"
      <p class=\"navbar-text\">Restaurant Owner Page</p>
      <ul class=\"nav navbar-nav\">
		<li class=\"active\"><a href=\"addrest.php?i=1\">Home</a></li>
		<li><a href=showrest.php>View Restaurants</a></li>
	  </ul>

	<ul class=\"nav navbar-nav navbar-right\">
		<li><a href=logout.php><span class=\"glyphicon glyphicon-log-out\"></span> Logout</a></a></li>
    </ul>
  </div>
</nav>";


if(!isset($_SESSION["authenticated"])){
	insertip($db,$postUser,$action);
	echo"$numfails";
	attempt($db,$numfails);
	if ($numfails<5){
		authenticate($db, $postUser, $postPass);
	}
	else{
		session_destroy();
		echo "You have reached maximum number of login attempts. Please contact the Administrator.";
		exit;
	}
}


echo"
<center>
<h1>Hello Restaurant Owner!</h1>
<img src = \"picdark.jpg\">
<p> Please enter your restautant details to enter in the contest.</p>";

	if($i==1){
			echo"Add your Restaurant to the contest";
			echo"<form action=\"addrest.php?s=5&i=2\"method=post>
				Username:<input type=\"text\" name=\"Ruser\"><br>
				Restuarant name:<input type=\"text\" name=\"Rname\"><br>
				Restaurant location:<input type=\"text\" name=\"Rlocation\"><br>
				Restuarant cuisine:<input type=\"text\" name=\"Rcuisine\"><br>
                                Restaurant website:<input type=\"text\" name=\"Rurl\"><br>
				<button type=\"submit\"> Add me to contest! </button>
				</form>";
		}
	
		else if($i == 2){
			$Ruser = mysqli_real_escape_string($db, $Ruser);
			$Rname = mysqli_real_escape_string($db, $Rname);
      			$Rlocation = mysqli_real_escape_string($db, $Rlocation);
			$Rcuisine = mysqli_real_escape_string($db, $Rcuisine);
			$Rurl = mysqli_real_escape_string($db, $Rurl);
      			$query = "INSERT INTO restaurants (Ruser, Rname, Rlocation, Rcuisine, Rurl) VALUES(?, ?, ?, ?, ?)";
     			if($stmt = mysqli_prepare($db, $query)){
				mysqli_stmt_bind_param($stmt, "sssss", $Ruser, $Rname, $Rlocation, $Rcuisine, $Rurl);
				mysqli_stmt_execute($stmt); 
				mysqli_stmt_close($stmt);
			}
			echo "Your restaurant $Rname has been added!";
			}



echo"</center>";

?>
