<?php
session_start();
$con=mysqli_connect("fdb17.your-hosting.net","2424765_splitup","splitup12","2424765_splitup") or die("Connection couldnot be established");

$msg='';
$name=$_SESSION['name'];

if(isset($_POST['submit']))
{

	if($_POST['submit']=='Add Expense')
	{
		
		$name=$_SESSION['name'];
	
		$person1=$_POST['person'];	
		$description1=$_POST['description'];
		$amount1=$_POST['amount'];
		$date1=$_POST['date'];
		$notes1=$_POST['notes'];
		
		$check="INSERT into $name(description,amount,person,date,notes) values('$description1','$amount1','$person1','$date1','$notes1')";
		$query=mysqli_query($con,$check);
		if($query==true)
			$msg='Expense has been Added';
		else
			$msg='Expense couldnot be Added';
	}
}
?>

<html>
<head>
	<title>Daily Expenses - Add Expense</title>
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
            
            <li><a href="group.php">Groups</a></li>
            <li><a href="daily_expenses.php">Daily Expenses</a></li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
           	<li class="col-lg-3"><a href="logout.php"><span style="font-family: Segoe, 'Segoe UI', 'DejaVu Sans', 'Trebuchet MS', Verdana, sans-serif">Logout</span></a></li>
        </ul>
    </nav>
	<div align="center">
	<form action="add_expense.php" method="post" ><br><br>
		<div class="col-sm-12"><input name="description" type="text" class="input-lg" autocomplete="off" placeholder="Description"/><br><br></div>
        <div class="col-sm-6"><input name="amount" type="text" class="input-lg" autocomplete="off" placeholder="Amount"/><br><br></div>
        <div class="col-sm-6"><input name="person" type="text" class="input-lg" autocomplete="off" placeholder="Person"/><br><br></div>
        <div class="col-sm-6"><input name="date" type="date" class="input-lg" autocomplete="off" placeholder="Date"/><br><br></div>
        <div class="col-sm-6"><input name="notes" type="text" class="input-lg" autocomplete="off" placeholder="Notes"/><br><br></div>
		<input name="submit" type="submit" class="btn btn-lg btn-success" value="Add Expense"/><br><br><br><?php echo "<h4>$msg</h4>" ?><br>
	</form>
    <br><br><br>
    </div>
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