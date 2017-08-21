<?php
if(isset($_POST['login']))
	header("Location:login.php");

?>


<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Login Failure</title>
<link href="bootstrap-3.3.7-dist/css/bootstrap.css" rel="stylesheet" type="text/css">
</head>

<body style="background-color:#A3C8F7">
<br><br><br><br><br>
<div class="alert alert-danger">
<h2 align="center">Sorry your Login couldnot be completed due to some reason!
</h2>

<h3 align="center">Try Again or Contact the Administrator for further details</h3>
</div>
<div align="center">
<form action="failure_login.php" method="post">
<button class="btn btn-primary btn-lg" type="submit" name="login" type="submit">Login</button>
</form>
</div>
</body>
</html>