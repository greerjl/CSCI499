<!DOCTYPE html>
<?php session_start();
include '../../dbconnect.php';
require_once("./PHP/functions.php");
ini_set("display_errors", true);
error_reporting(E_ALL);
if($_SESSION["valid"]==true){?>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--<link rel="stylesheet" href="http://yui.yahooapis.com/pure/0.6.0/pure-min.css">-->
    <link rel="stylesheet" type="text/css" href="../CSS/normalize.css"/>
    <link rel="stylesheet" type="text/css" href="../CSS/welcome.css"/>
    <link rel="icon" href="../images/logo.png">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>

    <title>Home Utilities Manager &ndash; </title>
    <!--<link href="../bootstrap/css/bootstrap.css" rel="stylesheet">-->
    <style>
      @media (max-width: 550px) {
          .big-container {
          display: none;
          }
      }
      @media (min-width: 550px) {
          .small-container {
          display: none;
          }
      }
      /* Responsive iFrame */
      .responsive-iframe-container {
          position: relative;
          padding-bottom: 56.25%;
          padding-top: 30px;
          height: 0;
          overflow: hidden;
      }
      .responsive-iframe-container iframe,
      .vresponsive-iframe-container object,
      .vresponsive-iframe-container embed {
          position: absolute;
          top: 0;
          left: 0;
          width: 100%;
          height: 100%;
      }
    </style>
  </head>
  <body>
    <div id="layout">
      <div id="main">

        <div class="header">
          <h1>House Utilities Manager</h1>
          <h2>An application housing all your home management needs. </h2>
        </div>
     <nav class="navbar navbar-default">
       <div class="container-fluid">
         <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#mainNavBar" aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
             </button>
             <a class="navbar-brand active" href="#">My Dashboard<span class="sr-only">(current)</span></a>
         </div>
         <div class="collapse navbar-collapse" id="mainNavBar">
           <ul class="nav navbar-nav">
             <li><a href="./houseSettings.php">House</a></li>
             <li><a href="./choreSettings.php">Chores</a></li>
             <li><a href="./taskSettings.php">Tasks</a></li>
             <li><a href="./eventSettings.php">Events</a></li>
             <li><a href="./userSettings.php">My Settings</a></li>
             <li><a href="./logout.php">Logout</a></li>
           </ul>
         </div><!-- /.navbar-collapse -->
       </div><!-- /.container-fluid -->
     </nav>
   <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js">        </script>
   <?php
     $userID = $_SESSION["login_user"];
     $sql = "SELECT GID FROM sys.user_info WHERE UID = '$userID'";
     $result = mysqli_query($db, $sql);
     $obj = mysqli_fetch_object($result);
     $userGID = $obj->GID;
     if($userGID == '0'){
   ?>
     <div class="header">
     <h2>Please create a group in order to view its information.</h2>
     <h4>Click <a href="./houseSettings.php">here</a> to do so.</h4>
     </div><!--header-->
   <?php }//if
     elseif($userGID!='0'){ ?>

 <!--House info-->
   <div class="houseinfo col-md-4">
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

   <div class="content col-md-4">
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
        <div class="responsive-iframe-container big-container">
           <p>
             <?php
               $group = $_SESSION["gid"];
               $sql = "SELECT name, time FROM event WHERE event.GID = '$group'";
               $result = mysqli_query($db, $sql);

               $count = mysqli_num_rows($result);
               //php end tag here

               if($count == 0){
                 $emptyMessage = "Your House currently has no upcoming events.";
                 echo $emptyMessage;
               }
               else{
                 $i = 1;
                 while ($line = mysqli_fetch_assoc($result)) {
                     $name = $line['name'];
                     $time = $line['time'];
                     echo "\t\t<tr><td><strong>Event $i: <strong></td><td><strong>$name</strong></td><td> at $time.</td></tr><br/>";
                     $i = $i+1;
                 }//while
               }//else

               $y = $_GET['y'] ?  $_GET['y'] : date('Y');
               $m = $_GET['m'] ?  $_GET['m'] : date('m');
               //display 5 next and 5 previous years of selected year
               for ($i=$y-5; $i<=$y+5; $i++){
                   echo '<a href="index.php?y='.$i.'&m='.$m.'">'.$i.'</a>&nbsp&nbsp;';
               }
               echo "<br><br>";

               //months array just like Jan,Feb,Mar,Apr in short format
               $m_array = array('1'=>'Jan', '2'=>'Feb', '3'=>'Mar', '4'=>'Apr', '5'=>'May', '6'=>'Jun', '7'=>'Jul', '8'=>'Aug', '9'=>'Sep', '10'=>'Oct', '11'=>'Nov', '12'=>'Dec');
               //display months
               foreach ($m_array as $key=>$val){
                   echo '<a href="index.php?y='.$y.'&m='.$key.'">'.$val.'</a>&nbsp&nbsp;';
               }
               echo "<br><br>";

               $d_array = array('1'=>31, '2'=>28, '3'=>31, '4'=>30, '5'=>31, '6'=>30, '7'=>31, '8'=>31, '9'=>30, '10'=>31, '11'=>30, '12'=>31);
               $d_m = ($m==2 && $y%4==0)?29:$d_array[$m];
               echo '<table><tr><th colspan="7">'.$m_array[$m].'&nbsp'.$y.'</th></tr><tr>';
               //days array
               $days_array = array('1'=>'Mon', '2'=>'Tue', '3'=>'Wed', '4'=>'Thu', '5'=>'Fri', '6'=>'Sat', '7'=>'Sun');
               //display days
               foreach ($days_array as $key=>$val){
                   echo '<th>'.$val.'</th>';
               }
               echo "</tr></tr>";
               $date = $y.'-'.$m.'-01';
               //find start day of the month
               $startday = array_search(date('D',strtotime($date)), $days_array);
               //daisplay month dates
               for($i=0; $i<($d_m+$startday); $i++){
                   $day = ($i-$startday+1<=9)?'0'.($i-$startday+1):$i-$startday+1;
                   echo ($i<$startday)?'<td></td>':'<td>'.$day.'</td>';
                   echo ($i%7==0)?'</tr><tr>':'';
               }
               //calculate next & prev month
               $next_y=(($m+1)>12)?($y+1):$y;
               $next_m=(($m+1)>12)?1:($m+1);
               $prev_y=(($m-1)<=0)?($y-1):$y;
               $prev_m=(($m-1)<=0)?12:($m-1);
               //daisplay next prev
               echo '<tr><td><a href="index.php?y='.$prev_y.'&m='.$prev_m.'">Prev</a></td><td></td><td></td><td></td><td></td><td></td><td><a href="index.php?y='.$next_y.'&m='.$next_m.'">Next</a></td></tr>';
             ?>
       </div>
        <div class="responsive-iframe-container small-container">
         <iframe src="https://calendar.google.com/calendar/embed?title=HUM&amp;mode=AGENDA&amp;height=600&amp;wkst=1&amp;bgcolor=%23FFFFFF&amp;src=greerjl%40plu.edu&amp;color=%23875509&amp;src=jaymelgreer%40gmail.com&amp;color=%23B1440E&amp;ctz=America%2FLos_Angeles" style="border-width:0" width="550" height="600" frameborder="0" scrolling="no"></iframe>
       </div>
   </div><!-- content -->
   <?php }//elseif ?>

 </div><!--main-->
 </div><!--layout-->

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
 </body>
 </html>
 <?php }//if
 else{
 redirect("./login.php");
 }?>
