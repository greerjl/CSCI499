<!DOCTYPE html>
<html>
<title>Settings</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
html,body,h1,h2,h3,h4,h5 {font-family: "Raleway", sans-serif}
</style>
<body class="w3-light-grey">

<!-- Top container -->
<div class="w3-bar w3-top w3-black w3-large" style="z-index:4">
  <button class="w3-bar-item w3-button w3-hide-large w3-hover-none w3-hover-text-light-grey" onclick="w3_open();"><i class="fa fa-bars"></i>  Menu</button>
  <span class="w3-bar-item w3-right">HUM</span>
</div>

<!-- Sidebar/menu -->
<nav class="w3-sidebar w3-collapse w3-white w3-animate-left" style="z-index:3;width:300px;" id="mySidebar"><br>
  <div class="w3-container w3-row">
    <div class="w3-col s4">
      <i class="fa fa-user-circle-o" style="font-size:48px;"></i> 
    </div>
    <div class="w3-col s8 w3-bar">
      <span>Welcome!</span><br>
    </div>
  </div>
  <hr>
  <div class="w3-container">
    <h5>Dashboard</h5>
  </div>
  <div class="w3-bar-block">
    <a href="#" class="w3-bar-item w3-button w3-padding-16 w3-hide-large w3-dark-grey w3-hover-black" onclick="w3_close()" title="close menu"><i class="fa fa-remove fa-fw"></i>  Close Menu</a>
    <a href="../index.html" class="w3-bar-item w3-button w3-padding"><i class="fa fa-home fa-fw"></i>  Home</a>
    <a href="#" class="w3-bar-item w3-button w3-padding"><i class="fa fa-cog fa-fw"></i> Settings</a>  
    <a href="#" class="w3-bar-item w3-button w3-padding"><i class="fa fa-sign-out"></i>  Sign Out</a><br><br>
  </div>
</nav>


<!-- Overlay effect when opening sidebar on small screens -->
<div class="w3-overlay w3-hide-large w3-animate-opacity" onclick="w3_close()" style="cursor:pointer" title="close side menu" id="myOverlay"></div>

<!-- !PAGE CONTENT! -->
<div class="w3-main" style="margin-left:300px;margin-top:43px;">

  <!-- Header -->
  <header class="w3-container" style="padding-top:22px">
    <h5><b><i class="fa fa-dashboard"></i> My Dashboard</b></h5>
  </header>

  <div class="w3-row-padding w3-margin-bottom">
    <div class="w3-quarter">
      <div class="w3-container w3-text-white w3-padding-16" style="background-color:#0078e7">
        <div class="w3-left"><i class="fa fa-comment w3-xxxlarge"></i></div>
        <div class="w3-right">
        </div>
        <div class="w3-clear"></div>
        <h4>Chores</h4>
      </div>
    </div>
    <div class="w3-quarter">
      <div class="w3-container w3-text-white w3-padding-16"style="background-color:#0078e7">
        <div class="w3-left"><i class="fa fa-calendar-plus-o w3-xxxlarge"></i></div>
        <div class="w3-right">
        </div>
        <div class="w3-clear"></div>
        <h4>Events</h4>
      </div>
    </div>
    <div class="w3-quarter">
      <div class="w3-container w3-text-white w3-padding-16"style="background-color:#0078e7">
        <div class="w3-left"><i class="fa fa-check-square-o w3-xxxlarge"></i></div>
        <div class="w3-right">
        </div>
        <div class="w3-clear"></div>
        <h4>Tasks</h4>
      </div>
    </div>
    <div class="w3-quarter">
      <div class="w3-container w3-text-white w3-padding-16"style="background-color:#0078e7">
        <div class="w3-left"><i class="fa fa-users w3-xxxlarge"></i></div>
        <div class="w3-right">
        </div>
        <div class="w3-clear"></div>
        <h4>Groups</h4>
      </div>
    </div>
  </div>

  <hr>
  <div class="w3-container">
    <h5>User Profile Completion</h5>
    <div class="w3-grey">
      <div class="w3-container w3-center w3-padding" style="width:25%;background-color:#0078e7;color:white">25%</div>
    </div>

  <hr>
  <form>
  <fieldset> <i class="fa fa-address-card-o"></i> User Information <br><br>
  <div class="w3-container">
    <div class="w3-row">
      <div class="w3-col m2 text-center">
        <img class="w3-circle" src="http://sunfieldfarm.org/wp-content/uploads/2014/02/profile-placeholder.png" style="width:96px;height:96px">
        <a target="_blank" href=""> Upload </a> 
      </div>
    </div>
  </div>
  <br>
  Name: <br>
  <input type="text" name="name"placeholder="Mickey Mouse"> <br>
  Phone Number: <br>
  <input type="tel" name="phonenumber" placeholder="(555) 555-5555"> <br><br>
  <input type="submit" value="Submit Changes">
  </fieldset> <br>
  <button type="button"style="float:right;color:white;background-color:#f44336"> Delete Account </button>

  </form>
  <!-- Footer -->
  <footer class="w3-container w3-padding-16 w3-light-grey">
    <p>Capstone Production: September 2016 - May 2017. Authors <a target="_blank" href="https://www.linkedin.com/in/gagedgibson">Gage Gibson</a>,
        <a target="_blank" href="https://www.linkedin.com/in/jaymegreer">Jayme Greer</a> and Caleb LaVergne.</p>
  </footer>

  <!-- End page content -->
</div>

<script>
// Get the Sidebar
var mySidebar = document.getElementById("mySidebar");

// Get the DIV with overlay effect
var overlayBg = document.getElementById("myOverlay");

// Toggle between showing and hiding the sidebar, and add overlay effect
function w3_open() {
    if (mySidebar.style.display === 'block') {
        mySidebar.style.display = 'none';
        overlayBg.style.display = "none";
    } else {
        mySidebar.style.display = 'block';
        overlayBg.style.display = "block";
    }
}

// Close the sidebar with the close button
function w3_close() {
    mySidebar.style.display = "none";
    overlayBg.style.display = "none";
}
</script>

</body>
</html>
