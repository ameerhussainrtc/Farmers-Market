<?php
	error_reporting(0);
	session_start();
	if($_SESSION['user_type']=="buyer"){
		header("Location:customer.php");
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
			width:200px;
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
		<p class="button" onclick="showSection(0)">Ordes</p>
		<p class="button" onclick="showSection(1)">Add items</p>
		<p class="button" onclick="showSection(2)">My profile</p>
		<a href="home.php"><p class="button">Beck to home</p></a>
		<a href="logout.php"><p class="button">Logout</p></a>
	</div>
	<p class="main">Welcome <?php echo $_SESSION['username']?></p>
	<div src="default.php" class="frame flex-container" name="a">
		<section id="orders" class="home-view">
			<div align="center">
				<p class="popupHeader" style="border-bottom-color: black;margin-bottom: 10px;">Orders for you</p>
				<p id="delStatus" style="display: none">
			</div>
			<div class="flex-container">
			<?php
				require("connection.php");
				$sql="SELECT * FROM orders WHERE seller_id=".$_SESSION['id']." AND is_placed=1";
				$result = $mysqli->query($sql);
				if ($result && $result->num_rows > 0) {
				  // output data of each row
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
					echo	"<p class='itemDesc'>Items placed :".$row['no_of_items']."</p>";
					$sql3="SELECT * FROM buyers WHERE buyer_id=".$row['buyer_id'];
				  	$result3=$mysqli->query($sql3);
				  	$row3=$result3->fetch_assoc();
				  	echo "<p>Address : ".$row3['house_building'].", ".$row3['landmark'].", ".$row3['mandal'].", ".$row3['dist'].", ".$row3['state'].", ".$row3['pincode']."</p>";
					echo "<input style='color:white;border-bottom-color:white' placeholder='Update status' id='ordstat".$row['order_id']."'/>
						  <button class='itemBuy' onclick='updateStatus(".$row['order_id'].")'>Update status</button>
						  <p id='upstat".$row['order_id']."'></p>
						</article>";
				  }
				} else {
				  echo "No Pending orders";
				}
			?>
			</div>
		</section>
		<section id="add-item" class="home-view">
			<?php
				$err=$_GET['e'];
				if($msg){
					echo "<p style='color: red' id='msg'>".$err."</p>
					<script>setTimeout(()=>{document.getElementById('msg').style.display='none'},5000)</script>";
				}
				$msg=$_GET['msg'];
				if($msg){
					echo "<p style='color: green' id='msg'>".$msg."</p>
					<script>setTimeout(()=>{document.getElementById('msg').style.display='none'},5000)</script>";
				}
			?>
			<form id="add-item" method="POST" name="add_item" style="width: 100%;"  action="add-item.php" enctype="multipart/form-data">
				<div align="center">
					<p class="popupHeader" style="border-bottom-color: black;margin-bottom: 10px;">Add item</p>
				</div>
				<span id="register-status" style="justify-content: center;display: none;"></span>
				<input type="text" placeholder="Product name" name="pro-name" required><br>
				<textarea name="pro-desc" placeholder="Product description" style="margin-top: 5px;padding:5px" required></textarea><br>
				<input type="number" name="price" placeholder="Price of each item" required><br>
				<input type="text" name="category" placeholder="Category" required><br>
				<input type="text" name="stock" placeholder="Available items" required><br>
				<span>Upload display image</span><input type="file" name="display_img" style="border:none;" required><br>
				<input required type="submit" name="submit" value="Add item">
			</form>
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
				  echo "Something error occured while accessing your profile".$mysqli->error;
				}
			?>
		</section>
	</div>
	<script type="text/javascript">
		function updateStatus(ordId){
			var update=document.getElementById("ordstat"+ordId).value;
			if(update==""){
				document.getElementById("upstat"+ordId).innerHTML="Enter something to update.";
				return false;	
			}
			document.getElementById("upstat"+ordId).innerHTML="Updating status";
			var xhttp = new XMLHttpRequest();
			xhttp.onreadystatechange = function() {
				if (this.readyState == 4 && this.status == 200) {
					document.getElementById("upstat"+ordId).innerHTML=this.responseText;
					document.getElementById("ordstat"+ordId).value="";
					setTimeout(()=>{
						document.getElementById("upstat"+ordId).innerHTML="";
					},5000);
				}
			};
			xhttp.open("POST", "update_order_status.php", true);
			xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
			xhttp.send(encodeURIComponent("oid")+"="+encodeURIComponent(ordId)+"&"+encodeURIComponent("update")+"="+encodeURIComponent(update));
		}
		var active=0;
		<?php
			$nav=$_GET['nav'];
			$index=array_search($nav,['orders', "add-item", 'profile']);
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