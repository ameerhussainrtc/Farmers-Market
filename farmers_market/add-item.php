<?php
	require("connection.php");
	session_start();
	if(!$_SESSION['id'] || $_SESSION['user_type']!="seller"){
		echo "Something wrong";
		header("Location:home.php");
	}
	$image=$_FILES['display_img']['name'];
	$msg="";
	if(isset($_POST['submit']))
	{
		$pro_name=$mysqli -> real_escape_string($_POST['pro-name']);
		$pro_desc=$mysqli -> real_escape_string($_POST['pro-desc']);
		$category=$mysqli -> real_escape_string($_POST['category']);
		$stock=$mysqli -> real_escape_string($_POST['stock']);
		$price=$mysqli -> real_escape_string($_POST['price']);
		if($pro_name=="" || $pro_desc=="" || $category=="" || $stock=="" || $price=="")
		{
			$msg="Enter non-empty values";
		}
		else{
			$targetfile='product_images/'.$image;
			if($image!=null && !move_uploaded_file($_FILES['display_img']['tmp_name'],$targetfile))
			{
				$msg="Something went wrong while storing image... Try uploading another image with simple name or report admin if the problem persists";
			}
			else
			{
				$sql = "INSERT INTO products VALUES (NULL,'".$_SESSION['id']."','$pro_name','$pro_desc','$category',$price,0,$stock,'".($image==null?"cart-item.svg":$image)."',0,0,true)";
				if ($mysqli->query($sql))
				{
					$msg="Item inserted successfully";
				}
				else{
					$msg="Something went wrong in adding item... Report to admin to solve the issue if possible.";
				}
			}
		}
		$mysqli->close();
	}
	header("Location:farmer.php?nav=add-item&msg=".$msg);
?>