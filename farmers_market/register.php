<?php
	error_reporting(0);
	require("connection.php");
	$name = $mysqli -> real_escape_string($_POST['name']);
	$username = $mysqli -> real_escape_string($_POST['username']);
	$email = $mysqli -> real_escape_string($_POST['email']);
	$contact = $mysqli -> real_escape_string($_POST['contact']);
	$pass = $mysqli -> real_escape_string($_POST['pass']);
	$user_type = $mysqli -> real_escape_string($_POST['user_type']);
	if( strlen($name)==0 ||  strlen($email)==0 ||  strlen($username)==0 ||  strlen($pass)==0 || strlen($contact)==0 ||  strlen($user_type)==0 ){
		echo "Enter non-empty values";
	}
	else if(strlen($contact)!=10){
		echo "Enter valid 10 digit number";
	}
	else if ($mysqli -> connect_errno) {
	  echo "Error code L; Contact admin or support team or try after sometime...";
	  $mysqli->close();
	  exit();
	}
	else{
		$sql="SELECT username,email,contact FROM buyers WHERE username='".$username."'or email='".$name."' or contact='".$contact."'";
		$sql2="SELECT username,email,contact FROM sellers WHERE username='".$username."'or email='".$name."' or contact='".$contact."'";
		$result = $mysqli->query($sql);
		$result2 = $mysqli->query($sql2);
		if(($result && $result->num_rows > 0) || ($result2 && $result2->num_rows > 0)) {
			$dup_count=0;
			$row=$result->fetch_assoc();
			if($row["username"]==$username){
				echo "Username";
				$dup_count++;
			}
			if($row["email"]==$email){
				echo ($dup_count?", ":"")."Email";
				$dup_count++;
			}
			if($row["contact"]==$contact){
				echo ($dup_count?" and ":"")."Number";
				$dup_count++;
			}
			echo ($dup_count>1?" are ":" is")." already registered";
			die();
		}
		else{
			$sql="INSERT INTO ".$user_type."s(username,name,email,contact,password) VALUES('".$username."','".$name."','".$email."','".$contact."','".md5($pass)."')";
			$result = $mysqli->query($sql);
			if ($mysqli->query($sql)) {
			  // output data of each row
			  //while($row = $result->fetch_assoc()) {
			  	session_start();
			  	$_SESSION['username']=$username;
			  	$_SESSION['user_type']=$user_type;
			  	$sql="SELECT ".$user_type."_id FROM ".$user_type."s WHERE username='".$username."' and password='".md5($pass)."'";
				$result = $mysqli->query($sql);
				$row = $result->fetch_assoc();
				$_SESSION['id']=$row[$user_type."_id"];
			    echo "success";
			  //}
			} else {
				echo "Something went wrong. Error RR: Report admin is possible :)".$sql;
			}
		}
	}
	$mysqli->close();
?>