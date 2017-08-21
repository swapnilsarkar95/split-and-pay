<?php 

$con=mysqli_connect("fdb17.your-hosting.net","2424765_splitup","splitup12","2424765_splitup")  or die("Connection couldnot be established");

	$errorName="";
	$errorEmail="";
	$errorPass="";
?>
<?php
if(isset($_POST['login']))
	header("Location:login.php");
if(isset($_POST['submit']))
{

	
	$name=trim($_POST['name']);
	$name=strip_tags($name);
	$name=htmlspecialchars($name);
	
	$pass=trim($_POST['password']);
	$pass=strip_tags($pass);
	$pass=htmlspecialchars($pass);
	
	$email=trim($_POST['email']);
	$email=strip_tags($email);
	$email=htmlspecialchars($email);
	
	$error=false;
	
	$query2="SELECT gname from grouplist WHERE gname='$name'";
	$result2=mysqli_query($con,$query2);
	$count2=mysqli_num_rows($result2);

	$query3="SELECT name from users WHERE name='$name'";
	$result3=mysqli_query($con,$query3);
	$count3=mysqli_num_rows($result3);
		
	//NAME VALIDATION
	if(empty($name))
	{
		$error=true;
		$errorName="Please Enter your full name.";
	}
	elseif(strlen($name)<3)
	{
		$error=true;
		$errorName="Name must have atleast 3 characters.";
	}
	elseif(!preg_match("/^[a-zA-Z ]*$/",$name))
	{
		$error=true;
		$errorName="Name must contain alphabets and space.";
	}
	elseif($count2!=0 || $count3!=0)
	{
		$error=true;
		$errorName="Provided Name is already in use.";
	}

	//EMAIL VALIDATION
	if(!filter_var($email,FILTER_VALIDATE_EMAIL))
	{
		$error=true;
		$errorEmail="Please enter a valid email address.";
	}
	else
	{
		$query1="SELECT email from users WHERE email='$email'";
		$result1=mysqli_query($con,$query1);
		$count=mysqli_num_rows($result1);
		if($count!=0)
		{
			$error=true;
			$errorEmail="Provided Email is already in use.";
		}
	}
	
	//PASSWORD VALIDATION
	if(empty($pass))
	{
		$error=true;
		$errorPass="Please Eneter Password.";
	}
	elseif(strlen($pass)<6)
	{
		$error="true";
		$errorPass="Password must have atleast 6 characters.";
	}
	
	if(!$error)
	{
		$insert="insert into users  (name,password,email) values ('$name','$pass','$email')";
		if(mysqli_query($con,$insert)===TRUE)
		{
			$create="CREATE table $name(tid INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY, person VARCHAR(30) NOT NULL,description VARCHAR(40),amount FLOAT,notes VARCHAR(50), date DATE)";
			mysqli_query($con,$create);
			header("Location:success.php");
		}
		else
		{
			header("Location:falure.php");
		}
	}
}
?>

<html>
<head>
<title>Split & Pay-Registration</title>

<link href="bootstrap-3.3.7-dist/css/bootstrap.css" rel="stylesheet" type="text/css">

</head>

<body>

<div class="panel panel-primary">
<div class="panel-heading">
<h2 align="center">REGISTRATION</h2>
</div>
<br><br>
<div class="panel-body">
<form method="post" action="registration.php">
<div class="col-sm-offset-4">
  	<input class="input-lg" name="name" type="text" autocomplete="off" placeholder="First Name" style="width:50%"/><?php echo $errorName; ?><br> <br>
</div>
<div class="col-sm-offset-4">
<input class="input-lg" type="text" name="email" autocomplete="off" placeholder="Email" style="width:50%"/><?php echo $errorEmail; ?><br><br>
</div>
<div class="col-sm-offset-4"><input class="input-lg" type="password"  name="password" autocomplete="off" placeholder="Password" style="width:50%"/><?php echo $errorPass; ?><br><br>
</div>

<button name="submit" type="submit" class="col-sm-offset-4 btn-lg btn-primary" style="width:23.5%">&nbsp;REGISTER&nbsp;</button>
<button name="login" type="submit" class="btn-lg btn-success" style="color: #F9FCF9">&nbsp;&nbsp;&nbsp;&nbsp;LOGIN&nbsp;&nbsp;&nbsp;&nbsp;</button> 
</form>
</div>
</div>
</body>
</html>
