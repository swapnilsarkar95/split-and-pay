<?php
session_start();
$con=mysqli_connect("fdb17.your-hosting.net","2424765_splitup","splitup12","2424765_splitup") or die("Connection couldnot be established");
$id1=$_SESSION['id'];
$name=$_SESSION['name'];
//if(isset($_POST['submit']))
//{
	/**if($_POST['submit']=="logout")
	{
		session_destroy();
		header("Location:login.php");
	}
	**/
	if(isset($_POST['submit']))
	{
		$gid1=$_POST['gid1'];
		$check="SELECT gname from grouplist WHERE ownerID='$id1' AND gid='$gid1'";
		$query=mysqli_query($con,$check);
		if(mysqli_num_rows($query)==1)
		{
			$row=mysqli_fetch_assoc($query);
			$_SESSION['gid1']=$gid1;
			$_SESSION['gname1']=$row['gname'];
			header("Location:group_welcome.php");
		}
	}
//}
?>

<html>
<head>
	<title><?php echo $name;?>-Groups</title>
<link href="bootstrap-3.3.7-dist/css/bootstrap.css" rel="stylesheet" type="text/css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

</head>

<body>
	<div>
	<nav class="navbar navbar-default ">
       		<ul class="nav navbar-nav col-lg-8" >
                <li class="col-lg-offset-8"><a  href="welcome.php"><?php echo "<h3> $name </h3>";?></a>
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
           	<li class="col-lg-3"><a href="logout.php"><span style="font-family: Segoe, 'Segoe UI', 'DejaVu Sans', 'Trebuchet MS', Verdana, sans-serif">Logout</span></a></li>
        </ul>
    </nav>
	<br>
    <div class="col-sm-12" align="center">
    <form action="group.php" method="post" >
	  
	  	<input name="gid1" type="text" class="input-lg" placeholder="Enter group number to access " style="width:30%"></input><br><br>
		<button class="btn btn-lg btn-success" type="submit" name="submit" value="Access">&nbsp;&nbsp;Access&nbsp;&nbsp;</button>
	</form>
    </div>
    <br>
    
    <div class="col-sm-12" align="center">
    <table class="table table-striped" style="width:70%; text-align:center" align="center">
	<?php
		
		$check="SELECT gid,gname from grouplist WHERE ownerID='$id1'";
		$query=mysqli_query($con,$check);
		if(mysqli_num_rows($query)>0)
		{
	?>
		<tr>
        	<th style="text-align:center">GROUP ID</th>
            <th style="text-align:center">GROUP NAME</th>
        </tr>
		
    <?php    while( $row=mysqli_fetch_assoc($query))
			{
	?>
    	<tr>
			<td>	<?php echo $row['gid'];?>	</td>
        	<td>	<?php echo $row['gname'];?>	</td>
        </tr>
	<?php	
			}
		}
		else
		{
			echo "No GROUPS created as of now!";
		}
		
	?>
	</table>
    
    
    <br><br><br><br><br><br><br><br><br><br><br><br>
    
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
</div>
</body>
</html>