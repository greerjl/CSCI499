<!DOCTYPE html>
<?php session_start();
include '../../dbconnect.php';
require_once("./PHP/functions.php");
ini_set("display_errors", true);
error_reporting(E_ALL);
if($_SESSION["valid"]==true){?>
<html lang="en">
<head>
  <meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Home Utilities Manager &ndash; </title>
	<link rel="stylesheet" href="http://yui.yahooapis.com/pure/0.6.0/pure-min.css">
  <link rel="icon" href="../images/logo.png"/>
	<link rel="stylesheet" type="text/css" href="../CSS/normalize.css"/> <!-- normalize -->
	<link rel="stylesheet" type="text/css" href="../CSS/welcome.css"/> <!-- css -->
  <link rel="icon" href="../images/logo.png">

  <!-- Bootstrap Core CSS -->
  <link href="../bootstrap/css/bootstrap.css" rel="stylesheet">
    <!--[if lte IE 8]>
        <link rel="stylesheet" href="/combo/1.18.13?/css/layouts/side-menu-old-ie.css">
    <![endif]-->
    <!--[if gt IE 8]><!-->
    <!--<![endif]-->
	 <!--[if lt IE 9]>
    <script src="http://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7/html5shiv.js"></script>
	 <![endif]-->

	<script>
(function(i,s,o,g,r,a,m)
	{i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
		(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
	 	m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
	 })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

	ga('create', 'UA-41480445-1', 'purecss.io');
	ga('send', 'pageview');
	</script>

</head>
<body>
	<div id="layout">

    <div id="main">
        <div class="header">
            <h1>House Utilities Manager</h1>
            <h2>An application housing all your home management needs. </h2>
        </div>

        <nav class="navbar navbar-inverse navbar-fixed-top2" role="navigation">
            <div class="container">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="bs-example-navbar-collapse-1">
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
                      <ul class="nav navbar-nav">
                          <li><a href="./houseSettings.php">House</a></li>
                          <li><a href="./choreSettings.php">Chores</a></li>
                          <li><a href="./taskSettings.php">Tasks</a></li>
                          <li><a href="./eventSettings.php">Events</a></li>
                          <li><a href="./userSettings.php"> My Settings </a></li>
                          <li><a href="./logout.php"> <span class="glyphicon glyphicon-log-out">
                              </span>Logout </a></li>
                      </ul>
                    </ul>
                </div><!-- /.navbar-collapse -->
            </div><!-- /.container -->
        </nav>

        <div class="content">

<!--House info-->
        <div class="houseinfo">
            <h2 class="content-subhead2">House: </h2>
            <h4 class="content-subhead2">Members: </h4>
              <div class="phptext">
                <?php
                  $groupId = $_SESSION["gid"];
                  $sql = "SELECT username FROM user_info WHERE GID = '$groupId'";
                  $result = mysqli_query($db, $sql);
                  while($username = mysqli_fetch_row($result)):
                      echo $username[0]."<br/>";
                  endwhile;
                ?>
              </div><!--phptext-->
            <h4 class="content-subhead2">Rooms: </h4>
            <div class="phptext">
              <?php
                $sql = "SELECT name FROM room WHERE GID = '$groupId'";
                $result = mysqli_query($db, $sql);
                while($roomNames = mysqli_fetch_row($result)):
                    echo $roomNames[0]."<br/>";
                endwhile;
              ?>
            </div><!--phptext-->
        </div><!--houseinfo-->

<!-- CHORES -->
            <h2 class="content-subhead">Your Chore: </h2>
            <p>
              <table>
                  <?php
                    $user = $_SESSION["login_user"];
                    $sql = "SELECT title FROM user_info, chore WHERE user_info.UID = '$user' AND user_info.UID = chore.UID";
                    $result = mysqli_query($db, $sql);

                    $count = mysqli_num_rows($result);
                    //php end tag here

                    if($count == 0){
                      $emptyMessage = "<tr><td>You currently have no chores.</td></tr>";
                      echo $emptyMessage;
                    }
                    else{
                      while ($line = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
                          foreach ($line as $col_value) {
                              echo "\t\t<tr><td>$col_value</td></tr>";
                          }//foreach
                      }//while
                    }//else
                  ?>
            </table>
            </p>
<!-- TASKS -->
            <h2 class="content-subhead">Current Tasks: </h2>
            <p>
                   <table>
                       <?php
                         ini_set("display_errors", true);
                         error_reporting(E_ALL);
                         $group = $_SESSION["gid"];
                         $sql = "SELECT name FROM task WHERE task.GID = '$group'";
                         $result = mysqli_query($db, $sql);

                         $count = mysqli_num_rows($result);
                         //php end tag here

                         if($count == 0){
                           $emptyMessage = "Your House currently has no tasks.";
                           echo $emptyMessage;
                         }
                         else{
                           while ($line = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
                               foreach ($line as $col_value) {
                                   echo "\t\t<tr><td>$col_value</td></tr>";
                               }//foreach
                           }//while
                         }//else
                       ?>
                  </table>
            </p>

<!-- EVENTS/SCHEDULE -->
            <h2 class="content-subhead">House schedule: </h2>
            <p>
	          <iframe src="https://calendar.google.com/calendar/embed?title=My%20Calendar&amp;height=600&amp;wkst=1&amp;bgcolor=%23FFFFFF&amp;src=greerjl%40plu.edu&amp;color=%2329527A&amp;ctz=America%2FLos_Angeles"
                  style="border-width:0" width="800" height="600" frameborder="0" scrolling="no"></iframe>
	          </p>

        </div><!-- content -->
    </div>
</div>
<footer>
    <div class="row">
        <div class="col-lg-12 footer l-box is-center">
            <p>Copyright &copy; 2016-2017 PLU Capstone. Authors <a target="_blank" href="https://www.linkedin.com/in/gagedgibson">Gage Gibson</a>,
<a target="_blank" href="https://www.linkedin.com/in/jaymegreer">Jayme Greer</a> and Caleb LaVergne.</p>
        </div>
    </div>
    <!-- /.row -->
</footer>
<script src="http://cs.plu.edu/~greerjl/CSCI499/ui.js"></script>

</body>
</html>
<?php }//if
else{
  redirect("./login.php");
}?>
