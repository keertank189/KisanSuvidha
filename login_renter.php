<?php
session_start(); // Starting Session
$error=''; // Variable To Store Error Message

if (isset($_POST['submit'])) {
if (empty($_POST['renter_username']) || empty($_POST['renter_password'])) {
$error = "Username or Password is invalid";
}
else
{
// Define $username and $password
$renter_username=$_POST['renter_username'];
$renter_password=$_POST['renter_password'];
// Establishing Connection with Server by passing server_name, user_id and password as a parameter
require 'connection.php';
$conn = Connect();

// SQL query to fetch information of registerd users and finds user match.
$query = "SELECT renter_username, renter_password, renter_address FROM renters WHERE renter_username=? AND renter_password=? LIMIT 1";

// To protect MySQL injection for Security purpose
$stmt = $conn->prepare($query);
$stmt -> bind_param("ss", $renter_username, $renter_password);
$stmt -> execute();
$stmt -> bind_result($renter_username, $renter_password,$renter_address);
$stmt -> store_result();

if ($stmt->fetch())  //fetching the contents of the row
{
	$_SESSION['login_renter']=$renter_username;
	$_SESSION['renter_address']=$renter_address;
	//echo $_SESSION['renter_address'];
	 // Initializing Session
	header("location: indexrenter.php"); // Redirecting To Other Page
} 
else 
{
	$error = "Username or Password is invalid";
}
mysqli_close($conn); // Closing Connection
}
}
?>