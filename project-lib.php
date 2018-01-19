<?php

#author: Soumyatha Gavvala soumyatha.gavvala@colorado.edu
#name: Project library
#purpose: Library for all the functions used in the project
#date: 2017/12/11
#version: 1

function icheck($vari){
        if(!is_numeric($vari)){
                if(!($vari==null))
                exit("<b> ERROR: </b>
		Invalid Syntax.");
        }
}


function connect(&$db){
        $mycnf="/etc/eaterate-mysql.conf";
        if (!file_exists($mycnf)) {
                echo "ERROR: DB Configfile not found: $mycnf";
                exit;
        }
	$mysql_ini_array=parse_ini_file($mycnf);
	$db_host=$mysql_ini_array["host"];
       	$db_user=$mysql_ini_array["user"];
        $db_pass=$mysql_ini_array["pass"];
        $db_port=$mysql_ini_array["port"];
        $db_name=$mysql_ini_array["dbName"];
        $db= mysqli_connect($db_host, $db_user, $db_pass, $db_name, $db_port);
        if (!$db) {
                print "Error connecting to DB: " . mysqli_connect_error();
                exit;
		}
}


function attempt(&$db,&$numfails){
	$action='fail';
	$userip=$_SERVER['REMOTE_ADDR'];
	$query="SELECT count(*) from login  where ip = ? and action = ? and instance >= DATE_SUB(NOW(),INTERVAL 1 HOUR)";
	if($stmt = mysqli_prepare($db, $query)){
        mysqli_stmt_bind_param($stmt, "ss", $userip,$action);
	mysqli_stmt_execute($stmt);
	mysqli_stmt_bind_result($stmt,$numfails);
	while(mysqli_stmt_fetch($stmt));
        mysqli_stmt_close($stmt);
	}
}


function insertip(&$db,$postUser,$action){
	$userip=$_SERVER['REMOTE_ADDR'];
	$query_prepare="INSERT INTO login (ip,action,instance,name) values(?,?,now(),?)";
	if($stmt = mysqli_prepare($db, $query_prepare)){
		mysqli_stmt_bind_param($stmt, "sss", $userip,$action,$postUser);
		mysqli_stmt_execute($stmt);
		mysqli_stmt_close($stmt);
	}
}


function logout(){
        session_destroy();
        header("Location: logout.php");
	exit;
}


function sessionsec(){
	if(isset($_SESSION["HTTP_USER_AGENT"])){
		if($_SESSION["HTTP_USER_AGENT"] != md5($_SERVER["SERVER_ADDR"].$_SERVER["HTTP_USER_AGENT"])){
			logout();
	    }
	}else
		logout();
  	if(isset($_SESSION["ip"])){
    		if($_SESSION["ip"] != $_SERVER["REMOTE_ADDR"]){
			logout();
		}
	}else
		logout();

  	if(isset($_SESSION["created"])){
    		if(time() - $_SESSION["created"] > 1800){logout();
		}
	}else
		logout();
	  if($_SERVER["REQUEST_METHOD"] == "POST"){
		  if(isset($_SERVER["HTTP_ORIGIN"])){
			  if($_SERVER["HTTP_ORIGIN"] != "https://100.66.1.4"){
				  logout();}
		  }else
			  logout();
	  }
}



function authenticate(&$db, $postUser, $postPass){
	$query_prepare = "SELECT userid, usertype, email, password, salt from users where username = ?";
	if($stmt = mysqli_prepare($db, $query_prepare)){
		mysqli_stmt_bind_param($stmt, "s", $postUser);
		mysqli_stmt_execute($stmt);
		mysqli_stmt_bind_result($stmt, $userid, $usertype, $email, $password, $salt);
		while(mysqli_stmt_fetch($stmt)){
			$userid = $userid;
			$usertype = $usertype;
			$email = $email;
			$password = $password;
			$salt = $salt;
		}
		mysqli_stmt_close($stmt);
		$enc = hash('sha256', $postPass.$salt);
		if($enc == $password){
			$_SESSION["userid"] =  $userid;
			$_SESSION["usertype"] = $usertype;
			$_SESSION["email"] = $email;
			$_SESSION["authenticated"] =  "yes";
			$_SESSION["ip"] =  $_SERVER["REMOTE_ADDR"];
			$_SESSION["HTTP_USER_AGENT"] = md5($_SERVER["SERVER_ADDR"].$_SERVER["HTTP_USER_AGENT"]);
	   		$_SESSION["created"] = time();
			$action='pass';
			if(($postPass != null) && ($postUser != null)){
				insertip($db,$postUser,$action);
			}
    		}	
		else{
			error_log("Error: EATERATE Boulder has a failed login from the address: ".$_SERVER["REMOTE_ADDR"],0);
			echo "Failed to login <a href=login.php>Login</a>";
			$action='fail';
	    		if(($postPass != null) && ($postUser != null)){
                		insertip($db,$postUser,$action);
        		}
		exit;
		}
	}
  }



isset($_REQUEST['s'])?$s=$_REQUEST['s']:$s="";
isset($_REQUEST['sid'])?$sid=$_REQUEST['sid']:$sid="";
isset($_REQUEST['bid'])?$bid=$_REQUEST['bid']:$bid="";
isset($_REQUEST['cid'])?$cid=$_REQUEST['cid']:$cid="";

isset($_REQUEST['i'])?$i=strip_tags($_REQUEST['i']):$i="";


isset($_REQUEST['Ruser'])?$Ruser=strip_tags($_REQUEST['Ruser']):$Ruser="";
isset($_REQUEST['Rname'])?$Rname=strip_tags($_REQUEST['Rname']):$Rname="";
isset($_REQUEST['Rlocation'])?$Rlocation=strip_tags($_REQUEST['Rlocation']):$Rlocation="";
isset($_REQUEST['Rcuisine'])?$Rcuisine=strip_tags($_REQUEST['Rcuisine']):$Rcuisine="";
isset($_REQUEST['Rurl'])?$Rurl=strip_tags($_REQUEST['Rurl']):$Rurl="";


isset($_REQUEST['rateselect'])?$rateselect=strip_tags($_REQUEST['rateselect']):$rateselect="";
isset($_REQUEST['resselect'])?$resselect=strip_tags($_REQUEST['resselect']):$resselect="";
isset($_REQUEST['rateuser'])?$rateuser=strip_tags($_REQUEST['rateuser']):$rateuser="";


isset($_REQUEST["postUser"])?($postUser = strip_tags($_REQUEST["postUser"])):$postUser = "";
isset($_REQUEST["postUsertype"])?($postUsertype = strip_tags($_REQUEST["postUsertype"])):$postUsertype = "";
isset($_REQUEST["postPass"])?($postPass = strip_tags($_REQUEST["postPass"])):$postPass = "";
isset($_REQUEST["postEmail"])?($postEmail = strip_tags($_REQUEST["postEmail"])):$postEmail = "";
isset($_REQUEST["postSalt"])?($postSalt = strip_tags($_REQUEST["postSalt"])):$postSalt ="";

isset($_REQUEST["insert"])?($insert = strip_tags($_REQUEST["insert"])):$insert = "";
isset($_REQUEST["numfails"])?($numfails = strip_tags($_REQUEST["numfails"])):$numfails = "";

?>
