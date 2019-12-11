<?php 
// mysqli_connect() function opens a new connection to the MySQL server.
require 'connection.php';
$conn = Connect();

session_start();

$id = $_GET["equipment_id"];

$query1 = "DELETE FROM renter_to_equipment WHERE equipment_id = '$id'";

$result1 = $conn->query($query1);

if ($result1){
     $query2 = "DELETE FROM equipment WHERE equipment_id = '$id'";

     $result2 = $conn->query($query2);

     if($result2){
     	header("Location: entereq.php"); // Redirecting
     }
     else{
     	echo $conn->error;
     }
}
else {
    echo $conn->error;
}


 ?>