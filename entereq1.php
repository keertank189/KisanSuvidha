<?php session_start(); ?>
<html>

  <head>
    <title> Renter Dashboard | Kisan Suvidha </title>
  </head>

  <link rel="shortcut icon" type="image/png" href="assets/img/P.png.png">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato">
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/fonts/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/customerlogin.css">

    <link rel="stylesheet" href="assets/w3css/w3.css">
  <script type="text/javascript" src="assets/js/jquery.min.js"></script>
  <script type="text/javascript" src="assets/js/bootstrap.min.js"></script>

  <body>
    <!-- Navigation -->
    <nav class="navbar navbar-custom navbar-fixed-top" role="navigation" style="color: black">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-main-collapse">
                    <i class="fa fa-bars"></i>
                    </button>
                <a class="navbar-brand page-scroll" href="index.php">
                   Kisan Suvidha </a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->

            <?php
                if(isset($_SESSION['login_renter'])){
            ?> 
            <div class="collapse navbar-collapse navbar-right navbar-main-collapse">
                <ul class="nav navbar-nav">
                    <li>
                        <a href="index.php">Home</a>
                    </li>
                    <li>
                        <a href="#"><span class="glyphicon glyphicon-user"></span> Welcome <?php echo $_SESSION['login_renter']; ?></a>
                    </li>
                    <li>
                    <ul class="nav navbar-nav navbar-right">
            <li><a href="#" class="dropdown-toggle active" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><span class="glyphicon glyphicon-user"></span> Control Panel <span class="equipmentet"></span> </a>
                <ul class="dropdown-menu">
              <li> <a href="entereq.php">Add equipment</a></li>
              

            </ul>
            </li>
          </ul>
                    </li>
                    <li>
                        <a href="logout.php"><span class="glyphicon glyphicon-log-out"></span> Logout</a>
                    </li>
                </ul>
            </div>
            
            <?php
                }
                else if (isset($_SESSION['login_customer'])){
            ?>
            <div class="collapse navbar-collapse navbar-right navbar-main-collapse">
                <ul class="nav navbar-nav">
                    <li>
                        <a href="index.php">Home</a>
                    </li>
                    <li>
                        <a href="#"><span class="glyphicon glyphicon-user"></span> Welcome <?php echo $_SESSION['login_customer']; ?></a>
                    </li>
                    <li>
                        <a href="#">History</a>
                    </li>
                    <li>
                        <a href="logout.php"><span class="glyphicon glyphicon-log-out"></span> Logout</a>
                    </li>
                </ul>
            </div>

            <?php
            }
                else {
            ?>

            <div class="collapse navbar-collapse navbar-right navbar-main-collapse">
                <ul class="nav navbar-nav">
                    <li>
                        <a href="index.php">Home</a>
                    </li>
                    <li>
                        <a href="renterlogin.php">renter</a>
                    </li>
                    <li>
                        <a href="customerlogin.php">Customer</a>
                    </li>
                    <li>
                        <a href="#"> FAQ </a>
                    </li>
                </ul>
            </div>
                <?php   }
                ?>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>

<?php

require 'connection.php';
$conn = Connect();

function GetImageExtension($imagetype) {
    if(empty($imagetype)) return false;
    
    switch($imagetype) {
        case 'assets/img/equipments/bmp': return '.bmp';
        case 'assets/img/equipments/gif': return '.gif';
        case 'assets/img/equipments/jpeg': return '.jpg';
        case 'assets/img/equipments/png': return '.png';
        default: return false;
    }
}

$equipment_name = $conn->real_escape_string($_POST['equipment_name']);
$equipment_type = $conn->real_escape_string($_POST['equipment_type']);
$equipment_price_per_hour = $conn->real_escape_string($_POST['equipment_price_per_hour']);
$equipment_price_per_day = $conn->real_escape_string($_POST['equipment_price_per_day']);
$equipment_longitude = $conn->real_escape_string($_POST['equipment_longitude']);
$equipment_latitude = $conn->real_escape_string($_POST['equipment_latitude']);

$equipment_availability = "yes";

if (!empty($_FILES["uploadedimage"]["name"])) {
    echo "string<br>";
    

    $file_name=$_FILES["uploadedimage"]["name"];
    $temp_name=$_FILES["uploadedimage"]["tmp_name"];
    

    echo $temp_name."<br>";
    

    $imgtype=$_FILES["uploadedimage"]["type"];
    $ext= GetImageExtension($imgtype);
    $imagename=$_FILES["uploadedimage"]["name"];
    $target_path = "assets/img/equipments/".$imagename;
    

    echo $target_path;

    if(move_uploaded_file($temp_name, $target_path)) 
    {

        $query = "INSERT into equipment(equipment_name,equipment_type,equipment_img,equipment_price_per_hour,equipment_price_per_day,equipment_availability,equipment_longitude,equipment_latitude)
        VALUES
        ('" . $equipment_name . "','" . $equipment_type . "','".$target_path."','" . $equipment_price_per_hour . "','" . $equipment_price_per_day . "','" . $equipment_availability ."','" . $equipment_longitude ."','" . $equipment_latitude ."')";
        $success = $conn->query($query);

        
    } 

}


// Taking equipment_id from equipments

$query1 = "SELECT equipment_id from equipment where equipment_name = '$equipment_name'";

$result = mysqli_query($conn, $query1);
$rs = mysqli_fetch_array($result, MYSQLI_BOTH);
$equipment_id = $rs['equipment_id'];
 

$query2 = "INSERT into renter_to_equipment(equipment_id,renter_username) values('" . $equipment_id ."','" . $_SESSION['login_renter'] . "')";
$success2 = $conn->query($query2);

if (!$success){ ?>
    <div class="container">
	<div class="jumbotron" style="text-align: center;">
        Equipment with the same Unique Equipment number already exists!
        <?php echo $conn->error; ?>
        <br><br>
        <a href="enterequipment.php" class="btn btn-default"> Go Back </a>
</div>
<?php	
}
else {
    echo "Added Succesfully!";
    header('Location: enterequipment.php'); //Redirecting 
}

$conn->close();

?>

    </body>
    <footer class="site-footer">
        <div class="container">
            <hr>
            <div class="row">
                <div class="col-sm-6">
                    <h5>© 2018 Kisan Suvidha</h5>
                </div>
            </div>
        </div>
    </footer>
</html>