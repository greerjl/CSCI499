<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="stylesheet" type="text/css" href="../CSS/normalize.css"/>
    <link rel="stylesheet" type="text/css" href="../CSS/login.css"/>
    <link rel="icon" href="../images/HUM_logo.png">

    <title>HUM-login</title>

    <!-- Bootstrap core CSS -->
    <link href="../bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <link href="../../assets/css/ie10-viewport-bug-workaround.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="../bootstrap/css/starter-template.css" rel="stylesheet">
    <link href="../bootstrap/css/sticky-footer-navbar.css" rel="stylesheet">
    <link href="../bootstrap/css/signin.css" rel="stylesheet">
    
    <script src="../../assets/js/ie-emulation-modes-warning.js"></script>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

 </head>
 <nav class="navbar navbar-inverse navbar-fixed-top">
   <div class="container">
     <div class="navbar-header">
       <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
         <span class="sr-only">Toggle navigation</span>
         <span class="icon-bar"></span>
         <span class="icon-bar"></span>
         <span class="icon-bar"></span>
       </button>
       <a class="navbar-brand" href="#"> Home Utilities Manager </a>
     </div>
     <div id="navbar" class="collapse navbar-collapse">
       <ul class="nav navbar-nav">
         <li class="active"><a href="../index.html">Home</a></li>
         <li><a href="#chores">Chores</a></li>
         <li><a href="#tasks">Tasks</a></li>
         <li><a href="#events">Events</a></li>
         <li><a href="#schedule">Schedule</a></li>
         <li><a href="#settings">Settings</a></li>
         <li><a href="#logout">Log Out</a></li>
       </ul>
     </div><!--/.nav-collapse -->
   </div><!--./container -->
 </nav>
      <div class="container">

      <div class="starter-template">
        <div class="page-header">
            <h1>Home Utilities Manager</h1>
            <h2> An application housing all your home management needs.</h2>
        </div><!-- /.page-header-->
        <?php include 'dbconnect.php' ;?>
        <?php
          if($_SERVER["REQUEST_METHOD"] == "POST") {
          // username and password sent from form
            $myusername = mysqli_real_escape_string($db,$_POST['usnm']);
            $mypassword = mysqli_real_escape_string($db,$_POST['pswd']);

            $sql = "SELECT * FROM user_info WHERE username = '$myusername' and password = '$mypassword'";
            $result = mysqli_query($db,$sql);
            $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
            $active = $row['active'];

            $count = mysqli_num_rows($result);

            // If result matched $myusername and $mypassword, table row must be 1 row

            if($count == 1) {
              //session_register("myusername");
              //$_SESSION['login_user'] = $myusername;

              header("location: welcome.php");
            }else {
              echo "Your Login Name or Password is invalid";
            }//end else
          }//end POST if stmt
        ?>
        <div class="content">
            <form id="LogIn" class="form-signin" method="POST" action="">
            <h2 class="form-signin-heading"> Log In </h2>
            <label for="username" class="sr-only"> Email address </label>
            <input type="email" id="username" class="form-control" 
            name="usnm" placeholder="Email address" autofocus required>

            <label for="password" class="sr-only"> Password </label>
            <input type="password" id="password" name="pswd" 
            pattern="(?=.*\d).{6,}" class="form-control"
            placeholder="Password" required>

            <div class="checkbox">
              <label>
                <input type="checkbox" value="remember-me"> Remember me
              </label>
            </div>
            <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
          </form>
      <div class="signup">Don't have an account?<a href="./signup.php">Sign up</a></div>

      </div><!-- /.starter-template-->

    <footer class="footer">
      <div class="container">
        <p class="text muted">Capstone Production: September 2016 - May 2017. Authors <a href="https://www.linkedin.com/in/gagedgibson">Gage Gibson</a>,
        <a href="https://www.linkedin.com/in/jaymegreer">Jayme Greer</a> and Caleb LaVergne.</p>
      </div><!--/.container-->
    </footer>

    <!-- Le javascript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="../assets/js/jquery.js"></script>
    <script src="../assets/js/bootstrap-transition.js"></script>
    <script src="../assets/js/bootstrap-alert.js"></script>
    <script src="../assets/js/bootstrap-modal.js"></script>
    <script src="../assets/js/bootstrap-dropdown.js"></script>
    <script src="../assets/js/bootstrap-scrollspy.js"></script>
    <script src="../assets/js/bootstrap-tab.js"></script>
    <script src="../assets/js/bootstrap-tooltip.js"></script>
    <script src="../assets/js/bootstrap-popover.js"></script>
    <script src="../assets/js/bootstrap-button.js"></script>
    <script src="../assets/js/bootstrap-collapse.js"></script>
    <script src="../assets/js/bootstrap-carousel.js"></script>
    <script src="../assets/js/bootstrap-typeahead.js"></script>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery.min.js"><\/script>')</script>
    <script src="../bootsrap/js/bootstrap.min.js"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="../../assets/js/ie10-viewport-bug-workaround.js"></script>
    <script src="./ui.js"></script>
  </body>
</html>


