<?php
session_start();
include_once('/var/www/html/eaterate/project-lib.php');
connect($db);

#author: Soumyatha Gavvala soumyatha.gavvala@colorado.edu
#name: Authentitype
#purpose: Authentication page based on user type for final project, redirects to the respective pages based on user type
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

$query = "SELECT usertype FROM users WHERE username=?";
if($stmt = mysqli_prepare($db, $query)){
		mysqli_stmt_bind_param($stmt, "s", $postUser);
		mysqli_stmt_execute($stmt);
		mysqli_stmt_bind_result($stmt, $usertype);
		while(mysqli_stmt_fetch($stmt)){
			$usertype = $usertype;
		}
		mysqli_stmt_close($stmt);

		if($usertype == "owner"){
			header("Location: addrest.php?i=1");
		} elseif($usertype == "normuser") {
			header("Location: addrate.php");
		} elseif($usertype == "admin") {
                        header("Location: add.php?s=1");
		} else {
			echo"Usertype unknown. Please go back to the previous page";
		}
}

?>
