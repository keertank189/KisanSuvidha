<?php 
 include('session_customer.php');
if(!isset($_SESSION['login_customer'])){
    session_destroy();
    header("location: customerlogin.php");
}
?> 
<!DOCTYPE html>
<html>
<head>
    <script type="text/javascript" src="assets/ajs/angular.min.js"> </script>
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato">
<link rel="shortcut icon" type="image/png" href="assets/img/P.png.png">
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/fonts/font-awesome.min.css">
    <link rel="stylesheet" href="assets/w3css/w3.css">
  <script type="text/javascript" src="assets/js/jquery.min.js"></script>
  <script type="text/javascript" src="assets/js/bootstrap.min.js"></script>  
  <script type="text/javascript" src="assets/js/custom.js"></script> 
 <link rel="stylesheet" type="text/css" media="screen" href="assets/css/clientpage.css" />
 <script type="text/javascript">
    function RevealPerDay(obj)
    {
        
        document.getElementById('date_rental').style.visibility='visible';
        return;                   
    }

    function RevealPerHour(obj)
    {
        document.getElementById('hourly_rental').style.visibility='visible';
        return;   
    }
 </script>
</head>
<body ng-app=""> 
      <!-- Navigation -->
     <!-- Navigation -->
     <nav class="navbar navbar-custom navbar-fixed-top" role="navigation" style="color: black">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-main-collapse">
                    <i class="fa fa-bars"></i>
                    </button>
                <a class="navbar-brand page-scroll" href="index.php">
                   KISAN SUVIDHA </a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->

            <?php
                if(isset($_SESSION['login_client'])){
            ?> 
            <div class="collapse navbar-collapse navbar-right navbar-main-collapse">
                <ul class="nav navbar-nav">
                    <li>
                        <a href="index.php">Home</a>
                    </li>
                    <li>
                        <a href="#"><span class="glyphicon glyphicon-user"></span> Welcome <?php echo $_SESSION['login_client']; ?></a>
                    </li>
                    <li>
                    <ul class="nav navbar-nav navbar-right">
            <li><a href="#" class="dropdown-toggle active" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><span class="glyphicon glyphicon-user"></span> Control Panel <span class="equipmentet"></span> </a>
                <ul class="dropdown-menu">
              <li> <a href="enterequipment.php">Add equipment</a></li>
              <li> <a href="enterdriver.php"> Add Driver</a></li>
              <li> <a href="clientview.php">View</a></li>

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
                    <ul class="nav navbar-nav">
            <li><a href="#" class="dropdown-toggle active" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"> Garagge <span class="equipmentet"></span> </a>
                <ul class="dropdown-menu">
              <li> <a href="prereturnequipment.php">Return Now</a></li>
              <li> <a href="mybookings.php"> My Bookings</a></li>
            </ul>
            </li>
          </ul>
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
                        <a href="clientlogin.php">Client</a>
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
    
<div class="container" style="margin-top: 65px;" >
    <div class="col-md-7" style="float: none; margin: 0 auto;">
      
      <div class="form-area">

        <form role="form" action="bookingconfirm.php" method="POST">
        <br style="clear: both">
          <h2 style="margin-bottom: 25px; text-align: center; font-size: 30px;"> Rent your Equiments here! </h2><br>

        <?php
        $equipment_id = $_GET["id"];
        $sql1 = "SELECT * FROM equipment WHERE equipment_id = '$equipment_id'";
        $result1 = mysqli_query($conn, $sql1);

        if(mysqli_num_rows($result1))
        {
            while($row1 = mysqli_fetch_assoc($result1))
            {
                $equipment_name = $row1["equipment_name"];
                $equipment_price_per_hour = $row1["equipment_price_per_hour"];
                $equipment_price_per_day = $row1["equipment_price_per_day"];
                $equipment_type = $row1["equipment_type"];

            }
        }

        ?>

           <div class="form-group">
              <h5> Equipment Name:&nbsp;  <?php echo($equipment_name);?></h5>
          </div>
         
          <div class="form-group">
            <h5> Equipment Type:&nbsp; <?php echo($equipment_type);?></h5>
          </div>
        <div class="form-group">

        <div>
            <h5>Rate: <?php echo("₹" . $equipment_price_per_hour . "/hour and ₹" . $equipment_price_per_day . "/day");?>
            <h5>    
        </div>


        <h5> Choose your rental type:  &nbsp;
            <input onclick="RevealPerHour(this)" type="radio" name="radio" value="equipment_price_per_hour" ng-model="myVar"> Per Hour &nbsp;
            <input onclick="RevealPerDay(this)" type="radio" name="radio" value="equipment_price_per_day" ng-model="myVar"> Per Day
            &nbsp;
        </h5>

        <div id="date_rental" style="visibility: hidden">
        <input id="start_date" type= "date" name="rent_start_date" min="<?php echo($today);?>" required="">
        <input id="end_date" type="date" name="rent_end_date" min="<?php echo($today);?>" required="">
        </div>

        <div id="hourly_rental" style="visibility: hidden">
        <input id="start_date" type= "text" name="rent_start_date" min="<?php echo($today);?>" required="">
        </div>               
                 
         <input type="hidden" name="hidden_equipmentid" value="<?php echo $equipment_id; ?>">
         <input type="submit"name="submit" value="Book Now" class="btn btn-success pull-right">     
        </form>
        
      </div>
      <div class="col-md-12" style="float: none; margin: 0 auto; text-align: center;">
            <h6><strong>Kindly Note:</strong> You will be charged <span class="text-danger">₹200/-</span> for each day after the due date.</h6>
      </div>
    </div>

</body>
<footer class="site-footer">
        <div class="container">
            <hr>
            <div class="row">
                <div class="col-sm-6">
                    <h5>© 2019 Kisan Suvidha</h5>
                </div>
            </div>
        </div>
    </footer>
</html>