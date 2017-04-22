<!DOCTYPE html>
<html lang="en">
<?php require("../../dbconnect.php");
require_once("./PHP/functions.php");
session_start();
ini_set("display_errors", true);
error_reporting(E_ALL);
if($_SESSION["valid"]==true){?>
<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Server" >


    <title>Profile Settings</title>

    <!-- Bootstrap Core CSS -->
    <link href="../bootstrap/css/bootstrap.css" rel="stylesheet">
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
    <nav class="navbar navbar-inverse navbar-fixed-top2" role="navigation">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="./welcome.php">Dashboard</a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    <li><a href="./houseSettings.php">House</a></li>
                    <li><a href="./choreSettings.php">Chores</a></li>
                    <li><a href="./taskSettings.php">Tasks</a></li>
                    <li><a href="./eventSettings.php">Events</a></li>
                    <li><a href="./userSettings.php"> My Settings </a></li>
                    <li><a href="./logout.php"> <span class="glyphicon glyphicon-log-out">
                        </span>Logout </a></li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>

    <!-- Page Content -->
    <div class="container">

        <!-- Page Heading -->
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Event Settings
                    <small>Add events by giving the name, date and time, and location of the event.</small>
                </h1>
            </div>
        </div>
        <!-- /.row -->

        <div class="container">
	         <div class="row">
             <div class="col-md-4">

		             <div class="form_main">
                   <h4 class="heading"><strong>Add an Event</strong> <span></span></h4>
                   <div class="form">
                     <form action="" method="POST" id="eventForm" name="eventForm">
                       <input type="text" required="" placeholder="Name of Event" value="" name="eventName" class="txt"/>
                       <input type="time" required="" placeholder="Time of Event" value="" name="eventTime" class="txt"/>
		                   <input type="date" required="" value="" name="eventDate" class="date"/><br/>
                         <?php
                           $groupId = $_SESSION["gid"];
                           $sql = "SELECT name, RID FROM room WHERE GID = '$groupId'";
                           $result = mysqli_query($db, $sql);


                           /*
                            if(mysqli_num_rows($result)){
                              while($rms = mysqli_fetch_array($result)){
                                $room = $rms -> name;
                                $getRms.='<option value="'.$room.'">'.$room.'</option>';
                              }//while
                            }//if
                            echo $getRms;
                            $room[] = mysqli_fetch_row($result);
                            echo $room[0];
                            echo $room[1];
                            $room[] = mysqli_fetch_row($result);
                            echo $room[0];
                            echo $room[1];
                            */



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
                     <form action="" method="POST" id="eventForm" name="eventForm">
                       <input type="text" required="" placeholder="Name of Launderer" value="" name="eventName" class="txt">
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

        <!-- Footer -->
        <footer>
            <div class="row">
                <div class="col-lg-12 footer l-box is-center">
                    <p>Copyright &copy; 2016-2017 PLU Capstone. Authors <a target="_blank" href="https://www.linkedin.com/in/gagedgibson">Gage Gibson</a>,
        <a target="_blank" href="https://www.linkedin.com/in/jaymegreer">Jayme Greer</a> and Caleb LaVergne.</p>
                </div>
            </div>
            <!-- /.row -->
        </footer>

    </div>
    <!-- /.container -->

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

</body>

</html>
<?php }//if
else{
  redirect("./login.php");
}?>
