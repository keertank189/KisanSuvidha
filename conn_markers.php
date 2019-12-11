<?php

	$dbhost = "localhost";
	$dbuser = "root";
	$dbpass = "";
	$dbname = "new1";

	//Create Connection
	$conn = new mysqli($dbhost, $dbuser, $dbpass, $dbname) or die($conn->connect_error);

	$sql1 = "SELECT * FROM equipment WHERE equipment_availability='yes'";
    $result = mysqli_query($conn,$sql1);
    $types = array();
    $lngs = array();
    $lats = array(); 
    if(mysqli_num_rows($result) > 0) {
        while($row1 = mysqli_fetch_assoc($result)){
            array_push($types,$row1["equipment_type"]);
            array_push($lngs,$row1["equipment_longitude"]);
            array_push($lats,$row1["equipment_latitude"]);
        }
    }
    $t = array("type"=>$types,"lat"=>$lats,"lng"=>$lngs);
    echo json_encode($t)
?>