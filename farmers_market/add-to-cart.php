<?php
	require("connection.php");
	session_start();
	$pid = mysqli_real_escape_string($mysqli, $_POST["pid"]);
	$sid = mysqli_real_escape_string($mysqli, $_POST["sid"]);
	$nop = mysqli_real_escape_string($mysqli, $_POST["nop"]);
	$sql = "INSERT INTO orders VALUES(NULL,'$sid','$pid','".$_SESSION['id']."','$nop','Yet to respond',false)";
	if ($mysqli->query($sql)) {
	  // output data of each row
	  echo "Order placed";
	} else {
	  	echo "Some error occured. Report admin";
	}
?>