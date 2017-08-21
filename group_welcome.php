<?php
session_start();
$con=mysqli_connect("fdb17.your-hosting.net","2424765_splitup","splitup12","2424765_splitup") or die("Connection couldnot be established");
$name=$_SESSION['name'];

if(isset($_POST['submit']))
{
	if($_POST['submit']=="Show10")
	{
		$_SESSION['no_of_t']=10;
		header("Location:groupTshow.php");
	}
	if($_POST['submit']=="Show30")
	{
		$_SESSION['no_of_t']=30;
		header("Location:groupTshow.php");
	}
	if($_POST['submit']=="Who")
	{
		header("Location:group_pay.php");
	}
	if($_POST['submit']=="EGT")
	{
		header("Location:groupT.php");
	}		
}
?>

<html>
<head>
	<title><?php 
            $gname=$_SESSION['gname1'];
            echo $gname;
            ?>
    </title>
<link href="bootstrap-3.3.7-dist/css/bootstrap.css" rel="stylesheet" type="text/css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>

<body>
    <nav class="navbar navbar-default ">
       		<ul class="nav navbar-nav col-lg-8" >
                <li class="col-sm-offset-8"><a  href="welcome.php"><?php echo "<h3> $name </h3>";?></a>
                </li>    
            </ul>
    </nav>
    
    <nav class="navbar navbar-default">
          <ul class="nav navbar-nav">
                <li><a href="group.php"><span style="font-family: Segoe, 'Segoe UI', 'DejaVu Sans', 'Trebuchet MS', Verdana, sans-serif">Groups</span></a></li>
                <li><a href="daily_expenses.php">Daily Expenses</a></li>
                <li><a href="group_create.php">Create Group</a></li>
                
          </ul>
          <ul class="nav navbar-nav navbar-right">
                <li class="col-sm-3"><a href="logout.php"><span style="font-family: Segoe, 'Segoe UI', 'DejaVu Sans', 'Trebuchet MS', Verdana, sans-serif">Logout</span></a></li>
            </ul>
        </nav>
        <br>
        <div>
			<?php 
            $gname=$_SESSION['gname1'];
            echo"<h4>&nbsp;&nbsp;&nbsp;GROUP : $gname</h4>";
            ?>
		</div>
	<br>
	<div align="center">
	<form action="group_welcome.php" method="post">
                <div class="col-sm-12"><button class="btn btn-primary btn-lg" type="submit" name="submit" value="EGT" style="height:20%; width:40%">Enter Group Transaction</button></div>
                <div class="col-sm-12"><br></div>
                <div class="col-sm-12"><button class="btn btn-warning btn-lg" type="submit" name="submit" value="Who" style="height:20%; width:40%">Who has to pay how much?</button></div>
                <div class="col-sm-12"><br></div>
                <div class="col-sm-12"><button class="btn btn-danger btn-lg" type="submit" name="submit" value="Show30" style="height:20%; width:40%">Show the last 30 Transactions</button></div>
                <div class="col-sm-12"><br></div>
                <div class="col-sm-12"><button class="btn btn-success btn-lg" type="submit" name="submit" value="Show10" style="height:20%; width:40%">Show the last 10 Transactions</button></div>
                <div class="col-sm-12"><br></div>        
    </form>
	</div>
    <div class="col-sm-12"><br><br><br><br><br><br><br><br><br></div>
    <div class="col-sm-12">
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