<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Capstone" >
    <?php include '../../dbconnect.php'; ?>
    <title>My Dashboard</title>


    <!-- scripts for dynamic buttons -->

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    <script type="text/javascript" src="http://code.jquery.com/jquery-1.8.2.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
    <script type="text/javascript">
      $(function()
      {
          $('#idbtn').click(function()
          {
              $('#idtxt').clone().attr('id', 'idtxt' + $(this).index()).insertAfter('#idtxt');
          })
      })
    </script>
    <!-- Bootstrap Core CSS -->
    <link href="../bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!-- room form css -->
    <link href="../CSS/roomForm.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="../CSS/normalize.css"/> <!-- normalize -->
    <link rel="stylesheet" type="text/css" href="../CSS/psuedoWelcome.css"/> <!-- css -->
</head>

<body>
    <?php include '../../dbconnect.php'; ?>
    <?php include './PHP/createRoom.php'; ?>
<div id="layout">
  <div id="main">

      <div class="header">
        <h1>Home Utilities Manager</h1>
        <h2>An application housing all your home management needs. </h2>
      </div>


      <nav class="navbar navbar-inverse">
        <div class="container-fluid">
          <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#">WebSiteName</a>
          </div>
          <div class="collapse navbar-collapse" id="myNavbar">
            <ul class="nav navbar-nav">
              <li class="active"><a href="#">Home</a></li>
              <li class="dropdown">
                <a class="dropdown-toggle" data-toggle="dropdown" href="#">Page 1 <span class="caret"></span></a>
                <ul class="dropdown-menu">
                  <li><a href="#">Page 1-1</a></li>
                  <li><a href="#">Page 1-2</a></li>
                  <li><a href="#">Page 1-3</a></li>
                </ul>
              </li>
              <li><a href="#">Page 2</a></li>
              <li><a href="#">Page 3</a></li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
              <li><a href="#"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
              <li><a href="#"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
            </ul>
          </div>
        </div>
      </nav>



    <!-- Navigation -->
    <nav class="navbar navbar-inverse" role="navigation">
        <div class="container-fluid">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="./welcome.php">Dashboard</a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="myNavbar">
                <ul class="nav navbar-nav">
                    <li class="active"><a href="./houseSettings.php">House</a></li>
                    <li class="active"><a href="./choreSettings.php">Chores</a></li>
                    <li class="active"><a href="./taskSettings.php">Tasks</a></li>
                    <li class="active"><a href="./eventSettings.php">Events</a></li>
                    <li class="active"><a href="#"> My Settings </a></li>
                    <li><a href="./logout.php"> <span class="glyphicon glyphicon-log-out">
                    </span>Logout</a></li>
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
                <h1 class="page-header">House Settings
                    <small>Add rooms, invite members, or move out.</small>
                </h1>
            </div>
        </div>
        <!-- /.row -->

        <div class="container">
	         <div class="row">
             <div class="col-md-4">
                <?php require_once('../../dbconnect.php'); ?>
                <?php require_once('./PHP/createRoom.php'); ?>

                <div class="form_main">
                   <h4 class="heading"><strong>Add Rooms</strong> <span></span></h4>
                   <div class="form">
                     <form action="./PHP/createRoom.php" method="POST" id="roomForm" name="roomForm">
                       <input type="text" id="idtxt" required="" placeholder="Add Room" value="" name="room1" class="txt">

                       <input type="button" id="idbtn" value="Add Room" />
                       <br><br>
                       <input type="submit" value="Submit" name="submit" class="txt2">
                     </form>
                  </div>
                </div>
            </div>

					<div class="col-md-4">
		            <div class="form_main">
                  <h4 class="heading"><strong>Invite Members</strong> <span></span></h4>
                  <div class="form">
                    <form action="" method="POST" id="inviteForm" name="inviteForm">
                      <input type="text" id="idtxt" required="" placeholder="Add Member" value="" name="room" class="txt">
                      <br><br>
                      <input type="submit" value="Submit" name="submit" class="txt2">
                    </form>
                  </div>
               </div>

            </div><!-- col-md-4 -->
	        </div><!-- row -->
        </div><!-- container -->

        <hr>
                  <h4 class="heading"><strong>Ready to Move Out?<strong> <span></span></h4>
		  <form action="" method="POST" id="leaveGroupForm" name="leaveGroupForm">
                      <input type="submit" value="Leave Group" name="submit" class="txt2">
		  </form><!-- action = "./PHP/leaveGroup.php" or something like that -->

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

  </div><!--main-->
</div><!--layout-->

</body>

</html>
