<!DOCTYPE html>
<html lang="en">
<?php session_start();
require("../../dbconnect.php");
require_once("./PHP/functions.php");
ini_set("display_errors", true);
error_reporting(E_ALL);
if($_SESSION["valid"]==true){?>
<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Capstone" >

    <title>Event Settings</title>
    <link rel="icon" href="../images/logo.png">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>

    <!-- room form css -->
    <link href="../CSS/roomForm.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="../CSS/normalize.css"/> <!-- normalize -->
    <link rel="stylesheet" type="text/css" href="../CSS/psuedoWelcome.css"/> <!-- css -->

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>
<div id="layout">
  <div id="main">

    <div class="header">
        <h1>House Utilities Manager</h1>
        <h2>An application housing all your home management needs. </h2>
    </div>

    <!-- Navigation -->
    <nav class="navbar navbar-default">
      <div class="container-fluid">
        <div class="navbar-header">
           <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#mainNavBar" aria-expanded="false">
               <span class="sr-only">Toggle navigation</span>
               <span class="icon-bar"></span>
               <span class="icon-bar"></span>
               <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="./welcome.php">My Dashboard</a>
        </div>
        <div class="collapse navbar-collapse" id="mainNavBar">
          <ul class="nav navbar-nav">
            <li><a href="./houseSettings.php">House</a></li>
            <li><a href="./choreSettings.php">Chores</a></li>
            <li><a href="./taskSettings.php">Tasks</a></li>
            <li class="active"><a href="./eventSettings.php">Events <span class="sr-only">(current)</span></a></li>
            <li><a href="./userSettings.php">My Settings</a></li>
            <li><a href="./logout.php">Logout</a></li>
          </ul>
        </div><!-- /.navbar-collapse -->
      </div><!-- /.container-fluid -->
    </nav>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"> </script>

    <!-- Page Content -->
    <div class="container">

        <!-- Page Heading -->
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Event Settings
                    <small>Add events by giving the name, date, time, and location of the event.</small>
                </h1>
            </div>
        </div>
        <!-- /.row -->

        <!--BANNERS HERE-->


        <div class="container">
	         <div class="row">
             <?php
               $userID = $_SESSION["login_user"];
               $sql = "SELECT GID FROM sys.user_info WHERE UID = '$userID'";
               $result = mysqli_query($db, $sql);
               $obj = mysqli_fetch_object($result);
               $userGID = $obj->GID;
               if($userGID == '0'){
             ?>
             <div class="header">
               <h2>Please create a group before editing these settings.</h2>
               <h4>Click <a href="./houseSettings.php">here</a> to do so.</h4>
             </div><!--header-->
             <?php }//if
                else { ?>
             <div class="col-md-4">
		             <div class="form_main">
                   <h4 class="heading"><strong>Add an Event</strong> <span></span></h4>
                   <div class="form">
                     <form action="./PHP/processEventForm.php" method="POST" id="eventForm" name="eventForm">
                       <input type="text" required="" placeholder="Name of Event" value="" name="eventName" class="txt"/>
                       <input type="time" required="" placeholder="Time of Event" value="" name="eventTime" class="txt"/>
		                   <input type="date" required="" value="" name="eventDate" class="date"/><br/>
                         <?php
                           $groupId = $_SESSION["gid"];
                           $sql = "SELECT name, RID FROM room WHERE GID = '$groupId'";
                           $result = mysqli_query($db, $sql);
                         ?>
                       <select name="roomSelect" class="form-control">
                          <option value="">--Please Select a Room--</option>
                          <?php while($room = mysqli_fetch_row($result)):?>
                                  <option value="<?php echo $room[1]; ?>"><?php echo $room[0]; ?></option>
                          <?php endwhile; ?>
                       </select>

		                     <hr>
                       <input type="submit" value="submit" name="submit" class="txt2">
                     </form>
                  </div>
                </div>
					</div>

					<div class="col-md-4">
		             <div class="form_main">
                   <h4 class="heading"><strong>Request Laundry Machines</strong> <span></span></h4>
                   <div class="form">
                     <form action="./PHP/processLaundryForm.php" method="POST" id="eventForm" name="eventForm">
                       <input type="time" required="" placeholder="Time of Laundry" value="" name="eventTime" class="txt">
		                   <input type="date" required="" value="" name="eventDate" class="date">
		                   <hr>
		                  <input type="submit" value="submit" name="submit" class="txt2">
		    </form>
		  </div>
		</div>

            </div><!-- col-md-4 -->
	        </div><!-- row -->
        </div><!-- container -->

        <hr>
        <?php }//else ?>

        <!-- Footer -->
      <div id="footer">
        <div class="container">
          <p class="text-muted">Copyright ©2016-2017 PLU Capstone. House Utilities Manager.
          Authors <a target="_blank" href="https://www.linkedin.com/in/gagedgibson">Gage Gibson</a>,
            <a target="_blank" href="https://www.linkedin.com/in/jaymegreer">Jayme Greer</a> and Caleb LaVergne.</p>
        </div>
      </div>

      <ul class="nav pull-right scroll-top">
        <li><a href="#" title="Scroll to top"><i class="glyphicon glyphicon-chevron-up"></i></a></li>
      </ul>

      <div class="modal" id="myModal" role="dialog">
        <div class="modal-dialog">
          <div class="modal-content">
             <div class="modal-header">
                 <button class="close" type="button" data-dismiss="modal">×</button>
                 <h3 class="modal-title"></h3>
             </div>
             <div class="modal-body">
               <div id="modalCarousel" class="carousel">
                 <a class="carousel-control left" href="#modaCarousel" data-slide="prev"><i class="glyphicon glyphicon-chevron-left"></i></a>
                 <a class="carousel-control right" href="#modalCarousel" data-slide="next"><i class="glyphicon glyphicon-chevron-right"></i></a>
               </div>
             </div>
             <div class="modal-footer">
                 <button class="btn btn-default" data-dismiss="modal">Close</button>
             </div>
          </div>
      </div>
    </div> <!--footer-->
    </div><!-- /.container -->
</body>

</html>
<?php }//if
else{
  redirect("./login.php");
}?>
