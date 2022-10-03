<?php

session_start();
require "../conn.php";

if(isset($_POST['submit'])){
	$id = $_POST['id'];
	$full_name = $_POST['full_name'];
	$email = $_POST['email'];
	$contact = $_POST['contact'];
	$address = $_POST['address'];

	$query = "UPDATE data SET

	full_name = '$full_name',
	email = '$email',
	contact = '$contact',
	address = '$address'
	
	WHERE id=$id
	";

}
$res = mysqli_query($conn, $query);

if($res = true){
	$_SESSION['updated'] = "<div class='alert-success'> updated Successifuly</div>";
	header("Location:../result.php");

}else{
	$_SESSION['failed'] = "<div class='alert alert-danger'> Failed to update</div>";
	 header("Location:../result.php");
	}

