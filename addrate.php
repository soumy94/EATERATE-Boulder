<?php
session_start();
include_once('/var/www/html/eaterate/project-lib.php');
include_once('/var/www/html/eaterate/header.php');
connect($db);

#author: Soumyatha Gavvala soumyatha.gavvala@colorado.edu
#name: IAdd rate
#purpose: Foodie page for final project, allows to add ratings, view winners, view restaurants
#date: 2017/12/11
#version: 1

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

sessionsec();


echo"
	<p class=\"navbar-text\">Foodie Page</p>
	<ul class=\"nav navbar-nav\">
      <li class=\"active\"><a href=\"#\">Home</a></li>
      <li><a href=showrest.php>View Restaurants</a></li>
      <li><a href=addrate.php?insert=1>Add Ratings</a></li>
      <li><a href=scoreboard.php>View the winners!</a></li>
	</ul>

	<ul class=\"nav navbar-nav navbar-right\">
		<li><a href=logout.php><span class=\"glyphicon glyphicon-log-out\"></span> Logout</a></a></li>
    </ul>
  </div>
</nav>";



if($insert==0){
	echo"
	<center>
	<h1>Hello Boulder Foodie!</h1>
	<img src = \"picdark.jpg\">
	<p> Rate your favourite Restaurant in Boulder!</p>";
	echo"<a href=\"addrate.php?insert=1\">Add my ratings!</a>";
} elseif($insert==1){

	echo "
			<center><h2>Add my rating</h2><hr>
			<form action=\"addrate.php?insert=2\" method=post>
			<table><tr><td><b> Username: </b></td><td>
			<input type=\"text\" placeholder=\"Enter Username\" name=\"rateuser\" required></td></tr>
			<tr><td><b> Select Restaurant: </b></td><td>
			<select name=\"resselect\">";

	$sql="SELECT Rid,Rname FROM restaurants order by Rname";
	$result = mysqli_query($db,$sql);
	while ($row = mysqli_fetch_array($result)){
		echo"<option value='".$row['Rid']."'>".$row['Rname']."</option>";
	}
	echo "</select>";




	echo "
					<tr><td><b> Select Rating: </b></td><td>
					<select name=\"rateselect\">;
				<option value=\"1\">1</option>;
			<option value=\"2\">2</option>;
			<option value=\"3\">3</option>;
			<option value=\"4\">4</option>;
			<option value=\"5\">5</option>;
			</select>";

	echo"		
			<tr><td colaspan=2><button type=\"submit\">Add rating</button></td></tr>
			</table></form></center>";

} elseif($insert==2){

	$rateuser=mysqli_real_escape_string($db, $rateuser);
    $resselect=mysqli_real_escape_string($db, $resselect);
	$rateselect=mysqli_real_escape_string($db, $rateselect);
	$dropquery = "INSERT INTO ratings(Ratingvalue, Rid, username) values(?, ?, ?)";
	if($stmt = mysqli_prepare($db, $dropquery)){
			mysqli_stmt_bind_param($stmt, "iis", $rateselect, $resselect, $rateuser);
			mysqli_stmt_execute($stmt);
			mysqli_stmt_close($stmt);
			echo"<center><b>Rating added</b><br>&nbsp&nbsp&nbsp&nbsp
			<a href=addrate.php?insert=1>Add more ratings</a>&nbsp&nbsp&nbsp&nbsp</center>";
		}
	else {
							echo"<center><b> Error:Unable to add rating</b></center>";
	}

?>

