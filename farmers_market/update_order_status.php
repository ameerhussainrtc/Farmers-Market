<?php
	require("connection.php");
	session_start();
	$oid = mysqli_real_escape_string($mysqli, $_POST["oid"]);
	$update = mysqli_real_escape_string($mysqli, $_POST["update"]);
	$sql = "UPDATE orders SET status='$update' where order_id='$oid'";
	if ($mysqli->query($sql)) {
	  // output data of each row
	  echo "Order updated";
	} else {
	  	echo "Some error occured. Report admin".$mysqli->error;
	}
?>