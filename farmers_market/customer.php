<?php
	error_reporting(0);
	session_start();
	if(!$_SESSION['username']){
		header("Location:home.php");
	}
	if($_SESSION['user_type']=="seller"){
		header("Location:farmer.php");
	}
?>
<!DOCTYPE html>
<head>
	<title><?php echo $_SESSION['username']?> page</title>
	<link rel="stylesheet" type="text/css" href="main.css"/>
	<style type="text/css">
		*
		{
			margin:0;
			box-sizing: border-box;
		}
		body
		{		}
		.menu
		{
			margin:11px;
		}
		#menu-icon1
		{
			width:27px;
			height:27px;
		}
		#menu-icon2
		{
			width:27px;
			height:27px;
			visibility: hidden;
		}
		.menu
		{
			position: fixed;
		}
		.side-menu
		{
			position: fixed;
			top:0;
			background-color: skyblue;
			visibility: hidden;
			width:220px;
			height:100%;
			box-shadow:0 0 10px 10px rgba(0,0,0,0.2);
			padding-top:100px;
			z-index: 2;
			overflow: auto;
		}
		.menu-icon
		{
			margin:20px;
			width:50px;
			height:50px;
			border-radius:50%;
			background-color: white;
			box-shadow:0 0 10px 10px rgba(0,0,0,0.2);
			z-index: 3;
			position: fixed;
		}
		.button
		{
			padding:10px;
			background-color: rgba(255,255,255,0.5);
			border-radius:20px;
			width:140px;
			margin:30px;
			line-height: 20px;
			cursor: pointer;
		}
		a
		{
			text-decoration: none;	
			color: black;
		}
		.button:hover
		{
			background-color: rgb(236, 119, 119);
			color:white;
		}
		.frame
		{
			border:0;
			width:100%;
			height: 90%;
			top:74px;
			z-index: -2;
		}
		.main
		{
			position: fixed;
			top: 0;
			font-size:20px;
			position:fixed;
			width:100%;
			text-align:center;
			color:white;
			background-color:#353535;
			padding:25px;
			z-index:2;
		}
		.home-view{
			display: none;
			margin-top:100px;
		}
	</style>
</head>
<body>
		<div class="menu-icon">
			<img src="icons/menu-before.jpg" id="menu-icon1" class="menu"/>
			<img src="icons/menu-after.png" id="menu-icon2" class="menu"/>
		</div>
	<div class="side-menu" id="side-menu" align="center">
		<p class="button" onclick="showSection(0)">My orders</p>
		<p class="button" onclick="showSection(1)">My cart</p>
		<p class="button" onclick="showSection(2)">My profile</p>
		<a class="button" href="home.php">Back to home</a>
		<a href="logout.php"><p class="button">Logout</p></a>
	</div>
	<p class="main">Welcome <?php echo $_SESSION['username']?></p>
	<div src="default.php" class="frame flex-container" name="a">
		<section id="orders" class="home-view">
			<div align="center">
					<p class="popupHeader" style="border-bottom-color: black;margin-bottom: 10px;">My orders</p>
					<?php
						if($_SESSION['msg']=="yes"){
							echo "<p id='order-status'>Order placed successfully</p>";
						}
						else if($_SESSION['msg']=="no"){
							echo "<p id='order-status'>Something went wrong with placing order. Cotact support if possible</p>";
						}
						$_SESSION['msg']="";
					?>
			</div>
			<script type="text/javascript">
				setTimeout(()=>{document.getElementById('order-status').style.display="none"},5000);
			</script>
			<div class='flex-container'>
			<?php
				require("connection.php");
				$sql="SELECT * FROM orders WHERE buyer_id=".$_SESSION['id']." AND is_placed=1";
				$result = $mysqli->query($sql);
				if ($result && $result->num_rows > 0) {
				  // output data of each row
				$cost=0;
				  while($row = $result->fetch_assoc()) {
				  	$sql2="SELECT * FROM products WHERE item_id=".$row['product_id'];
				  	$result2=$mysqli->query($sql2);
				  	$row2=$result2->fetch_assoc();
				  	echo "<article class='item'>
							<img class='itemImg' src='product_images/".$row2['image_name']."'><br>
							<p class='itemName'>".$row2['name']."</p>
							<p class='itemPrice'>".$row2['price']."</p>";
					if($row2['no_of_ratings']==0){
						echo "<p class='itemPrice'>".$row2['items_sold']." sold. with not ratings yet.</p>";
					}
					else{
						echo "<p class='itemPrice'>".$row['items_sold']." sold. with rating ".round($row2['rating']/$row2['no_of_ratings'],1)." by ".$row2['no_of_ratings']." ratings</p>";
					}
					echo	"<p class='itemDesc'>".$row2['description']."</p>
							 <p class='itemDesc'>Status : ".$row['status']."</p>
						</article>";
					$cost+=$row['no_of_items']*$row2['price'];
				  }
				} else {
				  echo "No orders in the cart add some if possible and needed...:)";
				}
				echo "</div>";
			?>
		</section>
		<section id="cart" class="home-view">
			<div align="center">
				<p class="popupHeader" style="border-bottom-color: black;margin-bottom: 10px;">My cart</p>
				<?php
					if($_SESSION['msg']){
						echo $_SESSION['msg'];
						$_SESSION['msg']='';
					}
				?>
				<p id="delStatus" style="display: none">
			</div>
			<div class="flex-container">
			<?php
				require("connection.php");
				if($_SESSION['msg']){
					alert($_SESSION['msg']);
					echo $_SESSION['msg'];
					$_SESSION['msg']='';
				}
				$sql="SELECT * FROM orders WHERE buyer_id=".$_SESSION['id']." AND is_placed=0";
				$result = $mysqli->query($sql);
				if ($result && $result->num_rows > 0) {
				  // output data of each row
				$cost=0;
				  while($row = $result->fetch_assoc()) {
				  	$sql2="SELECT * FROM products WHERE item_id=".$row['product_id'];
				  	$result2=$mysqli->query($sql2);
				  	$row2=$result2->fetch_assoc();
				  	echo "<article class='item'>
							<img class='itemImg' src='product_images/".$row2['image_name']."'><br>
							<p class='itemName'>".$row2['name']."</p>
							<p class='itemPrice'>".$row2['price']."</p>";
					if($row2['no_of_ratings']==0){
						echo "<p class='itemPrice'>".$row2['items_sold']." sold. with not ratings yet.</p>";
					}
					else{
						echo "<p class='itemPrice'>".$row['items_sold']." sold. with rating ".round($row2['rating']/$row2['no_of_ratings'],1)." by ".$row2['no_of_ratings']." ratings</p>";
					}
					echo	"<p class='itemDesc'>".$row2['description']."</p>
						</article>";
					$cost+=$row['no_of_items']*$row2['price'];
				  }
					echo "</div>
						  <div align='center'>
						  	  <p>Total cost is".$cost."</p><br>";
					echo '<form method="post" action="checkout.php">
						<input required type="text" name="house_building" placeholder="House/Building/Street"><br>
						<input required type="text" name="landmark" placeholder="Village/ Area"><br>
						<input required type="text" name="mandal" placeholder="Mandal or Town"><br>
						<input required type="text" name="dist" placeholder="District"><br>
						<input required type="text" name="state" placeholder="State"><br>
						<input required type="text" name="pincode" placeholder="Pincode"><br><br>
						<input type="submit" class="itemBuy" value="Check out and Place order"/><br><br><br><br>';
				} else {
				  echo "No orders in the cart add some if possible and needed...:)</div>";
				}
			?>
		</section>
		<section id="profile" class="home-view">
			<div align="center">
				<p class="popupHeader" style="border-bottom-color: black;margin-bottom: 10px;">My profile</p>
				<p id="delStatus" style="display: none">
			</div>
			<?php
				$sql="SELECT * FROM ".$_SESSION['user_type']."s WHERE ".$_SESSION['user_type']."_id=".$_SESSION['id'];
				$result = $mysqli->query($sql);
				if ($result && $result->num_rows > 0) {
				  // output data of each row
				  $row = $result->fetch_assoc();
				  foreach($row as $field => $value){
				  	if($field=="password"){
				  		continue;
				  	}
				  	if($value){
				  		echo "<p>".$field." : ".$value."</p>";
				  	}
				  }
				} else {
				  echo "Something error occured while accessing your profile";
				}
			?>
		</section>
	</div>
	<script type="text/javascript">
		var active=0;
		<?php
			$nav=$_GET['nav'];
			$index=array_search($nav,['orders', 'cart', 'profile']);
			if($index==null){
				echo "document.getElementById('orders').style.display='block';active=0;";
			}
			else{
				echo "document.getElementById('".$nav."').style.display='block';active=".$index.";";
			}
		?>
		var images=document.getElementsByClassName('slide')
		document.getElementById("menu-icon1").addEventListener("click",function(){
			document.getElementById("menu-icon1").style.visibility="hidden";
			document.getElementById("menu-icon2").style.visibility="visible";
			document.getElementById("side-menu").style.visibility="visible";
		});
		document.getElementById("menu-icon2").addEventListener("click",function(){
			document.getElementById("menu-icon2").style.visibility="hidden";
			document.getElementById("menu-icon1").style.visibility="visible";
			document.getElementById("side-menu").style.visibility="hidden";
		});
		function showSection(secNum){
			document.getElementsByClassName("home-view")[active].style.display="none";
			document.getElementsByClassName("home-view")[secNum].style.display="block";
			active=secNum;
		}
	</script>
	</div>
</body>