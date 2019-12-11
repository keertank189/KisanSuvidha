<?php
function Redirect($url, $permanent = false)
{
    header('Location: ' . $url, true, $permanent ? 301 : 302);

    exit();
}

	if($_GET["state"]=="karnataka")
	{
	//$command = escapeshellcmd('');
	//$output = system("sudo /test.sh",$t);
		$xml = file_get_contents("http://127.0.0.1:5000/kar");
		
		//sleep(10);
		
		//Redirect('http://localhost:8001/EquipmentRental/renters/recommender.php', false);
		echo "<script>alert(".$xml.")</script>";
		//header("Location: http://localhost:8001/EquipmentRental/renters/recommender.php");
		// $la = system("python call_rec.py",$ret);
		// print($la);
	//echo $t;
	//echo $output;
	//echo $t;
	}
	//echo "Hi!";}
	else
	{
		$xml = file_get_contents("http://127.0.0.1:5000/oth");
		echo $xml;
	}
?>