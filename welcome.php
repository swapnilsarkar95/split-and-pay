<?php
session_start();
$con=mysqli_connect("fdb17.your-hosting.net","2424765_splitup","splitup12","2424765_splitup") or die("Connection couldnot be established");
$name=$_SESSION['name'];
?>

<html>
<head>
	<title><?php echo $name;?></title>
<link href="bootstrap-3.3.7-dist/css/bootstrap.css" rel="stylesheet" type="text/css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

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
            <li><a href="group.php">Groups</a></li>
            <li><a href="daily_expenses.php">Daily Expenses</a></li>
            <li><a href="find_atm.php">Find ATM</a></li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
           	<li class="col-lg-3"><a href="logout.php">Logout</a></li>
      </ul>
    </nav>
    
    <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
    <div>
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
	</div>
</body>
</html>