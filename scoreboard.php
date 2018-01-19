<?php
session_start();
include_once('/var/www/html/eaterate/project-lib.php');
include_once('/var/www/html/eaterate/header.php');
connect($db);

#author: Soumyatha Gavvala soumyatha.gavvala@colorado.edu
#name: Scoreboard
#purpose: Shows the overall winners, winners by location and cuisine
#date: 2017/12/11
#version: 1

echo"
    <ul class=\"nav navbar-nav\">
		<li class=\"active\"><a href=\"#\">Winners</a></li>
		<li><a href=index.php>Home page</a></li>
	</ul>

	<ul class=\"nav navbar-nav navbar-right\">
         <li><a href=logout.php><span class=\"glyphicon glyphicon-log-out\"></span> Logout</a></a></li>
    </ul>
  </div>
</nav>
";


$sql = " select round(avg(R.Ratingvalue),2) as AVGR,A.Rname from ratings R, restaurants A where R.Rid=A.Rid group by R.Rid order by AVGR desc limit 10";
                $result = mysqli_query($db, $sql);
                 echo "<center> <h3>Overall Top 10 Restaurants!</h3>";
                 echo "<table>";
                while($row = mysqli_fetch_row($result)){
                        $row[0]=htmlspecialchars($row[0]);
                        $row[1]=htmlspecialchars($row[1]);	
                        echo "<tr><td>$row[0]</td><td>&emsp;$row[1]</td></tr>";
                }
		 echo "</table></center>";

		 echo"<hr>";


echo"<center> <h3>Winners by Location!</h3></center>
<div class=\"row\">";

echo"<div class=\"col-md-4\">";
$sql1= "select round(avg(R.Ratingvalue),2) as AVGR, A.Rname from ratings R, restaurants A where R.Rid=A.Rid and A.Rlocation = 'North Boulder' group by R.Rid order by AVGR desc limit 3";

$result1 = mysqli_query($db, $sql1);
                 echo "<center><h3>North Boulder</h3>";
                 echo "<table>";
                while($row = mysqli_fetch_row($result1)){
                        $row[0]=htmlspecialchars($row[0]);
                        $row[1]=htmlspecialchars($row[1]);
                        echo "<tr><td>$row[0]</td><td>&emsp;$row[1]</td></tr>";
                }
                 echo "</table></center></div>";

echo"<div class=\"col-md-4\">";
$sql1= "select round(avg(R.Ratingvalue),2) as AVGR, A.Rname from ratings R, restaurants A where R.Rid=A.Rid and A.Rlocation = 'Central Boulder' group by R.Rid order by AVGR desc limit 3";

$result1 = mysqli_query($db, $sql1);
                 echo "<center><h3>Central Boulder</h3>";
                 echo "<table>";
                while($row = mysqli_fetch_row($result1)){
                        $row[0]=htmlspecialchars($row[0]);
                        $row[1]=htmlspecialchars($row[1]);
                        echo "<tr><td>$row[0]</td><td>&emsp;$row[1]</td></tr>";
                }
                 echo "</table></center></div>";

echo"<div class=\"col-md-4\">";
$sql1= "select round(avg(R.Ratingvalue),2) as AVGR, A.Rname from ratings R, restaurants A where R.Rid=A.Rid and A.Rlocation = 'South Boulder' group by R.Rid order by AVGR desc limit 3";

$result1 = mysqli_query($db, $sql1);
                 echo "<center><h3>South Boulder</h3>";
                 echo "<table>";
                while($row = mysqli_fetch_row($result1)){
                        $row[0]=htmlspecialchars($row[0]);
                        $row[1]=htmlspecialchars($row[1]);
                        echo "<tr><td>$row[0]</td><td>&emsp;$row[1]</td></tr>";
                }
                 echo "</table></center></div>";
		 echo"</div><hr>";

echo"<center><h3>Winners by Cuisine!</h3></center>
<div class=\"row\">";
echo"<div class=\"col-md-4\">";
$sql1= "select round(avg(R.Ratingvalue),2) as AVGR, A.Rname from ratings R, restaurants A where R.Rid=A.Rid and A.Rcuisine = 'American' group by R.Rid order by AVGR desc limit 1";

$result1 = mysqli_query($db, $sql1);
                 echo "<h3>American</h3>";
                 echo "<table>";
                while($row = mysqli_fetch_row($result1)){
                        $row[0]=htmlspecialchars($row[0]);
                        $row[1]=htmlspecialchars($row[1]);
                        echo "<tr><td>$row[0]</td><td>&emsp;$row[1]</td></tr>";
                }
                 echo "</table></div>";

		 echo"<div class=\"col-md-4\">";
$sql1= "select round(avg(R.Ratingvalue),2) as AVGR, A.Rname from ratings R, restaurants A where R.Rid=A.Rid and A.Rcuisine = 'Asian' group by R.Rid order by AVGR desc limit 1";

$result1 = mysqli_query($db, $sql1);
                 echo "<h3>Asian</h3>";
                 echo "<table>";
                while($row = mysqli_fetch_row($result1)){
                        $row[0]=htmlspecialchars($row[0]);
                        $row[1]=htmlspecialchars($row[1]);
                        echo "<tr><td>$row[0]</td><td>&emsp;$row[1]</td></tr>";
                }
                 echo "</table></div>";
echo"<div class=\"col-md-4\">";

$sql1= "select round(avg(R.Ratingvalue),2) as AVGR, A.Rname from ratings R, restaurants A where R.Rid=A.Rid and A.Rcuisine = 'Coffee' group by R.Rid order by AVGR desc limit 1";

$result1 = mysqli_query($db, $sql1);
                 echo "<h3>Coffee</h3>";
                 echo "<table>";
                while($row = mysqli_fetch_row($result1)){
                        $row[0]=htmlspecialchars($row[0]);
                        $row[1]=htmlspecialchars($row[1]);
                        echo "<tr><td>$row[0]</td><td>&emsp;$row[1]</td></tr>";
                }
		 echo "</table></div></div>";

		 echo"<div class=\"row\"><div class=\"col-md-4\">";

$sql1= "select round(avg(R.Ratingvalue),2) as AVGR, A.Rname from ratings R, restaurants A where R.Rid=A.Rid and A.Rcuisine = 'Dessert' group by R.Rid order by AVGR desc limit 1";

$result1 = mysqli_query($db, $sql1);
echo 
	
	"<h3>Dessert</h3>";
                 echo "<table>";
                while($row = mysqli_fetch_row($result1)){
                        $row[0]=htmlspecialchars($row[0]);
                        $row[1]=htmlspecialchars($row[1]);
                        echo "<tr><td>$row[0]</td><td>&emsp;$row[1]</td></tr>";
                }
                 echo "</table></div>";
echo"<div class=\"col-md-4\">";


$sql1= "select round(avg(R.Ratingvalue),2) as AVGR, A.Rname from ratings R, restaurants A where R.Rid=A.Rid and A.Rcuisine = 'Indian' group by R.Rid order by AVGR desc limit 1";

$result1 = mysqli_query($db, $sql1);
                 echo "<h3>Indian</h3>";
                 echo "<table>";
                while($row = mysqli_fetch_row($result1)){
                        $row[0]=htmlspecialchars($row[0]);
                        $row[1]=htmlspecialchars($row[1]);
                        echo "<tr><td>$row[0]</td><td>&emsp;$row[1]</td></tr>";
                }
                 echo "</table></div>";
echo"<div class=\"col-md-4\">";

$sql1= "select round(avg(R.Ratingvalue),2) as AVGR, A.Rname from ratings R, restaurants A where R.Rid=A.Rid and A.Rcuisine = 'Italian' group by R.Rid order by AVGR desc limit 1";

$result1 = mysqli_query($db, $sql1);
                 echo "<h3>Italian</h3>";
                 echo "<table>";
                while($row = mysqli_fetch_row($result1)){
                        $row[0]=htmlspecialchars($row[0]);
                        $row[1]=htmlspecialchars($row[1]);
                        echo "<tr><td>$row[0]</td><td>&emsp;$row[1]</td></tr>";
                }
		 echo "</table></div></div>";

		echo" <div class=\"row\"><div class=\"col-md-4\">";
		 $sql1= "select round(avg(R.Ratingvalue),2) as AVGR, A.Rname from ratings R, restaurants A where R.Rid=A.Rid and A.Rcuisine = 'Mediterranean' group by R.Rid order by AVGR desc limit 1";

$result1 = mysqli_query($db, $sql1);
                 echo "<h3>Mediterranean</h3>";
                 echo "<table>";
                while($row = mysqli_fetch_row($result1)){
                        $row[0]=htmlspecialchars($row[0]);
                        $row[1]=htmlspecialchars($row[1]);
                        echo "<tr><td>$row[0]</td><td>&emsp;$row[1]</td></tr>";
                }
		 echo "</table></div>";

		 echo"<div class=\"col-md-4\">";
$sql1= "select round(avg(R.Ratingvalue),2) as AVGR, A.Rname from ratings R, restaurants A where R.Rid=A.Rid and A.Rcuisine = 'Mexican' group by R.Rid order by AVGR desc limit 1";

$result1 = mysqli_query($db, $sql1);
                 echo "<h3>Mexican</h3>";
                 echo "<table>";
                while($row = mysqli_fetch_row($result1)){
                        $row[0]=htmlspecialchars($row[0]);
                        $row[1]=htmlspecialchars($row[1]);
                        echo "<tr><td>$row[0]</td><td>&emsp;$row[1]</td></tr>";
                }
                 echo "</table></div></div>";


?>
