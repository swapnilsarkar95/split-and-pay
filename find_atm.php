<?php
session_start();
$con=mysqli_connect("fdb17.your-hosting.net","2424765_splitup","splitup12","2424765_splitup") or die("Connection couldnot be established");
$name=$_SESSION['name'];
$n="Chennai";

if(isset($_POST['submit']))
{
	$n=$_POST['place'];
}

?>

<html>
<head>
	<title>WELCOME</title>
<link href="bootstrap-3.3.7-dist/css/bootstrap.css" rel="stylesheet" type="text/css">
</head>

<body>
	
       <nav class="navbar navbar-default ">
       		<ul class="nav navbar-nav col-lg-8" >
                <li class="col-lg-offset-8"><a  href="welcome.php"><?php echo "<h3> $name </h3>";?></a>
                </li>    
            </ul>
       </nav>
    
	<nav class="navbar navbar-default">
      <ul class="nav navbar-nav">
            <li><a href="group.php">GROUPS</a></li>
            <li><a href="daily_expenses.php">Daily Expenses</a></li>
            <li><a href="find_atm.php">FIND ATM</a></li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
           	<li class="col-lg-3"><a href="logout.php">Logout</a></li>
        </ul>
    </nav>
    
    <div>
    	<form action="find_atm.php" method="post" class="col-lg-offset-3">
        	
       	  <input name="place" type="text" class="btn-lg" value="<?php echo $n; ?>
"/>
          <input name="submit" type="submit" class="btn btn-lg col-lg-offset-1" value="Search"/> 
   	  </form>
    </div>
</body>
</html>



<html>
<body>
<iframe width="1366" height="650" frameborder="1" style="border:0" 
src="https://www.google.com/maps/embed/v1/search?q=All+ATM+<?php echo $n;?>
&key=AIzaSyBjGeJ8T4F80aZye84Wcid2tVcH6kLesnA" allowfullscreen></iframe>
<div class="panel-footer" style="background:#666666">
	<div class="about_us">
            <div style="font-size: 24px; margin-top: 0; line-height: 30px; color:#FBF8F8 " align="center">
              Made with ☻ in Chennai, Tamil Nadu.
            </div>      
    </div>
    <div id="copyright" style="margin: 15px 0 5px;color:#FBF8F8 " align="center">
              Copyright © 2017 Split & Pay, Inc. All rights reserved.
    </div>
    
</div>
  </body>
  </html>
  