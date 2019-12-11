<?php 
include('session_renter.php'); 
?> 
<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato">
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/fonts/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/customerlogin.css">
    <link rel="stylesheet" href="assets/w3css/w3.css">
  <script type="text/javascript" src="assets/js/jquery.min.js"></script>
  <script type="text/javascript" src="assets/js/bootstrap.min.js"></script>
    <link rel="stylesheet" type="text/css" media="screen" href="assets/css/renterpage.css" />
    <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
    <script type="text/javascript">
      Geocode()
      function Geocode()
      {
      // Prevent actual submit
      //e.preventDefault();
      var location = "<?php echo $_SESSION['renter_address']?>";
      axios.get('https://maps.googleapis.com/maps/api/geocode/json',{
        params:{
          address:location,
          key:'AIzaSyCCuoe93lQkgRaC7FB8fMOr_g1dmMRwKng'
        }
      })
      .then(function(response){
        
        // Geometry
        var lat = response.data.results[0].geometry.location.lat;
        var lng = response.data.results[0].geometry.location.lng;
        // Output to app

        document.getElementById('long').value = lng;
        document.getElementById('lat').value = lat;
        console.log(document.getElementById('long').value);
        console.log(document.getElementById('lat').value); 
        document.getElementById('equipment_submit').submit();


      })
      .catch(function(error)
      {
        console.log(error);
      });
    }

    </script>
</head>
<body>

      <!-- Navigation -->
    <nav class="navbar navbar-custom navbar-fixed-top" role="navigation" style="color: white; background-color: black">
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
              <li> <a href="entereq.php">Add Equipment</a></li>

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
        <form id='equipment_submit' role="form" action="entereq1.php" enctype="multipart/form-data" method="POST">
        <br style="clear: both">
          <h3 style="margin-bottom: 25px; text-align: center; font-size: 30px;"> Want to rent your agri-equipments? Give us your details! </h3>

          <div class="form-group">
            <input type="text" class="form-control" id="equipment_name" name="equipment_name" placeholder="Equipment Name " required autofocus="">
          </div>

          <div class="form-group">
            <input type="text" class="form-control" id="equipment_price_per_hour" name="equipment_price_per_hour" placeholder="Fare per hour (in rupees)" required>
          </div>

          <div class="form-group">
            <input type="text" class="form-control" id="equipment_price_per_day" name="equipment_price_per_day" placeholder="Fare per day (in rupees)" required>
          </div>

          <div class="form-group">
            <input type="text" class="form-control" id="equipment_type" name="equipment_type" placeholder="Equipement Type" required>
          </div>

          <div class="form-group">
            <input name="uploadedimage" type="file">
          </div>

          <div class="form-group">
            <input id='long' name="equipment_longitude" type="text" style="opacity: 0">
          </div>

          <div class="form-group">
            <input id='lat' name="equipment_latitude" type="text" style="opacity: 0">
          </div>



           <button type="submit" id="submit" name="submit" class="btn btn-primary pull-right"> Add</button>    
        </form>
      </div>
    </div>


        <div class="col-md-12" style="float: none; margin: 0 auto;">
    <div class="form-area" style="padding: 0px 100px 100px 100px;">
        <form action="" method="POST">
        <br style="clear: both">
          <h3 style="margin-bottom: 25px; text-align: center; font-size: 30px;"> My Equipments </h3>
<?php
// Storing Session
$user_check=$_SESSION['login_renter'];
$sql = "SELECT * FROM equipments WHERE equipment_id IN (SELECT equipment_id FROM renterequipments WHERE renter_username='$user_check');";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
  ?>
<div style="overflow-x:auto;">
  <table class="table table-striped">
    <thead class="thead-dark">
      <tr>
        <th></th>
        <th width="24%"> Name</th>
        <th width="15%"> UID </th>
        <th width="13%"> Fare (/acre) </th>
        <th width="13%"> Fare (/day)</th>
        <th width="1%"> Availability </th>
      </tr>
    </thead>

    <?PHP
      //OUTPUT DATA OF EACH ROW
      while($row = mysqli_fetch_assoc($result)){
    ?>

  <tbody>
    <tr>
      <td> <span class="glyphicon glyphicon-menu-right"></span> </td>
      <td><?php echo $row["equipment_name"]; ?></td>
      <td><?php echo $row["equipment_nameplate"]; ?></td>
      <td><?php echo $row["equipment_price"]; ?></td>
      <td><?php echo $row["equipment_price_per_day"]; ?></td>
      <td><?php echo $row["equipment_availability"]; ?></td>
      
    </tr>
  </tbody>
  <?php } ?>
  </table>
  </div>
    <br>
  <?php } else { ?>
  <h4><center>0 Equipments available</center> </h4>
  <?php } ?>
        </form>
</div>        
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