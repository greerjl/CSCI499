<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <?php include '../../dbconnect.php'; ?>

    <title>Profile Settings</title>

    <!-- Bootstrap Core CSS -->
    <link href="../bootstrap/css/bootstrap.min.css" rel="stylesheet">
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
    <script type="text/javascript" src="http://code.jquery.com/jquery-1.8.2.js"></script>
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
        <h1>Home Utilities Manager</h1>
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

                    <li>
                        <a href="./houseSettings.php">House</a>
                    </li>
                    <li>
                        <a href="./choreSettings.php">Chores</a>
                    </li>
                    <li>
                        <a href="./taskSettings.php">Tasks</a>
                    </li>
                    <li>
                        <a href="./eventSettings.php">Events</a>
                    </li>
                    <li>
                        <a href="#"> My Settings </a>
                    </li>
                    <li>
                        <a href="./logout.php"> Logout </a>
                    </li>
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
                <h1 class="page-header">Task Settings
                    <small>Add tasks that need to be done.</small>
                </h1>
            </div>
        </div>
        <!-- /.row -->

        <div class="container">
	         <div class="row">
             <div class="col-md-4">

		             <div class="form_main">
                   <h4 class="heading"><strong>Add a Task</strong> <span></span></h4>
                   <div class="form">
                     <form action="" method="POST" id="taskForm" name="taskForm">
                       <input type="text" id="idtxt" required="" placeholder="Add a Task" value="" name="task" class="txt">
                       <input type="button" id="idbtn" value="Add Task" />
                       <br><br>
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
  </div><!--main-->
</div><!--layout-->
</body>

</html>
