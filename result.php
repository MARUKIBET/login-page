<!DOCTYPE html>
<html lang="en">
<?php
	session_start();
?>

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>result page</title>
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
			</div>
		</nav>
	</header>
	<div class="tables table-responsive">
		<table class="table v-middle" id="table-group">
			<thead>
				<?php
				 if (isset($_SESSION['updated'])) {
					 echo $_SESSION['updated'];
					 unset ($_SESSION['updated']);
				 }
			   ?>
				<?php
				 if (isset($_SESSION['failed'])) {
					echo $_SESSION['failed'];
					unset ($_SESSION['failed']);
				 }
			   ?>
				<tr class="bg-light">
					<th>S.N</th>
					<th>Full Names</th>
					<th>Email</th>
					<th>Phone Number</th>
					<th>Address</th>
					<th class="col-span-4">Action</th>
				</tr>
			</thead>
			<?php
				require "conn.php";
				 $sql = "SELECT * FROM data";
				//creating query to collect data from database
				$res = mysqli_query($conn, $sql);
				if($res == TRUE) {
					$count = mysqli_num_rows($res);
					//checking if there is any record in database
					 $sn = 1;
					if($count > 0){
					while ($rows = mysqli_fetch_assoc($res)){
							$id=$rows['id'];
							$full_name = $rows['full_name'];
							$email = $rows['email'];
							$contact = $rows['contact'];
							$address = $rows['address'];
			   ?>

			<tbody>
				<tr>
					<td><?php echo $sn++; ?></td>
					<td><?php echo $full_name; ?></td>
					<td><?php echo $email; ?></td>
					<td><?php echo $contact; ?></td>
					<td><?php echo $address; ?></td>
					<td>
						<a href="edit.php?id=<?php echo $id; ?>" class="servi__btn btn btn-success">Edit</a>
					</td>
				</tr>
			</tbody>
			<?php
					  }
				   }

				 }
			  ?>
		</table>
	</div>
	<footer class="footer">
		<p class="footer-items"> Copyright &#169; 2022 <span>Maru Kibet</span> .all right reserved</p>
	</footer>

	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
	<script type="text/javascript">
		
		$(document).ready(function(){
		  refreshTable();
	  });
		function refreshTable(){
			$('#table-group').load('result.php', function(){
				setTimeout(refreshTable, 10000);
			});
		}

	</script>
		<script>
			/*
		$(document).ready(function() {
		  setInterval(function() {
			  $("#submit").load("result.php");
			  refresh();
		 }, 10000);
		});
		 */
	</script>
	<script src="vendors/jquery-3.6.0.min.js"></script>
	<script src="main.js"></script>
</body>

</html>
