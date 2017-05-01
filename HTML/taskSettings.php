<!DOCTYPE html>
<html lang="en">
<?php session_start();
include '../../dbconnect.php';
require_once("./PHP/functions.php");
if($_SESSION["valid"]==true){?>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Capstone" >
    <link rel="icon" href="../images/logo.png">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>

    <title>Task Settings</title>

    <!-- task form css -->
    <link href="../CSS/roomForm.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="../CSS/normalize.css"/> <!-- normalize -->
    <link rel="stylesheet" type="text/css" href="../CSS/psuedoWelcome.css"/> <!-- css -->

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    <script type="text/javascript">
      $(function()
      {
          $('#idbtn').click(function()
          {
              $('#idtxt').clone().attr('id', 'idtxt' + $(this).index()).insertAfter('#idtxt');
          })
      })
    </script>
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
            <li class="active"><a href="./taskSettings.php">Tasks <span class="sr-only">(current)</span></a></li>
            <li><a href="./eventSettings.php">Events</a></li>
            <li><a href="./userSettings.php">My Settings</a></li>
            <li><a href="./logout.php">Logout</a></li>
          </ul>
        </div><!-- /.navbar-collapse -->
      </div><!-- /.container-fluid -->
    </nav>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js">        </script>

    <!-- Page Content -->
    <div class="container">

        <!-- Page Heading -->
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Task Settings
                    <small>Add tasks that need to be done.</small>
                </h1>
            </div>
        </div>
        <!-- /.row -->

        <?php if($_SESSION["tErr"] == 1){ ?>
          <div class="alert alert-danger">
            <strong>Error!</strong> That task already exists!
          </div>
        <?php $_SESSION["tErr"] = 0;
            }else if($_SESSION["taskSuc"] == 1){ ?>
          <div class="alert alert-success">
            <strong>Success!</strong> Task successfully created!
          </div>
        <?php $_SESSION["taskSuc"] = 0;
            }else if($_SESSION["createErr"] == 1){ ?>
          <div class="alert alert-danger">
            <strong>Error!</strong> Something went wrong, task was not created. Try again later.
          </div>
        <?php $_SESSION["createErr"] = 0; }?>

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
                   <h4 class="heading"><strong>Add a Task</strong> <span></span></h4>
                   <div class="form">
                     <form action="./PHP/processTaskForm.php" method="POST" id="taskForm" name="taskForm">
                       <input type="text" id="idtxt" required="" placeholder="Add a Task" value="" name="task" class="txt">
                       <input type="date" required="" value="" name="taskDate" class="date">
                       <!--input type="button" id="idbtn" value="Add Task" /-->
                       <br><br>
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
        <footer class="navbar-fixed-bottom">
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

  </div><!--main-->
</div><!--layout-->
</body>

</html>
<?php }//if
else{
  redirect("./login.php");
}?>
