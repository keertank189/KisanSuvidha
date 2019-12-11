<?php 
session_start(); 
require 'connection.php';
$conn = Connect();
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>KISAN SUVIDHA</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato">
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/fonts/font-awesome.min.css">
    <link rel="stylesheet" href="assets/css/user.css">
    <link rel="stylesheet" href="assets/w3css/w3.css">
    <link href="http://fonts.googleapis.com/css?family=Open+Sans:300,400,700,400italic,700italic" rel="stylesheet" type="text/css">
    <link href="http://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="/assets/css/style1.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <!--Bot style start-->
    <style>
    body
* {box-sizing: border-box;}

@font-face { font-family: 'Merriweather Sans', sans-serif; 
       src: url('/Roboto/Roboto-Regular.ttf'); }

@font-face { font-family: merriweather-sans; 
       src: url('/Merriweather_Sans/MerriweatherSans-Regular.ttf'); }

/* Button used to open the chat form - fixed at the bottom of the page */
.open-button {
  background-color: #555;
  color: white;
  padding: 12px;
  border: none;
  cursor: pointer;
  opacity: 0.8;
  position: fixed;
  bottom: 100px;
  right: 40px;
  width: 180px;
  border-radius: 10px;
}

/* The popup chat - hidden by default */
.chat-popup {
  display: none;
  max-height: 700px;
  max-width: 270px;
  overflow-y: scroll;
  position: fixed;
  bottom: 0;
  right: 15px;
  border: 3px solid #bfbfbf;
  border-radius: 17px 52px;
  z-index: 9;
}

/* Add styles to the form container */
.form-container {
  max-width: 500px;
  padding: 1px;
  background-color:#8080ff;

  border-radius: 15px 50px;
}

.button-container {
  display: flex;
  justify-content: space-around;
}

/* Set a style for the submit/send button */
.form-container .button-container .btn {
  background-color: #4CAF50;
  color: white;
  padding: 10px 10px;
  border: none;
  cursor: pointer;
  width: 100%;
  margin:10px;
  border-radius: 15px;
  opacity: 0.8;
}

/* Add a red background color to the cancel button */
.form-container .button-container .cancel {
  background-color: red;
}

/* Add some hover effects to buttons */
.form-container .btn:hover, .open-button:hover {
  opacity: 1;
}

#chatbox {
    margin-left: 10px;
    margin-right: 10px;
    width: auto;
    margin-top: 10px;

}

#userInput {
    margin-left: 10px;
    margin-right: 10px;
    width: auto;
    margin-top: 70px;
    
}

#textInput {
    width: 87%;
    border: none;
    border-bottom: 3px solid #009688;
    font-family: 'Merriweather Sans', sans-serif;
    padding: 4px;
    border-radius: 5px;
    font-size: 17px;
    margin-left: 13px;
}

.userText {
    color:  #000000;
    font-family: 'Merriweather Sans', sans-serif;
    font-size: 17px;
    text-align: right;
    line-height: 30px;
}

.userText span {
    padding: 10px;
    border-radius: 6px;
}

.botText {
    color: white;
    font-family: 'Merriweather Sans', sans-serif;
    font-size: 17px;
    text-align: left;
    line-height: 30px;
}

.botText span {
    padding: 10px;
    border-radius: 6px;
}
</style>
    <!--Bot style end-->
</head>

<body id="page-top" data-spy="scroll" data-target=".navbar-fixed-top">

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
                if(isset($_SESSION['login_renter'])){
            ?> 
            <div class="collapse navbar-collapse navbar-right navbar-main-collapse">
                <ul class="nav navbar-nav">
                    <li>
                        <a href="#" class="dropdown-toggle active" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"> Features <span class="caret"></span> </a>
                        <ul class="dropdown-menu">
                            <li> <a href="lhttp://localhost:8001/EquipmentRental/lyjai/NewsAPI/index.php">NEWS</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="index_temp.php">Home</a>
                    </li>
                    <li>
                        <a href="#"><span class="glyphicon glyphicon-user"></span> Welcome <?php echo $_SESSION['login_renter']; ?></a>
                    </li>
                    <li>
                    <ul class="nav navbar-nav navbar-right">
            <li><a href="#" class="dropdown-toggle active" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><span class="glyphicon glyphicon-user"></span> Control Panel <span class="caret"></span> </a>
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
                        <a href="#" class="dropdown-toggle active" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"> Features <span class="caret"></span> </a>
                        <ul class="dropdown-menu">
                            <li> <a href="lhttp://localhost:8001/EquipmentRental/lyjai/NewsAPI/index.php">News</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="index_temp.php">Home</a>
                    </li>
                    <li>
                        <a href="#"><span class="glyphicon glyphicon-user"></span> Welcome <?php echo $_SESSION['login_customer']; ?></a>
                    </li>
                    <ul class="nav navbar-nav">
            <li><a href="#" class="dropdown-toggle active" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"> MyGarage <span class="caret"></span> </a>
                <ul class="dropdown-menu">
              <li> <a href="prereturneq.php">Return Now</a></li>
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
                        <a href="#" class="dropdown-toggle active" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"> Features <span class="caret"></span> </a>
                        <ul class="dropdown-menu">
                            <li> <a href="http://localhost:8001/EquipmentRental/lyjai/NewsAPI/index.php">News</a></li>
                            <li>
                             <a href="weather2.html"> Weather </a>
                            </li>
                            <li>
                             <a href="recommender.php"> Recommendation </a>
                             </li>
                        </ul>
                    </li>
                    <li>
                        <a href="index_temp.php">Home</a>
                    </li>
                    <li>
                        <a href="renterlogin.php">Renter</a>
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
    <div class="bgimg-1">
        <header class="intro">
            <div class="intro-body">
                <div class="container">
                    <div class="row">
                        <div class="col-md-8 col-md-offset-2">
                            <h1 class="brand-heading" style="color: black">KISAN SUVIDHA</h1>
                            <p class="intro-text" >
                                One Stop Shop for your Agricultural Needs 
                            </p>
                            <a href="#sec2" class="btn btn-circle page-scroll blink">
                                <i class="fa fa-angle-double-down animated"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </header>
    </div>

    <div id="sec2" style="color: #777;background-color:white;text-align:center;padding:50px 80px;text-align: justify;">
        <h3 style="text-align:center;">Currently Available Equipments</h3>
<br>

<!--   FILTER CODE STARTS HERE  -->

<form id="filter" action="index_temp.php" method="POST">

    
    <div id="des">
    <h4>Price Range</h4> 
    <h5>Per Day</h5> Min  <input type="text" name="daymin" size="6">&nbsp;&nbsp;
    Max  <input type="text" size="6" name="daymax">&nbsp;
    <h5>Per Hour</h5>Min  <input type="text" size="6" name="hourmin">&nbsp;&nbsp;
    Max  <input type="text" size="6" name="hourmax">&nbsp;
    
    Type <select name="eq_type" form="filter" >
          <option value="Vehicle">Vehicle</option>
          <option value="Machines">Machines</option>
          <option value="Tools">Tools</option>
        </select>
    Search <input type="text" size="20" name="search">
    <input type="submit"></form>
</div>

    
<br><br>
<style>
#des{
    
    border-radius: 15px;
     
    
     border: 2px solid #73AD21;
  padding: 20px; 
}
</style>
        <section class="menu-content">
           <?php   
             $sql1 = "SELECT * FROM equipment WHERE equipment_availability='yes'";
            
             if(isset($_POST["daymin"], $_POST["daymax"]) && !empty($_POST["daymin"]) && !empty($_POST["daymax"]))
             {
              $sql1 .= "AND equipment_price_per_day BETWEEN '".$_POST["daymin"]."' AND '".$_POST["daymax"]."'";
             }
             if(isset($_POST["hourmin"], $_POST["hourmax"]) && !empty($_POST["hourmin"]) && !empty($_POST["hourmax"]))
             {
              $sql1 .= "AND equipment_price_per_hour BETWEEN '".$_POST["hourmin"]."' AND '".$_POST["hourmax"]."'";
             }

             if(isset($_POST["eq_type"]) &&!empty($_POST["eq_type"]))
             {
              
              $sql1 .= "AND  equipment_type = '".$_POST["eq_type"]."' ";
             }   

             if(isset($_POST["search"]) &&!empty($_POST["search"]))
             {
              
              $sql1 .= "AND  equipment_name LIKE '%".$_POST["search"]."%' ";
             }   

            $result1 = mysqli_query($conn,$sql1);

            if(mysqli_num_rows($result1) > 0) {
                while($row1 = mysqli_fetch_assoc($result1)){
                    $equipment_id = $row1["equipment_id"];
                    $equipment_name = $row1["equipment_name"];
                    $equipment_price_per_hour = $row1["equipment_price_per_hour"];
                    $equipment_price_per_day = $row1["equipment_price_per_day"];
                    $equipment_img = $row1["equipment_img"];
               
                    ?>
            <a href="booking.php?id=<?php echo($equipment_id) ?>">
            <div class="sub-menu">
            

            <img class="card-img-top" src="<?php echo $equipment_img; ?>" alt="Card image cap">
            <h5> <?php echo $equipment_name; ?> </h5>
            <h6> Rate: <?php echo ("₹" . $equipment_price_per_day . "/day & ₹" . $equipment_price_per_hour . "/hour"); ?></h6>  
            </div> 
            </a>
            <?php }}
            else {
                ?>
<h1> No equipment available :( </h1>
                <?php
            }
            ?>                                  
        </section>
                    
    </div>
<!-- FILTER CODE ENDS HERE -->

<div class="bgimg-2">
        <div class="caption">
            <span class="border" style="background-color:transparent;font-size:25px;color: #f7f7f7;"></span>
        </div>
    </div>

    <div style="position:relative;">
        <div style="color:#ddd;background-color:#282E34;text-align:center;padding:50px 80px;text-align: justify;">
            <p>Click here for the latest deals on your bookings</p>
        </div>
    </div>

        

    
    <!-- Container (Contact Section) -->
    <div class="w3-content w3-container w3-padding-64" id="contact">
        <h3 class="w3-center">ABOUT KISAN SUVIDHA</h3>
        <p class="w3-center"><em>We love your feedback!</em></p>

        <div class="w3-row w3-padding-32 w3-section">
            <div class="w3-col m4 w3-container">
                <!-- Add Google Maps -->
                <div id="googleMap" class="w3-round-large w3-greyscale" style="width:100%;height:400px;"></div>
                <script>
        function myMap() {
            myCenter = new google.maps.LatLng(12.971599, 77.594566);
            var mapOptions = {
                center: myCenter,
                zoom: 12,
                scrollwheel: true,
                draggable: true,
                mapTypeId: google.maps.MapTypeId.ROADMAP
            };
            var map = new google.maps.Map(document.getElementById("googleMap"), mapOptions);

            var xhr = new XMLHttpRequest();
            xhr.open("GET","./conn_markers.php",true);
            xhr.onreadystatechange = function()
            {
                if(this.readyState == 4 && this.status==200)
                {
                    var res = JSON.parse(this.responseText);

                    var types = res.type
                    var lats = res.lat;
                    var lngs = res.lng;
                
                    var i;
                    for(i=0;i<lngs.length;i++)
                    {
                        var pos = {lat:parseFloat(lats[i]),lng:parseFloat(lngs[i])};
                        var marker = new google.maps.Marker({position:pos,map:map});
                        var infowindow = new google.maps.InfoWindow();
                        makeInfoWindowEvent(map, infowindow, String(types[i]), marker);
                    }
                }
            }
            xhr.send();
        }
        function makeInfoWindowEvent(map, infowindow, contentString, marker) {
            google.maps.event.addListener(marker, 'click', function() {
            infowindow.setContent(contentString);
            infowindow.open(map, marker);
        });
    }
    </script>
            </div>
            <div class="w3-col m8 w3-panel">
                <div class="w3-large w3-margin-bottom">
                    <i class="fa fa-phone fa-fw w3-hover-text-black w3-xlarge w3-margin-right"></i> Phone: +91 8660028264<br>
                    <i class="fa fa-envelope fa-fw w3-hover-text-black w3-xlarge w3-margin-right"></i> Email: kisansuvidha@gmail.com<br>
                </div>
                <p>Have Doubts or Queries? Drop Your Details and Leave it on us We'll Revert back!</p>
                <form action="action_page.php" method="POST">
                    <div class="w3-row-padding" style="margin:0 -16px 8px -16px">
                        <div class="w3-half">
                            <input class="w3-input w3-border" type="text" placeholder="Name" required name="name">
                        </div>
                        <div class="w3-half">
                            <input class="w3-input w3-border" type="text" placeholder="Email" required name="e_mail">
                        </div>
                    </div>
                    <input class="w3-input w3-border" type="text" placeholder="Message" required name="message">
                   
                </form>
                 <button class="w3-button w3-black w3-right w3-section" type="submit">
                <i class="fa fa-paper-plane"></i><a href="mailto:kisansuvidha@gmail.com?subject=Kisan%20Suvidha%20Queries"> Send Feedback </a>
              </button>
            </div>
        </div>
    </div>

<!-- Start of Chatbot-->
<button class="open-button" onclick="openForm()" style="font-size: 15px">Chat</button>

<div class="chat-popup" id="myForm">
  <div class="form-container">
    <div id="chatbox">
        <p class="botText"><span>Hi! I'm Chatterbot.</span></p>
    </div>

    <div id="userInput">
        <input id="textInput" type="text" name="msg" placeholder="Message">
        <div class="button-container">
            <button type="submit" class="btn" id="buttonInput" style="font-size: 15px">Send</button>
            <button type="button" class="btn cancel" style="font-size: 15px" 
            onclick="closeForm()">Close</button>
        </div>
    </div>
  </div>
</div>

<script>
function openForm() {
  document.getElementById("myForm").style.display = "block";
}

function closeForm() {
  document.getElementById("myForm").style.display = "none";
}
</script>

<script>
function getBotResponse() {
  var rawText = $("#textInput").val();
  var userHtml = '<p class="userText"><span>' + rawText + '</span></p>';
  $("#textInput").val("");
  $("#chatbox").append(userHtml);
  document.getElementById('userInput').scrollIntoView({block: 'start', behavior: 'smooth'});
  $.get("http://127.0.0.1:5000/get", { msg: rawText }).done(function(data) {
    var botHtml = '<p class="botText"><span>' + data + '</span></p>';
    $("#chatbox").append(botHtml);
    document.getElementById('userInput').scrollIntoView({block: 'start', behavior: 'smooth'});
  });
}
$("#textInput").keypress(function(e) {
    if(e.which == 13) {
        getBotResponse();
    }
});
$("#buttonInput").click(function() {
  getBotResponse();
})
</script>
<!-- End of Chatbot-->

    <footer class="site-footer">
        <div class="container">
            <hr>
            <div class="row">
                <div class="col-sm-6">
                    <h5>© 2019 KISAN SUVIDHA</h5>
                </div>
                <div class="col-sm-6 social-icons">
                    <a href="#" target="_blank"><i class="fa fa-facebook"></i></a>
                    <a href="#" target="_blank"><i class="fa fa-twitter"></i></a>
                    <a href="#" target="_blank"><i class="fa fa-instagram"></i></a>
                    <a href="#" target="_blank"><i class="fa fa-google-plus"></i></a>
                </div>
            </div>
        </div>
    </footer>
    
    <script>
        function sendGaEvent(category, action, label) {
            ga('send', {
                hitType: 'event',
                eventCategory: category,
                eventAction: action,
                eventLabel: label
            });
        };
    </script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCCuoe93lQkgRaC7FB8fMOr_g1dmMRwKng&callback=myMap" type="text/javascript"></script>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <!-- Plugin JavaScript -->
    <script src="assets/js/jquery.easing.min.js"></script>
    <!-- Custom Theme JavaScript -->
    <script src="assets/js/theme.js"></script>
</body>

</html>