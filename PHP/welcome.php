<!DOCTYPE html>
<html>
   <head>
      <title>Welcome </title>
   </head>
   
   <body>
   <?php
   include('session.php');
	?>
      <h1>Welcome <?php echo $login_session; ?></h1> 
      <h2><a href = "logout.php">Sign Out</a></h2>
   </body>
   
</html>