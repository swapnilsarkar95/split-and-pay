<?php
session_start();
$con=mysqli_connect("fdb17.your-hosting.net","2424765_splitup","splitup12","2424765_splitup") or die("Connection couldnot be established");
$result=0;
if(isset($_POST['register']))
	header("Location:registration.php");
if(isset($_POST['submit']))
{
	$email=$_POST['email'];
	$password=$_POST['password'];
    
	$check="SELECT  name from users WHERE email='$email' AND  password='$password'";
	$query=mysqli_query($con,$check);
	$result=mysqli_num_rows($query);
	
	if(isset($_SESSION['loggedin']) && $_SESSION['loggedin']==true)
	{
		header("Location:welcome.php");
	}
	elseif($result==1)
	{
		$_SESSION['loggedin']=true;
		$_SESSION['email']=$email;
		$check="SELECT name,id from users WHERE email='$email'";
		$result1=mysqli_query($con,$check);
		$row=mysqli_fetch_assoc($result1);
		$_SESSION['name']=$row['name'];
		$_SESSION['id']=$row['id'];
		header("Location:welcome.php");
	}
	else
	{
		header("Location:failure_login.php");
	}
}
?>
<html>
	<head>
		<title>Login</title>
    
    <link href="bootstrap-3.3.7-dist/css/bootstrap.css" rel="stylesheet" type="text/css">
	</head>
	
	<body>
		<div class="panel panel-primary"  align="center">
        	<div class="panel-heading">
				<h2 align="center">LOGIN</h2>
        	</div>
          <div class="panel-body">
            <form  action="login.php" method="POST" autocomplete="off">
                
                	<div>
                    <input class="input-lg" type="text" name="email" autocomplete="off" placeholder="Email" style="width:30%"><br><br>
                	</div>
                    <div>
                    <input class="input-lg" type="password" name="password" autocomplete="off" placeholder="Password" style="width:30%"><br>
                	</div>
                    <br>
                    
                    <div class="col-sm-12">
                    <button name="submit" type="submit" class="btn-lg btn-primary btn" style="width:30% ">&nbsp;Login&nbsp;</button>
                    </div>
                    <div class="col-sm-12"><br></div>
                    <div class="col-sm-12">
                    <button name="register" type="submit" class="btn btn-lg btn-success" style="width:30%" >Register</button>
                    </div> 
                	
                </form>
            </div>
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