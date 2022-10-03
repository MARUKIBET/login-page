<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Edit page</title>
	<!--font --->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
	<link rel="stylesheet" href="vendors/bootstrap.main.css">
	<link rel="stylesheet" href="style.css">
</head>

<body>
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
	<div class="row tables">
		<div class="col-12">
			<div class="card">
				<div class="card-body">
					<div align="center">
						<h5 class="card-title">Use this form to edit table</h5>
					</div>
					<form action="includes/edit_inc.php" method="post">
						<?php

						require "conn.php";

						if(isset($_GET['id'])){
							$id = $_GET['id'];
						}

						$sql ="SELECT * FROM data WHERE id='$id'";

						//create a query that fetch data from the database
						$res = mysqli_query($conn,$sql);
						 if($res == TRUE) {
							 $count = mysqli_num_rows($res);
							 $sn=1;
							 if($count > 0) {
								 while ($rows=mysqli_fetch_assoc($res)) {
									 $id=$rows['id'];
									 $full_name =$rows['full_name'];
									 $email =$rows['email'];
									 $contact =$rows['contact'];
									 $address =$rows['address'];
							?>
						<div class="form-group">
							<div class="col-md-12">
								<div class="row rows">
									<div class="col-md-4">
										<label for="full_name" class="col-md-4"><b>Full name</b></label>
										<input type="text" name="full_name" class="form-control form-control-line" value="<?php echo $full_name; ?>" id="full_name">
									</div>

									<div class="col-md-4">
										<label for="email" class="col-md-4"><b>Email</b></label>
										<input type="text" name="email" class="form-control form-control-line" value="<?php echo $email; ?>" id="email">
									</div>

									<div class="col-md-4">
										<label for="contact" class="col-md-4"><b>Contact</b></label>
										<input type="number" name="contact" class="form-control form-control-line" value="<?php echo $contact; ?>" id="contact">
									</div>

									<div class="col-md-4">
										<label for="address" class="col-md-4"><b>Address</b></label>
										<input type="text" name="address" class="form-control form-control-line" value="<?php echo $address; ?>" id="address">
									</div>

								</div>
							</div>
						</div>
						<?php
								 }
							 }
						 }
						 ?>
						<div class="form-group">
							<div class="col-sm-12">
								<input type="hidden" name="id" value="<?php echo $id; ?>">
								<button class="btn btn-success btn-block" type="submit" name="submit">Update</button>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
	<footer class="footer">
		<p class="footer-items"> Copyright &#169; 2022 <span>Maru Kibet</span> .all right reserved</p>
	</footer>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
	<script src="vendors/jquery-3.6.0.min.js"></script>
	<script src="main.js"></script>
</body>

</html>
