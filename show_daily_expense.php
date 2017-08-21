<?php
session_start();
$con=mysqli_connect("fdb17.your-hosting.net","2424765_splitup","splitup12","2424765_splitup") or die("Connection couldnot be established");
$name=$_SESSION['name'];


if(isset($_POST['submit']))
{
	if($_POST['submit']=="last10")
	{
		$_SESSION['no_of_e']=10;
		header("Location:show_daily_expense1.php");
	}
	if($_POST['submit']=="last30")
	{
		$_SESSION['no_of_e']=30;
		header("Location:show_daily_expense1.php");
	}
	if($_POST['submit']=="all_transaction")
	{
		$_SESSION['no_of_e']=0;
		header("Location:show_daily_expense1.php");
	}	
}
?>

<html>
<head>
	<title>Daily Expenses Summary</title>
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
            <li><a href="add_expense.php">Add Expense</a></li>
            <li><a href="show_daily_expense.php">Show Daily Expenses</a></li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
           	<li class="col-lg-3"><a href="logout.php"><span style="font-family: Segoe, 'Segoe UI', 'DejaVu Sans', 'Trebuchet MS', Verdana, sans-serif">Logout</span></a></li>
        </ul>
    </nav>
   
   
    <br>
    <div align="center">
	<form action="show_daily_expense.php" method="post"  >
		<div class="col-sm-12"><button type="submit" class="btn btn-danger" name="submit" value="all_transaction" style="width: 40%; height: 20%; font-size: 18px;">Show all the Expenses</button></div>
        <div class="col-sm-12"><br></div>
		<div class="col-sm-12"><button type="submit" class="btn btn-success" name="submit" value="last30" style="width: 40%; height: 20%; font-size: 18px;">Show Last 30 Transactions</button></div>
        <div class="col-sm-12"><br></div>
		<div class="col-sm-12"><button type="submit" class="btn btn-primary" name="submit" value="last10" style="width: 40%; height: 20%; font-size: 18px;">Show Last 10 Transactions</button></div>
	</form>
    	<div class="col-sm-12"><br></div>
    </div>
	
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