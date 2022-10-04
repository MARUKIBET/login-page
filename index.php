<!DOCTYPE html>
<html lang="en">
<?php

 session_start();
?>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>home page</title>
	<!--font --->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
	<link rel="stylesheet" href="vendors/bootstrap.main.css">
	<link rel="stylesheet" href="vendors/popper.min.js">
	<link rel="stylesheet" href="style.css">
</head>

<body class="body">
	<header class="1-header">
		<nav class="nav">
			<div class="links" id="nav-Menu">
				<ul id="navbar">
					<li class="nav_list"><a href="index.php">Home</a></li>
					<li class="nav_list"><a href="result.php">result</a></li>
				</ul>
			</div>
			<div class="hamburger-menu" id="Mbars">
				<i class="fa fa-bars" aria-hidden="true"></i>
				<!--onclick="myFunction()"-->
			</div>
		</nav>
	</header>

	<main>
		<form action="includes/index_inc.php" id="form-group" method="post"><!--onsubmit="func()"-->
			<?php
				 if (isset($_SESSION['added'])) {
					 echo $_SESSION['added'];
					 unset ($_SESSION['added']);
				 }
			   ?>
			<?php
				 if (isset($_SESSION['failed'])) {
					echo $_SESSION['failed'];
					unset ($_SESSION['failed']);
				 }
			   ?>
			<div class="input-group">
				<label for="full_name">Full name</label>
				<input type="text" name="full_name" id="full_name" placeholder="Please Enter Full name" value="<?php if(isset($_POST['full_name'])) echo $_POST['full_name']; ?>">
				<i class="fas fa-exclamation-circle"></i>
				<i class="fas fa-check-circle"></i>
				<p>Error message</p>
			</div>
			<div class="input-group">
				<label for="email">Email</label>
				<input type="email" name="email" id="email" placeholder="Please Enter your email" value="<?php if(isset($_POST['email'])) echo $_POST['email']; ?>">
				<i class="fas fa-exclamation-circle"></i>
				<i class="fas fa-check-circle"></i>
				<p>Error message</p>
			</div>
			<div class="input-group">
				<label for="contact">Contact</label>
				<input type="number" name="contact" id="contact" placeholder="Please Enter your phone number" value="<?php if(isset($_POST['contact'])) echo $_POST['contact']; ?>">
				<i class="fas fa-exclamation-circle"></i>
				<i class="fas fa-check-circle"></i>
				<p>Error message</p>
			</div>
			<div class="input-group">
				<label for="address">Address</label>
				<textarea name="address" id="address" cols="0" rows="2" placeholder="Enter Your Address please" value="<?php if(isset($_POST['address'])) echo $_POST['address']; ?>"></textarea>
				<i class="fas fa-exclamation-circle"></i>
				<i class="fas fa-check-circle"></i>
				<p>Error message</p>
			</div>
			<div align="right">
				<button type="submit" name="submit" class="btn btn-success" id="submit">Submit</button>
			</div>
		</form>
	</main>
	<footer class="footer">
		<p class="footer-items"> Copyright &#169; 2022 <span>Maru Kibet</span> .all right reserved</p>
	</footer>
	<script>
		//$(document).ready(function() {
		//   setInterval(function() {
		//       $("#sub").load("result.html");
		//      refresh();
		// }, 10000);
		// });

	</script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
	<script src="vendors/jquery-3.6.0.min.js"></script>
	<script src="main.js"></script>
</body>

</html>
