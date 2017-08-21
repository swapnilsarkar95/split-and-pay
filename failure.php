<?php
if(isset($_POST['register']))
	header("Location:registration.php");

?>


<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Registration Failure</title>
<link href="bootstrap-3.3.7-dist/css/bootstrap.css" rel="stylesheet" type="text/css">
</head>

<body style="background-color:#A3C8F7">
<br><br><br><br><br>
<div class="alert alert-danger">
<h2 align="center">Sorry your registration couldnot be completed due to some reason!
</h2>

<h3 align="center">Contact the Administrator for further details</h3>
</div>
<div align="center">
<form action="failure.php" method="post">
<button class="btn btn-success btn-lg" type="submit" name="register" type="submit">Register</button>
</form>
</div>
</body>
</html>