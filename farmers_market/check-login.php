<?php
	require("connection.php");
	$username = $mysqli -> real_escape_string($_POST['username']);
	$password = $mysqli -> real_escape_string($_POST['password']);
	$user_type= $mysqli -> real_escape_string($_POST['user_type']);
	if(!$username && !$password){
		echo "Enter non-empty fields.";
	}	
	else if ($mysqli -> connect_errno) {
	  echo "Error code L; Contact admin or support team or try after sometime...";
	  exit();
	}
	else{
		$sql="SELECT ".$user_type."_id FROM ".$user_type."s WHERE username='".$username."' and password='".md5($password)."'";
		$result = $mysqli->query($sql);
		if ($result->num_rows > 0) {
		  // output data of each row
		  //while($row = $result->fetch_assoc()) {
		  	$row = $result->fetch_assoc();
		  	session_start();
		  	$_SESSION['username']=$username;
		  	$_SESSION['user_type']=$user_type;
		  	$_SESSION['id']=$row[$user_type."_id"];
		  	$mysqli->close();
		    echo "success";
		  //}
		} else {
		  echo "Wrong username or password.";
		}
	}
?>