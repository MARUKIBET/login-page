<?php

session_start();
require "../conn.php";

if(isset($_POST['submit'])){
	$full_name = $_POST['full_name'];
	$email = $_POST['email'];
	$contact = $_POST['contact'];
	$address = $_POST['address'];

	$query = "INSERT INTO data SET
	full_name = '$full_name',
	email = '$email',
	contact = '$contact',
	address = '$address'
	";

}
$res = mysqli_query($conn, $query);

if($res = true){
	$_SESSION['added'] = "<div class='alert-success'> Added Successifuly</div>";
	header("Location:../index.php");

}else{
	$_SESSION['failed'] = "<div class='alert-danger'> Failed to Add</div>";
	 header("Location:../index.php");
	}

