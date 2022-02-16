<?php
	require("connection.php");
	session_start();
	$house_building=$mysqli -> real_escape_string($_POST['house_building']);
	$landmark=$mysqli -> real_escape_string($_POST['landmark']);
	$mandal=$mysqli -> real_escape_string($_POST['mandal']);
	$dist=$mysqli -> real_escape_string($_POST['dist']);
	$state=$mysqli -> real_escape_string($_POST['state']);
	$pincode=$mysqli -> real_escape_string($_POST['pincode']);
	if( strlen($house_building)==0 ||  strlen($landmark)==0 ||  strlen($mandal)==0 ||  strlen($dist)==0 ||  strlen($state)==0 ||  strlen($pincode)==0){
		$_SESSION['msg']="Enter non-empty values";
		header("Location:customer.php?nav=cart");
	}
	else if(strlen($pincode)!=6){
		$_SESSION['msg']="Enter correct pin-code";
		header("Location:customer.php?nav=cart");
	}
	else{
		$sql="UPDATE buyers SET house_building='".$house_building."', landmark='".$landmark."', mandal='".$mandal."', dist='".$dist."', state='".$state."', pincode='".$pincode."' WHERE buyer_id='".$_SESSION['id']."'";
		if($mysqli->query($sql)){
			$sql="UPDATE orders SET is_placed=1 WHERE buyer_id='".$_SESSION['id']."' AND is_placed=0";
			if($mysqli->query($sql)){
				header("Location:customer.php?nav=orders");		
			}
			else{
				$_SESSION['msg']="Something went wrong with placing order";
				header("Location:customer.php?nav=cart");	
			}
		}
		else{
			$_SESSION['msg']="Something went wrong in adding address";
			header("Location:customer.php?nav=cart");
		}
	}
?>