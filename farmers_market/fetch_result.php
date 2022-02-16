<?php
	require("connection.php");
	error_reporting(0);
	$query = mysqli_real_escape_string($mysqli, $_POST["query"]);
	$msg="";
	if($query!="all"){
		$sql = "SELECT * FROM products WHERE category LIKE '%".$query."%' OR name LIKE '%".$query."%'";
		$msg="No procuts are related to search...";
	}
	else{
		$sql = "SELECT * FROM products ORDER BY 'items_sold'";
		$msg="No procuts for now / site is being under construction. Visit after sometime if possible.";
	}
	$result = $mysqli->query($sql);
	if ($result && $result->num_rows > 0) {
	  // output data of each row
	  session_start();
	  while($row = $result->fetch_assoc())
	  {
		echo "<article class='item'>
				<img class='itemImg' src='product_images/".$row['image_name']."'><br>
				<p class='itemName'>".$row['name']."</p>
				<p class='itemPrice'>Rs.".$row['price']."/-</p>";
		if($row['no_of_ratings']==0){
			echo "<p class='itemPrice'>".$row['items_sold']." sold. with not ratings yet.</p>";
		}
		else{
			echo "<p class='itemPrice'>".$row['items_sold']." sold. with rating ".round($row['rating']/$row['no_of_ratings'],1)." by ".$row['no_of_ratings']." ratings</p>";
		}
		echo	"<p class='itemDesc'>".$row['description']."</p>";
		if($_SESSION['user_type']=="buyer"){
			echo "<input type='number' placeholder='No of items' style='color:white;' id=".$row['item_id']." value='1'>
				<button class='itemBuy' onclick='buyItem(".$row['item_id'].",".$row['seller_id'].")'>Add to cart</button>
				<p style='display:none' id='s".$row['item_id']."'>Test</p>";
		}
		else{
			echo "<button class='itemBuy' style='margin-bottom: 10px;height:auto;width:auto;cursor:auto;'>Login as Buyer to buy</button>";
		}
		echo	"</article>";
	  }
	} else {
	  	echo "<p style='margin:30px'>".$msg."</p>";
	}
?>