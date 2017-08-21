<?php
session_start();
$con=mysqli_connect("fdb17.your-hosting.net","2424765_splitup","splitup12","2424765_splitup") or die("Connection could not be established");
$errorgname="";
$errorp0="";
$errorp1="";
$msg="";
$i=0;
$error=false;
$name=$_SESSION['name'];

if(isset($_POST['submit']))
{
	$gname=$_POST['gname'];
	$ownerID=$_SESSION['id'];
	$p[0]=$_POST['p1'];
	$p[1]=$_POST['p2'];
	$p[2]=$_POST['p3'];
	$p[3]=$_POST['p4'];
	$p[4]=$_POST['p5'];

	$gname=trim($gname);
	$gname=strip_tags($gname);
	$gname=htmlspecialchars($gname);
	
	for($i=0;$i<5;$i++)
	{
		$p[$i]=trim($p[$i]);
		$p[$i]=strip_tags($p[$i]);
		$p[$i]=htmlspecialchars($p[$i]);
	}
	$count=0;
	$gnamecheck="SELECT  gname from grouplist WHERE gname='$gname'";
	$result1=mysqli_query($con,$gnamecheck);
	$count=mysqli_num_rows($result1);
	
	$count2=0;
	$gnamecheck2="SELECT  name from users WHERE name='$gname'";
	$result2=mysqli_query($con,$gnamecheck2);
	$count2=mysqli_num_rows($result2);
	
	if($count>0)
	{
		$errorgname="Group Name already exists!";
		$error=TRUE;
	}
	elseif($count2!=0)
	{
		$errorgname="User already exists of this name!";
		$error=TRUE;
	}
	
	
	if(empty($p[0]))
	{
		$errorp0="Enter the name of first person.";
		$error=true;
	}
	if(empty($p[1]))
	{
		$errorp1="Enter the name of the second person.";
		$error=true;
	}
	
	if(!$error)
	{	$oid=$_SESSION['id'];
		$query="INSERT into grouplist(gname,ownerID,p1,p2,p3,p4,p5) values('$gname','$oid','$p[0]','$p[1]','$p[2]','$p[3]','$p[4]')";
		if(mysqli_query($con,$query)==true)
		{
			$create="CREATE table $gname(tid INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY, from1 VARCHAR(30) NOT NULL, to1 VARCHAR(30) NOT NULL,description VARCHAR(40),amount FLOAT,notes VARCHAR(50), date DATE)";
			if(mysqli_query($con,$create)==true)
			{
				$msg="<h3>Group was Created Successfully.</h3>";
			}
			else
				$msg="<h3>Group creation failure";
		}
		else
			$msg="<h3>Group creation failure";
	}
}
?>
<html>
<head>
<title>Group - Creation</title>
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
                
          </ul>
          <ul class="nav navbar-nav navbar-right">
                <li class="col-lg-3"><a href="logout.php"><span style="font-family: Segoe, 'Segoe UI', 'DejaVu Sans', 'Trebuchet MS', Verdana, sans-serif">Logout</span></a></li>
            </ul>
        </nav>
        <br>
        <h2 align="center">Create Group</h2><br>
<form action="group_create.php" method="post" >
<div class="col-sm-6" align="center"><input  name="gname" type="text" class="input-lg" placeholder="Group Name"/><br><?php echo $errorgname; ?><br><br></div>
<div class="col-sm-6" align="center"><input name="p1" type="text" class="input-lg" placeholder="1st Member" autocomplete="off"/><br><?php echo $errorp0; ?><br><br></div>
<div class="col-sm-6" align="center"><input name="p2" type="text" class="input-lg" placeholder="2nd Member" autocomplete="off"/><br><?php echo $errorp1 ?><br><br></div>
<div class="col-sm-6" align="center"><input name="p3" type="text" class="input-lg" placeholder="3rd Member" autocomplete="off"/><br><br><br></div>
<div class="col-sm-6" align="center"><input name="p4" type="text" class="input-lg" placeholder="4th Member" autocomplete="off"/><br><br></div>
<div class="col-sm-6" align="center"><input name="p5" type="text" class="input-lg" placeholder="5th Member" autocomplete="off"/><br><br></div>
<div class="col-sm-12" align="center"><input name="submit" type="submit" class="btn btn-lg btn-success" value="Create" style="width:20%"/></div>
</form>
<br><br><br><br><div align="center"><br><br><?php echo $msg; ?></div><br><br><br><br><br><br><br><br><br>
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

