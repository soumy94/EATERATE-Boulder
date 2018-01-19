<?php
session_start();
include_once('/var/www/html/eaterate/project-lib.php');
include_once('/var/www/html/eaterate/header.php');
connect($db);

#author: Soumyatha Gavvala soumyatha.gavvala@colorado.edu
#name: Register
#purpose: Displays a register form and enters details to database
#date: 2017/12/11
#version: 1

echo"
    <ul class=\"nav navbar-nav\">
    <li class=\"active\"><a href=\"\">Register</a></li>
	<li><a href=index.php>Home Page</a></li>
    </ul>
	</div>
</nav>";


if($insert==1){

	echo"<center> <h1> EATERATE Boulder</h1>
		 <img src = \"picdark.jpg\">
		 </center>";
		 
	        	$salt=rand();
        		$postPass=hash('sha256',$postPass.$salt);
		        $postPass=mysqli_real_escape_string($db, $postPass);
        		$postUser=mysqli_real_escape_string($db, $postUser);
	        	$postUsertype=mysqli_real_escape_string($db, $postUsertype);
     		   	$salt=mysqli_real_escape_string($db, $salt);
	      		$postEmail=mysqli_real_escape_string($db, $postEmail);
	        	$query="INSERT INTO users(username,usertype,password,salt,email) values(?, ?, ?, ?, ?)";
				if($stmt = mysqli_prepare($db, $query)){
                		mysqli_stmt_bind_param($stmt, "sssss", $postUser, $postUsertype, $postPass, $salt, $postEmail);
                		mysqli_stmt_execute($stmt);
                		mysqli_stmt_close($stmt);
                		echo"<center><h2><b>Successfully Registered:</b></h2>".htmlspecialchars( $postUser);
                		echo "</center><br>";
       			} else {
                		echo"<center><b> Error:Unable to Register </b></center>";
       			}
} else {
		echo"<center> <h1>EATERATE Boulder</h1>
		<img src = \"picdark.jpg\">
		</center>";
		echo "
		<center><h2>Create account</h2><hr>
		<form action=\"register.php?insert=1\" method=post>
		<table><tr><td><b> Username: </b></td><td>
		<input type=\"text\" placeholder=\"Enter Username\" name=\"postUser\" required></td></tr>
		<tr><td><b> Usertype: </b></td><td>
		Restaurant Owner <input type=\"radio\" name=\"postUsertype\" value=\"owner\">
		Foodie! <input type=\"radio\" name=\"postUsertype\" value=\"normuser\"><br>
		<tr><td><b> Email Address: </b></td><td>
		<input type = \"text\" placeholder=\"Enter Email Address\" name = \"postEmail\" required> </td></tr>
		<tr><td><b> Password: </b></td><td>
		<input type=\"password\" placeholder=\"Enter Password\" name=\"postPass\" required></td></tr>
		<center><tr><td colaspan=2><button type=\"submit\">Register</button></td></tr></center>
		</table></form></center>";
}
echo"</body></html>";

?>
