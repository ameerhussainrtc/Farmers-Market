<?php
	error_reporting(0);
	session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<title>Farmer's market</title>
	<link rel="stylesheet" type="text/css" href="main.css"/>
	<meta charset="utf-8">
</head>
<body>
	<div>
		<section id="main">
			<header class="flex-container">
				<section class="flex-container">
					<img src="images/logo.png" alt="logo" height="60px" style="object-fit: contain;background-repeat: no-repeat;">
					<section>
						<p class="text-center" style="font-size: 20px;">Farmers Market</p>
						<em class="text-right" style="font-size:13px;">- Price yourself, Rise yourself</em>
					</section>
				</section>
				<div align="center" id="topDev">
					<div id="iconDiv" onclick="showMenu()" align="center" id="overFlowMenu">
						<img src="images/menu.svg" >
					</div>
				</div>
				<p class="child nav-link" onclick="showPopup(1)">Success stories</p>	
				<p class="child nav-link" onclick="showPopup(0)">About us</p>
				<?php
					if($_SESSION['username']){
						echo "<div class='flex-container'>
								<img id='profile-img' src='icons/defaultProfile.svg' style='width:50px'>
							  	<span>&nbsp;&nbsp;</span>
								  <div style='position:relative' class='profile'>
							  		<img src='icons/triangle-bottom-arrow.png' style='width:10px'>
							  		<div class='profile-options'>
							  			<p>".$_SESSION['username']."</p>";
							  			if($_SESSION['user_type']=="buyer"){
								  		 	echo "<a style='padding:5px;' href='customer.php?nav=orders'>Orders</a>
								  			<a style='padding:5px;' href='customer.php?nav=cart'>My cart</a>
								  			<a style='padding:5px;' href='customer.php?nav=profile'>My profile</a>";
							  			}
							  			else{
							  				echo "<a style='padding:5px;' href='farmer.php?nav=orders'>Orders</a>
							  				<a style='padding:5px;' href='farmer.php?nav=add-item'>Add item</a>
							  				<a style='padding:5px;' href='farmer.php?nav=profile'>My profile</a>";
							  			}
							  		echo   "<a style='padding:5px;' href='logout.php'>Logout</a>
							  		</div>
								  </div>
							  </div>";
					}
					else{
						echo "<section class='text-right child'>
							<a href='#' class='btn-link' onclick='showHideForms_popupNum(0,2)'>Log in</a>
							<a href='#' class='btn-link' onclick='showHideForms_popupNum(1,2)'>Sign up</a>
						</section>";
					}
				?>
			</header>
			<!--main content-->
			<section class="slider-flex" style="background-image: url('images/farm_land.jpeg');background-size: cover;background-repeat: no-repeat;">
					<img src="images/logo.png" class="slide" style="object-fit: none;">
					<img src="images/banner_1.png" class="slide">
					<img src="images/banner_2.jpeg" class="slide">
					<img src="images/banner_3.jpeg" class="slide">
					<img src="images/banner_4.jpeg" class="slide">
					<img src="images/banner_5.jpeg" class="slide">
					<img src="icons/line-angle-left.svg" class="nav-btn" id="nav-btn-left" onclick="slideLeft()">
					<img src="icons/line-angle-left.svg" class="nav-btn" id="nav-btn-right" onclick="slideRight()">
			</section>
			<section class="body-item"  style="background-color: rgb(82, 172, 255);overflow: auto;">
				<div align="center" class="flex-container">
					<img src="images/fruit1.png" style="width: 100px">
					<p class="popupHeader" align="center">Top selling items</p>
					<img src="images/fruit2.png" style="width: 100px">
				</div>
				<div class="flex-container" id="searchDiv">
					<img src="icons/search.svg" id="searchImg">
					<input type="text" name="search" id="searchInput" onkeyup="fetch(this.value)" autocomplete="off" placeholder="Search for Name or Category of the product Ex. Fruit">
				</div>
				<div class="flex-container" align="center" id="items">
				</div>
			</section>
			<footer class="flex-container">
				<ul type="none">
					<li>: : Contact us : :</li>
					<li>BH2</li>
					<li>Third floor</li>
					<li>RGUKT RK Valley</li>
					<li>No. <span style="cursor: pointer;font-family: initial;font-weight: 500;">9848022338</span></li>
				</ul>
				<p onclick="showPopup(0)" class="nav-link">About us</p>
				<p onclick="showPopup(1)" class="nav-link">Success stories of farmers</p>
				<p class="text-center">Copyright @farmersmarket</p>
			</footer>
		</section>
		<section class="popup-container">
			<article id="popup-body" style="width: 70vw;margin:5vh 15vw;background-color: rgb(82, 172, 255);">
				<img src="icons/close-svgrepo-com.svg" class="closePopup" onclick="hidePopup(0);" style="right: 15vw" />
				<div align="center">
					<p class="popupHeader" align="center">Our Team Members</p>
				</div>
				<div id="team">
					<div class="teammate">
						<img src="icons/defaultProfile.svg" class="profileImg">
						<p class="profileDetail">Name</p>
						<p class="profileDetail">ID</p>
					</div>
					<div class="teammate">
						<img src="icons/defaultProfile.svg" class="profileImg">
						<p class="profileDetail">Name</p>
						<p class="profileDetail">ID</p>
					</div>
					<div class="teammate">
						<img src="icons/defaultProfile.svg" class="profileImg">
						<p class="profileDetail">Name</p>
						<p class="profileDetail">ID</p>
					</div>
					<div class="teammate">
						<img src="icons/defaultProfile.svg" class="profileImg">
						<p class="profileDetail">Name</p>
						<p class="profileDetail">ID</p>
					</div>
					<div class="teammate">
						<img src="icons/defaultProfile.svg" class="profileImg">
						<p class="profileDetail">Name</p>
						<p class="profileDetail">ID</p>
					</div>
				</div>
			</article>
		</section>
		<section class="popup-container">
			<article id="popup-body" style="width: 70vw;margin:5vh 15vw;background-color: rgb(82, 172, 255);">
				<img src="icons/close-svgrepo-com.svg" class="closePopup" onclick="hidePopup(1);" style="right: 15vw" />
				<div align="center">
					<p class="popupHeader" align="center">Farmers success stories</p>
				</div>
				<div id="team">
					<div class="teammate">
						<img src="icons/defaultProfile.svg" class="profileImg">
						<p class="profileDetail">Ameer Kumar</p>
						<p class="profileDetail">This platform helped me to get a fair price for my </p>
					</div>
					<div class="teammate">
						<img src="icons/defaultProfile.svg" class="profileImg">
						<p class="profileDetail">Mohan Hussain</p>
						<p class="profileDetail">ID</p>
					</div>
					<div class="teammate">
						<img src="icons/defaultProfile.svg" class="profileImg">
						<p class="profileDetail">Ganesh Kumar</p>
						<p class="profileDetail">ID</p>
					</div>
					<div class="teammate">
						<img src="icons/defaultProfile.svg" class="profileImg">
						<p class="profileDetail">Naveen Kumar</p>
						<p class="profileDetail">This helped not only me but also my family and village people. Hope it will hit a high mark in near future</p>
					</div>
					<div class="teammate">
						<img src="icons/defaultProfile.svg" class="profileImg">
						<p class="profileDetail">Mohammadh</p>
						<p class="profileDetail">Prior I had running at losses this made a big change in my business and in my life too...</p>
					</div>
				</div>
			</article>
		</section>
		<section class="popup-container">
			<img src="icons/close-svgrepo-com.svg" class="closePopup" onclick="hidePopup(2);" style="right: 20vw;top: 10vh" />
			<article id="popup-body" class="flex-container" style="width: auto;margin: 5vw 20vw;height: 80%;flex-wrap: nowrap;overflow:hidden;">
				<img src="images/go_vegan.jpeg" style="background-color: black;width: 26vw" id="go_vegan" />
		 		<form id="login" method="POST" onsubmit="return false" name="login">
						<div align="center">
							<p class="popupHeader" style="border-bottom-color: black;margin-bottom: 10px;">Login</p>
							<!-- <span id="reset-status" style="color: red"></span> -->
						</div>
						<span id="reset-status" style="justify-content: center;display: none;"></span>
						<input required type="text" name="username" placeholder="Enter Username">
						<input required type="password" name="password" placeholder="Enter Password"><br>
						<div class="flex-container" style="justify-content: center;">
							<div class="flex-container" style="margin-right:5px;">
								<input required type="radio" name="user_type" value="buyer" />
								<label >Customer</label>
							</div>
							<div class="flex-container" style="margin-left:5px;">
								<label for="seller">Farmer</label>
								<input required type="radio" name="user_type" value="seller"/>
							</div>
						</div>
						<input type="submit" name="login" value="Login" onclick="check_login()"><br>
						<div class="flex-container" style="justify-content: center;padding: 30px;">
							<p onclick="showHideForms_popupNum(2,-1)" class="form-link">Forgot Password</p>
							<p onclick="showHideForms_popupNum(1,-1)" class="form-link">Sign up</p>
						</div>
				</form>
				<form id="signup" method="POST" name="signup" style="overflow: auto;max-height: 494px;width: 57%;" onsubmit="return false">
						<div align="center">
							<p class="popupHeader" style="border-bottom-color: black;margin-bottom: 10px;">Register</p>
						</div>
						<span id="register-status" style="justify-content: center;display: none;"></span>
						<input type="text" placeholder="Name" name="name" required><br>
						<input type="text" placeholder="Username" name="username" required><br>
						<input type="email" placeholder="Email address" name="email" required><br>
						<input type="text" placeholder="Contact no.(10 digits)" name="contact" required><br>
						<input type="password" name="pass" placeholder="Password" required><br>
						<input type="password" placeholder="Confirm Password" name="confirm-pass" required><br>
						<div class="flex-container" style="justify-content: center;">
							<div class="flex-container">
								<input required type="radio" name="user_type" value="buyer"/>
								<label >Customer</label>
							</div>
							<div class="flex-container">
								<label for="seller">Farmer</label>
								<input required type="radio" id="seller" name="user_type" value="seller"/>
							</div>
						</div>
						<input required type="submit" name="submit" value="signup" onclick="register()">
						<div class="flex-container" style="justify-content: center;padding: 30px;">
							<p class="form-link" onclick="showHideForms_popupNum(2,-1)">Forgot Password</p><br>
							<p class="form-link" onclick="showHideForms_popupNum(0,-1)">Login</p>
						</div>
					</form>
					<form id="reset-password" method="POST" onsubmit="return false" name="reset" style="overflow: auto;max-height: 494px;width: 60%;" onkeydown="return event.key != 'Enter';">
						<div align="center">
							<p class="popupHeader" style="border-bottom-color: black;margin-bottom: 10px;">Reset password</p>
						</div>
						<input required type="email" name="mail" placeholder="Enter registered mail ID">
						<div class="flex-container" style="justify-content: center;" id="reset-pass-user">
							<div class="flex-container" id="reset-user-type" style="margin-right:5px;">
								<input required type="radio" name="user_type" value="buyer" />
								<label >Customer</label>
							</div>
							<div class="flex-container" style="margin-right:5px;">
								<label for="seller">Farmer</label>
								<input required type="radio" name="user_type" value="seller"/>
							</div>
						</div>
						<span id="mail-status" style="justify-content: center;display: none;"></span>
						<input id="otp-div" style="display: none" required type="password" name="otp" placeholder="Enter OTP">
						<input id="pass-div" style="display: none" required type="password" name="pass" placeholder="Password">
						<input id="confirm-pass-div" style="display: none" required type="password" name="confirm-pass" placeholder="Confirm password">
						<div style="display: inline-flex;">
							<input id="otp-btn" type="submit" name="submit" value="Send OTP" onclick="send_mail()"><br>
							<input id="reset-btn" type="submit" name="submit" value="Validate otp" onclick="validate_otp()" style="display: none;"><br>
						</div>
					</form>
				</div>
			</article>
		</section>
	</div>
	<script type="text/javascript">
		function buyItem(iid,sid){
			var noItems=document.getElementById(iid).value;
			document.getElementById("s"+iid).innerHTML="Adding item to cart";
			document.getElementById("s"+iid).style.display="block";
			var xhttp = new XMLHttpRequest();
			xhttp.onreadystatechange = function() {
				if (this.readyState == 4 && this.status == 200) {
					document.getElementById("s"+iid).innerHTML=this.responseText;
				}
			};
			xhttp.open("POST", "add-to-cart.php", true);
			xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
			xhttp.send(encodeURIComponent("sid")+"="+encodeURIComponent(sid)+"&"+encodeURIComponent("pid")+"="+encodeURIComponent(iid)+"&"+encodeURIComponent("nop")+"="+encodeURIComponent(noItems));
		}
		function fetch(query){
			document.getElementById("items").innerHTML="Fetching items";
			if(query==null){
				query="all";
			}
			var xhttp = new XMLHttpRequest();
			xhttp.onreadystatechange = function() {
				if (this.readyState == 4 && this.status == 200) {
					document.getElementById("items").innerHTML=this.responseText;
				}
			};
			xhttp.open("POST", "fetch_result.php", true);
			xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
			xhttp.send(encodeURIComponent("query")+"="+encodeURIComponent(query));	
		}
		fetch();
		var images=document.getElementsByClassName('slide'),active=0,move=-window.innerWidth;
		//move for how much the items to be moved. images is Collection of items
		var n=images.length;//no. of images
		var slideInterval;
		document.body.onresize=()=>{
			clearInterval(slideInterval);
			active=n-1;
			slide();
			slideInterval=setInterval(slide,5000);
		}
		function slide(scrollTo)
		{
			if(active!=0){
				images[active].animate(//zoom out animation
					[
						{width:"calc(100vw - 10vh)",height:"70vh",margin:"5vh"}
					],
					{
						duration:500,
						easing:"cubic-bezier(0, 0, 0, 1)",
						fill:"forwards"
					}
				);
			}
			if(scrollTo==-1){
				active=(active-1+n)%n;
				if(active==n-1){
					move-=window.innerWidth*(n-2);//move to n-1 slide i.e move n-2 times
				}
				else{
					move+=window.innerWidth*2;
				}
			}
			else if(active==n-1)
			{//moving to initial when all items are over
				move=0;
				active=0;
			}
			else
			{
				active++;
			}
			for(var i=0;i<n;i++)
			{
				images[i].animate(//moving animation
					[
						{ transform:"translateX("+move+"px)"}
					],
					{
						duration:1000,
						easing:"cubic-bezier(0, 0, 0, 1)",
						fill:"forwards",
						delay:500
					}
				);
			}
			if(active!=0){
				images[active].animate(//zooming animation
						[
							{width:"100vw",height:"80vh",margin:0}
						],
						{
							duration:1000,
							easing:"cubic-bezier(0, 0, 0, 1)",
							fill:"forwards",
							delay:1500
						}
					);
			}
			move-=window.innerWidth;//for moving one item left
		}
		slideInterval=setInterval(slide,5000);
		function slideLeft(){
			clearInterval(slideInterval);
			slide(-1);
			slideInterval=setInterval(slide,5000);
		}
		function slideRight(){
			clearInterval(slideInterval);
			slide();
			slideInterval=setInterval(slide,5000);
		}
		function check_login(){
			var username=document.forms[0]["username"].value;
			var password=document.forms[0]["password"].value;
			var user_type=document.forms[0]["user_type"].value;
			if(username=="" || password=="" || user_type==""){
				document.getElementById("reset-status").innerHTML="Enter non-empty values";
				document.getElementById("reset-status").style.display="block";
				return false;
			}
			document.getElementById("reset-status").innerHTML="Checking credentials...";
			document.getElementById("reset-status").style.display="block";
			var xhttp = new XMLHttpRequest();
			xhttp.onreadystatechange = function() {
				if (this.readyState == 4 && this.status == 200) {
					if(this.responseText=="success"){
						if(user_type=="buyer"){
							location.assign("customer.php");
						}
						else{
							location.assign("farmer.php");
						}
					}
					else{
						document.getElementById("reset-status").innerHTML=this.responseText;
					}
				}
			};
			xhttp.open("POST", "check-login.php", true);
			xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
			xhttp.send(encodeURIComponent("username")+"="+encodeURIComponent(username)+"&"+encodeURIComponent("password")+"="+encodeURIComponent(password)+"&"+encodeURIComponent("user_type")+"="+encodeURIComponent(user_type));
		}
		function register()
		{
			var name = document.forms[1]['name'].value, email = document.forms[1]['email'].value, username = document.forms[1]['username'].value,contact=document.forms[1]["contact"].value, pass = document.forms[1]['pass'].value, confirm_pass = document.forms[1]['confirm-pass'].value, user_type = document.forms[1]['user_type'].value;
			if(name=="" || email=="" || username=="" || contact=="" || pass=="" || confirm_pass=="" || user_type=="" ){
				document.getElementById("register-status").innerHTML="Enter non-empty values";
				document.getElementById("register-status").style.display="block";
				return false;
			}
			else if(pass!=confirm_pass){
				document.getElementById("register-status").innerHTML="Passwords aren't same...";
				document.getElementById("register-status").style.display="block";
				return false;	
			}
			document.getElementById("register-status").innerHTML="Checking credentials...";
			document.getElementById("register-status").style.display="block";
			var xhttp = new XMLHttpRequest();
			xhttp.onreadystatechange = function() {
				if (this.readyState == 4 && this.status == 200) {
					if(this.responseText=="success"){
						if(user_type=="buyer"){

							location.assign("customer.php");
						}
						else{
							location.assign("farmer.php");
						}
					}
					else{
						document.getElementById("register-status").innerHTML=this.responseText;
					}
				}
			};
			xhttp.open("POST", "register.php", true);
			xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
			xhttp.send(encodeURIComponent("name")+"="+encodeURIComponent(name)+"&"+encodeURIComponent("email")+"="+encodeURIComponent(email)+"&"+encodeURIComponent("username")+"="+encodeURIComponent(username)+"&"+encodeURIComponent("contact")+"="+encodeURIComponent(contact)+"&"+encodeURIComponent("pass")+"="+encodeURIComponent(pass)+"&"+encodeURIComponent("user_type")+"="+encodeURIComponent(user_type));
		}
		function showPopup(popupNum)
		{
			document.getElementsByClassName("popup-container")[popupNum].animate(
				[{
					opacity:1,top:0
				}],
				{
					duration:500,
					fill:"forwards"
				}
			);
			
			document.getElementById('main').animate(
				[{
					filter:"blur(5px)"
				}],
				{
					duration:500,
					fill:"forwards"
				}
			)
			clearInterval(slideInterval);
			document.body.style.overflowY="hidden";
		}
		function hidePopup(popupNum)
		{
				document.getElementsByClassName("popup-container")[popupNum].animate(
					[{
						opacity:0,top:"-120vh"
					}],
					{
						duration:500,
						fill:"forwards"
					}
				);
				document.getElementById('main').animate(
					[{
						filter:"blur(0)"
					}],
					{
						duration:500,
						fill:"forwards"
					}
				);
				document.body.style.overflowY="auto";
				slideInterval=setInterval(slide,5000);
		}
		function showHideForms_popupNum(formNum,popupNum){
			var forms=document.forms
			for (var i = forms.length - 1; i >= 0; i--) {
				forms[i].style.display="none";
			}
			document.forms[formNum].style.display="block";
			if(popupNum!=-1){
				showPopup(popupNum);
			}
		}
		var visible=0;
		var headChild=document.getElementsByClassName("child");
		var x=window.matchMedia("(min-width:560px)");
		function showMenu()
		{
			for(var i=0;i<headChild.length;i++)
			{
				if(visible)
					headChild[i].style.display="none";
				else
					headChild[i].style.display="block";
			}
			visible=visible ^ 1;
		}
		function show_or_hide_menu(x)
		{
			if(x.matches)
			{
				for(var i=0;i<headChild.length;i++)
				{
					headChild[i].style.display="block";
				}
			}
		}
		x.addListener(show_or_hide_menu);
		function send_mail(){
			document.getElementById("otp-div").style.display="none";
			document.getElementById("mail-status").style.display="none";
			document.getElementById("otp-btn").value="Send OTP";
			document.getElementById("otp-btn").style.display="block";
			let email=document.forms[2]["mail"].value;
			let user_type=document.forms[2]["user_type"].value;
			if(email.length==0 || user_type.length==0){
				document.getElementById("mail-status").innerHTML="Enter valid email and user_type";
				return false;
			}
			document.getElementById("otp-btn").style.display="none";
			document.getElementById("mail-status").innerHTML="Sending mail...";
			document.getElementById("otp-div").value="";
			document.getElementById("mail-status").style.display="block";
			var xhttp = new XMLHttpRequest();
			xhttp.onreadystatechange = function() {
				if (this.readyState == 4 && this.status == 200) {
					if(this.responseText=="success"){
						document.getElementById("otp-btn").value="Resend OTP";
						document.getElementById("otp-btn").style.display="block";
						document.getElementById("mail-status").innerHTML="Mail sent. Enter OTP";
						document.getElementById("otp-div").style.display="inline";
						document.getElementById("reset-btn").style.display="block";
					}
					else{
						document.getElementById("mail-status").innerHTML=this.responseText;
						document.getElementById("otp-btn").style.display="block";
						document.getElementById("mail-status").style.display="block";
					}
				}
			};
			xhttp.open("POST", "send_email.php", true);
			xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
			xhttp.send(encodeURIComponent("email")+"="+encodeURIComponent(email)+"&"+encodeURIComponent("user_type")+"="+encodeURIComponent(user_type));
		}
		function validate_otp(){
			let otp=document.forms[2]["otp"].value;
			if(otp.length==0){
				document.getElementById("mail-status").innerHTML="Please enter OTP.";
				return false;
			}
			document.getElementById("mail-status").innerHTML="Validating otp...";
			var xhttp = new XMLHttpRequest();
			xhttp.onreadystatechange = function() {
			if (this.readyState == 4 && this.status == 200) {
				if(this.responseText=="success"){
					document.getElementById("mail-status").innerHTML="";
					document.getElementById("otp-btn").value="Reset password";
					document.getElementById("otp-btn").style.display="block";
					document.getElementById("otp-div").style.display="none";
					document.getElementById("reset-pass-user").style.display="none";
					document.getElementById("reset-btn").style.display="none";
					document.forms[2]["mail"].style.display="none";
					document.getElementById("pass-div").style.display="inline";
					document.getElementById("confirm-pass-div").style.display="inline";
					document.getElementById("otp-btn").onclick=reset_password;
					//document.getElementById("reset-btn").style.display="block";
				}
				else{
					document.getElementById("mail-status").innerHTML=this.responseText;
				}
			}
			};
			xhttp.open("POST", "validate_otp.php", true);
			xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
			xhttp.send(encodeURIComponent("otp")+'='+encodeURIComponent(otp));
		}
		function reset_password(){
			let pass=document.forms[2]['pass'].value;
			let cpass=document.forms[2]['confirm-pass'].value;
			if(pass != cpass){
				document.getElementById("mail-status").innerHTML="Passwords aren't equal.";
			}
			document.getElementById("mail-status").innerHTML="Updating password...";
			var xhttp = new XMLHttpRequest();
			xhttp.onreadystatechange = function() {
			if (this.readyState == 4 && this.status == 200) {
				console.log("wer")
				if(this.responseText=="success"){
					document.getElementById("reset-status").innerHTML="Password reset successful";
					document.getElementById("mail-status").innerHTML="Password reset successful";
					document.getElementById("reset-status").style.display="inline";
					showHideForms_popupNum(0,-1)
				}
				else{
					document.getElementById("mail-status").innerHTML="Something went wrong. Try with another password or after some time or try contacting us";
				}
			}
			};
			xhttp.open("POST", "reset_pass.php", true);
			xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
			xhttp.send(encodeURIComponent("pass")+'='+encodeURIComponent(pass));
		}
	</script>
</body>
</html>