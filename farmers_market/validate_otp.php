<?php
	error_reporting(0);
	session_start();
	if($_POST["otp"]==$_SESSION['otp']){
		echo "success";
	}
	else{
		echo "Invalid OTP";
	}
?>