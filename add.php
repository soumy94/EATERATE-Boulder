<?php
session_start();
include_once('/var/www/html/eaterate/project-lib.php');
include_once('/var/www/html/eaterate/header.php');
connect($db);

#author: Soumyatha Gavvala soumyatha.gavvala@colorado.edu
#name: Add
#purpose: Admin page, to check users list, login attempts list.
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

echo"
<style>
#users {
    font-family:\"Trebuchet MS\", Arial, Helvetica, sans-serif;
    border-collapse: collapse;
    width: 40%;
}

#users td, #customers th {
    border: 1px solid #ddd;
    padding: 8px;
}

#users tr:nth-child(even){background-color: #f2f2f2;}

#users tr:hover {background-color: #ddd;}

#users th {
    padding-top: 12px;
    padding-bottom: 12px;
    text-align: left;
    background-color: #4CAF50;
    color: white;
}
</style>

<style>
#logins {
    font-family:\"Trebuchet MS\", Arial, Helvetica, sans-serif;
    border-collapse: collapse;
    width: 40%;
}

#logins td, #customers th {
    border: 1px solid #ddd;
    padding: 8px;
}

#logins tr:nth-child(even){background-color: #f2f2f2;}

#logins tr:hover {background-color: #ddd;}

#logins th {
    padding-top: 12px;
    padding-bottom: 12px;
    text-align: left;
    background-color: #4CAF50;
    color: white;
}
</style>

";

sessionsec();

$admin=1;
icheck($s);
icheck($i);


echo"
        <p class=\"navbar-text\">Admin Page</p>
        <ul class=\"nav navbar-nav\">
      <li class=\"active\"><a href=\"#\">Home</a></li>
      <li><a href=add.php?s=15>View Users List</a></li>
      <li><a href=add.php?s=16>View Login attempts List</a></li>
	 <li><a href=showrest.php>View Restaurants</a></li>      
<li><a href=scoreboard.php>View the winners!</a></li></ul>
<ul class=\"nav navbar-nav navbar-right\">
<li><a href=logout.php><span class=\"glyphicon glyphicon-log-out\"></span> Logout</a></a></li>
    </ul>
  </div>
</nav>";

switch($s){
case 1:
echo"
<center>
<h1>Welcome to EATERATE Boulder</h1>
<h1>Admin Page</h1>
<img src = \"picdark.jpg\">
<p> A secured web application for rating your favourite restaurants in Boulder.</p>
<p> This page is accessible only by Admin, who can view users list and login attempts.</p>
</center>

</body>
</html>";
	break;

	case 15:
		if($_SESSION["userid"]==$admin){
		$query= "select username, usertype from users";
		$result = mysqli_query($db, $query);
		echo "<center> <h3> Users List </h3>";
		echo "<table id = \"users\">
		<tr><th>Username</th><th>User Type</th></tr>";
		while($row = mysqli_fetch_row($result)){
			$row[0]=htmlspecialchars($row[0]);
			$row[1]=htmlspecialchars($row[1]);
			echo "<tr><td>$row[0]</td><td>&emsp;$row[1]</td></tr>";
		}
		 echo "</table></center>";
	}else{
		echo "<b>Access Denied!!! Restricted User</b>";
		break;
	}

		break;

	case 16:
		 if($_SESSION["userid"]==$admin){
                $query= "select name, ip, instance, action from login";
                $result = mysqli_query($db, $query);
                 echo "<center> <h3> Login Attempts List </h3>";
		echo "<table id = \"logins\">
		 <tr><th>Username</th><th>IP Address</th><th>Time</th><th>Attempt</th></tr>";
                while($row = mysqli_fetch_row($result)){
                        $row[0]=htmlspecialchars($row[0]);
			$row[1]=htmlspecialchars($row[1]);
			$row[2]=htmlspecialchars($row[2]);
                        $row[3]=htmlspecialchars($row[3]);
                        echo "<tr><td>$row[0]</td><td>&emsp;$row[1]</td><td>&emsp;$row[2]</td><td>&emsp;$row[3]</td></tr>";
                }
                 echo "</table></center>";
        }else{
                echo "<b>Access Denied!!! Restricted User</b>";
                break;
        }
	break;

}



?>

