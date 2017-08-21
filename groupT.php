<?php
session_start();
$con=mysqli_connect("fdb17.your-hosting.net","2424765_splitup","splitup12","2424765_splitup") or die("Connection couldnot be established");
$err=0;
$gid1=$_SESSION['gid1'];
$gname1=$_SESSION['gname1'];
$name=$_SESSION['name'];
$no=1;

$errorfrom='';
$errorto1='';
$errorto2='';
$errorto3='';
$errorto4='';
if(isset($_POST['submit']))
{
	if($_POST['submit']=="Add Expense")
	{
		$from=$_POST['from'];
		$to1=$_POST['to1'];
		$to2=$_POST['to2'];
		$to3=$_POST['to3'];
		$to4=$_POST['to4'];
		$description1=$_POST['description'];
		$notes1=$_POST['notes'];
		$amount1=$_POST['amount'];
		$date1=$_POST['date'];
		
		if($to1!='') $no++;
		if($to2!='') $no++;
		if($to3!='') $no++;
		if($to4!='') $no++;
		$amount11=$amount1/$no;
		
		$check="SELECT gname from grouplist WHERE gid='$gid1' AND (p1='$from' OR p2='$from' OR p3='$from' OR p4='$from' OR p5='$from')";
		$query=mysqli_query($con,$check);
		$count=mysqli_num_rows($query);
		if($count!=1)
		{
			$errorfrom="Please Enter correct name";
			$err=1;
		}
		
		$check="SELECT * from grouplist WHERE '$gid1'= gid AND ('$to1'=p1 OR '$to1'=p2 OR '$to1'=p3 OR '$to1'=p4 OR '$to1'=p5)";
		$query=mysqli_query($con,$check);
		$count=mysqli_num_rows($query);
		if($count!=1 || $from==$to1)
		{
			$errorto1="Please Enter correct name";
			$err=1;
		}
		
		
		$check="SELECT * from grouplist WHERE '$gid1'= gid AND ('$to2'=p1 OR '$to2'=p2 OR '$to2'=p3 OR '$to2'=p4 OR '$to2'=p5)";
		$query=mysqli_query($con,$check);
		$count1=mysqli_num_rows($query);
		if(($count1!=1||$from==$to2)&&$to2!='')
		{
			$errorto2="Please Enter correct name";
			$err=1;
		}
		
		$check="SELECT * from grouplist WHERE '$gid1'= gid AND ('$to3'=p1 OR '$to3'=p2 OR '$to3'=p3 OR '$to3'=p4 OR '$to3'=p5)";
		$query=mysqli_query($con,$check);
		$count1=mysqli_num_rows($query);
		if(($count1!=1||$from==$to3)&&$to3!='')
		{
			$errorto3="Please Enter correct name";
			$err=1;
		}
		
		$check="SELECT * from grouplist WHERE '$gid1'= gid AND ('$to4'=p1 OR '$to4'=p2 OR '$to4'=p3 OR '$to4'=p4 OR '$to4'=p5)";
		$query=mysqli_query($con,$check);
		$count1=mysqli_num_rows($query);
		if(($count1!=1||$from==$to4)&&$to4!='')
		{
			$errorto4="Please Enter correct name";
			$err=1;
		}
		
		if($err!=1)
		{
			if($to1!='')
			{
				$check="INSERT into $gname1 (from1,to1,description,amount,notes,date) values ('$from','$to1','$description1','$amount11','$notes1','$date1')";
				$query=mysqli_query($con,$check);
			}
			if($to2!='')
			{
				$check="INSERT into $gname1 (from1,to1,description,amount,notes,date) values ('$from','$to2','$description1','$amount11','$notes1','$date1')";
				$query=mysqli_query($con,$check);
			}
			if($to3!='')
			{
				$check="INSERT into $gname1 (from1,to1,description,amount,notes,date) values ('$from','$to3','$description1','$amount11','$notes1','$date1')";
				$query=mysqli_query($con,$check);
			}
			if($to4!='')
			{
				$check="INSERT into $gname1 (from1,to1,description,amount,notes,date) values ('$from','$to4','$description1','$amount11','$notes1','$date1')";
				$query=mysqli_query($con,$check);
			}
		}
	}

}


?>

<html>
<head>
	<title><?php 
            $gname=$_SESSION['gname1'];
            echo $gname;
            ?></title>
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
            <li><a href="groupT.php">Enter Group Transaction</a></li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
           	<li class="col-lg-3"><a href="logout.php"><span style="font-family: Segoe, 'Segoe UI', 'DejaVu Sans', 'Trebuchet MS', Verdana, sans-serif">Logout</span></a></li>
        </ul>
    </nav>
	<div>
			<?php 
            $gname=$_SESSION['gname1'];
            echo"<h4>&nbsp;&nbsp;&nbsp;GROUP : $gname</h4>";
            ?>
	</div>
	
	<div>
		<form action="groupT.php" method="post"><br><br>
            <div class="col-sm-12" align="center"><input name="from" type="text" class="input-lg" autocomplete="off" placeholder="The one who paid" style="width:25%"/><br><?php echo " ".$errorfrom;?><br><br></div>
            <div class="col-sm-6" align="center"><input type="text" name="to1" class="input-lg" autocomplete="off" placeholder="1st IOU" style="width:50%"/><br><?php echo " ".$errorto1;?><br><br></div>
            <div class="col-sm-6" align="center"><input type="text" name="to2" class="input-lg" autocomplete="off" placeholder="2nd IOU" style="width:50%"/><br><?php echo " ".$errorto2;?><br><br></div>
            <div class="col-sm-6" align="center"><input type="text" name="to3" class="input-lg"  autocomplete="off" placeholder="3rd IOU" style="width:50%"/><br><?php echo " ".$errorto3;?><br><br></div>
            <div class="col-sm-6" align="center"><input type="text" name="to4" class="input-lg"  autocomplete="off" placeholder="4th IOU" style="width:50%"/><br><?php echo " ".$errorto4;?><br><br></div>
            <div class="col-sm-6" align="center"><input name="description" type="text" class="input-lg"  autocomplete="off" placeholder="Description" style="width:50%"/><br><br><br></div>
            <div class="col-sm-6" align="center"><input name="amount" type="text" class="input-lg"  autocomplete="off" placeholder="Amount" style="width:50%"/><br><br><br></div>
           <div class="col-sm-6" align="center"> <input name="notes" type="text" class="input-lg"  autocomplete="off" placeholder="Notes" style="width:50%"/><br><br><br></div>
            <div class="col-sm-6" align="center"><input type="date" name="date" class="input-lg"  autocomplete="off" placeholder="Date" style="width:50%"/><br><br></div>
            <div class="col-sm-12" align="center"><input name="submit" type="submit" class="btn btn-lg btn-success" value="Add Expense" style="width:27%"/><br><br></div>
		</form>
	<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
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