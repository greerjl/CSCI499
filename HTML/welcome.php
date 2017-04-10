<!DOCTYPE html>
<?php session_start(); ?>
<?php require_once("./PHP/functions.php");
//if($_SESSION["valid"]==true){?>
<html lang="en">
<head>
   <meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Home Utilities Manager &ndash; </title>
	<link rel="stylesheet" href="http://yui.yahooapis.com/pure/0.6.0/pure-min.css">
	<link rel="stylesheet" type="text/css" href="../CSS/normalize.css"/> <!-- normalize -->
	<link rel="stylesheet" type="text/css" href="../CSS/welcome.css"/> <!-- css -->

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
    <!-- Menu toggle -->
    <a href="#menu" id="menuLink" class="menu-link">
        <!-- Hamburger icon -->
        <span></span>
    </a>

    <div id="menu">
        <div class="pure-menu">
            <a class="pure-menu-heading" href="../index.html">HUM</a>

            <ul class="pure-menu-list">

                <li class="pure-menu-item"><a href="./houseSettings.php" class="pure-menu-link">My Dashboard</a></li>

                <li class="pure-menu-item"><a href="./logout.php" class="pure-menu-link">Log Out</a></li>

            </ul>
        </div>
    </div>

    <div id="main">
        <div class="header">
            <h1>Home Utilities Manager</h1>
            <h2>An application housing all your home management needs. </h2>
        </div>



        <div class="content">
            <h2 class="content-subhead">Your Chore: </h2>
            <p>
					         <?php include '../../dbconnect.php';?>
                   <table>
                     <tr><td>
                        <?php
                          ini_set("display_errors", true);
                          error_reporting(E_ALL);
                        	$user = $_SESSION["login_user"];
                          //echo $user;
                          $sql = "SELECT description FROM user_info, chore WHERE username = '$user' AND user_info.UID = chore.UID";
                          $result = mysqli_query($db, $sql);

                          $count = mysqli_num_rows($result);

                          if($count == 0){
                            die('Error!');
                          }
                          else{
                          	echo "<table>\n";
                          	while ($line = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
                           	echo "\t<tr>\n";
                           	foreach ($line as $col_value) {
                           		echo "\t\t<td>$col_value</td>\n";
                        		}//foreach
                        		echo "\t</tr>\n";
                           }//while
                           echo "</table>\n";
                          }//else
                        ?>
                    </td></tr>
                  </table>
            </p>

            <h2 class="content-subhead">Your schedule: </h2>
            <p>
	<iframe src="https://calendar.google.com/calendar/embed?title=My%20Calendar&amp;height=600&amp;wkst=1&amp;bgcolor=%23FFFFFF&amp;src=greerjl%40plu.edu&amp;color=%2329527A&amp;ctz=America%2FLos_Angeles" style="border-width:0" width="800" height="600" frameborder="0" scrolling="no"></iframe>
	</p>

        </div>
    </div>
</div>

<script src="http://cs.plu.edu/~greerjl/CSCI499/ui.js"></script>

</body>
</html>
<?php // }//if ?>
