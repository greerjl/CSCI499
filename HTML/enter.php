<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <link rel="stylesheet" type="text/css" href="../CSS/normalize.css"/>
    <link rel="stylesheet" type="text/css" href="../CSS/login.css"/>
    <link rel="icon" href="../bootstrap/favicon.ico">

    <title>HUM-login</title>

    <!-- Bootstrap core CSS -->
    <link href="../bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <link href="../../assets/css/ie10-viewport-bug-workaround.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="starter-template.css" rel="stylesheet">

    <script src="../../assets/js/ie-emulation-modes-warning.js"></script>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    <!-- CSS -->
    <link href="../bootstrap/css/bootstrap.css" rel="stylesheet">
    <style type="text/css">

      /* Sticky footer styles
      -------------------------------------------------- */

      html,
      body {
        height: 100%;
        /* The html and body elements cannot have any padding or margin. */
      }

      /* Wrapper for page content to push down footer */
      #wrap {
        min-height: 100%;
        height: auto !important;
        height: 100%;
        /* Negative indent footer by it's height */
        margin: 0 auto -60px;
      }

      /* Set the fixed height of the footer here */
      #push,
      #footer {
        height: 60px;
      }
      #footer {
        background-color: #f5f5f5;
      }

      /* Lastly, apply responsive CSS fixes as necessary */
      @media (max-width: 767px) {
        #footer {
          margin-left: -20px;
          margin-right: -20px;
          padding-left: 20px;
          padding-right: 20px;
        }
      }



      /* Custom page CSS
      -------------------------------------------------- */
      /* Not required for template or sticky footer method. */

      .container {
        width: auto;
        max-width: 680px;
      }
      .container .credit {
        margin: 20px 0;
      }

    </style>
    <link href="../bootstrap/css/bootstrap-responsive.css" rel="stylesheet">

    <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="../assets/js/html5shiv.js"></script>
    <![endif]-->

   
  </head>

  <body>

    <nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#">Home Utilities Manager</a>
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
      </div>
    </nav>

    <div class="container">

      <div class="starter-template">
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
                      }
                   }
                ?>

      </div>

    </div><!-- /.container -->

     <!-- Part 1: Wrap all page content here -->
    <div id="wrap">

      <!-- Begin page content -->
      <div class="container">
        <div class="page-header">
          <h1>Home Utilities Manager</h1>
          <h2> An application housing all your home management needs.</h2>
        </div>
            <div class="content">
              <form id="LogIn" class="pure-form pure-form-aligned" method="POST" action="">
                  <fieldset>
                      <legend> Log In </legend>
                        <div class="pure-control-group">
                            <label for="username"> User name: <em>*</em> </label>
                            <input type="text" id="username" name="usnm" autofocus required>
                        </div> <div class="pure-control-group">
                            <label for="password"> Password:
                            <em>*</em>
                            </label>
                            <input type="password" id="password" name="pswd" pattern="(?=.*\d).{6,}"placeholder="Must contain 6 or more characters and at least one number)" required>
                        </div>
                  </fieldset>

                  <p><input type="submit" value="Log In"></p>

              </form>

                <div class="signup">Don't have an account?<a href="./signup.php">Sign up</a>
                </div>
            </div>
      </div>

      <div id="push"></div>
    </div>

    <div id="footer">
      <div class="container">
        <p class="muted credit">Capstone Production: September 2016 - May 2017. Authors <a href="https://www.linkedin.com/in/gagedgibson">Gage Gibson</a>, <a href="https://www.linkedin.com/in/jaymegreer">Jayme Greer</a> and Caleb LaVergne.</p>
      </div>
    </div>



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
    <script src="../../dist/js/bootstrap.min.js"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="../../assets/js/ie10-viewport-bug-workaround.js"></script>
    <script src="./ui.js"></script>
  </body>
</html>


