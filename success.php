<?php
if(isset($_POST['login']))
	header("Location:login.php");

?>


<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Registration Success</title>
<link href="bootstrap-3.3.7-dist/css/bootstrap.css" rel="stylesheet" type="text/css">
</head>

<body style="background-color:#A3C8F7">
<br><br><br><br><br>
<div class="alert alert-success">
<h2 align="center">Your registration was completed Successfully!
</h2>

<h3 align="center">You can now login and fill in your profile.</h3>
</div>
<div align="center">
<form action="success.php" method="post">
<button class="btn btn-success btn-lg" type="submit" name="login" type="submit">Login</button>
</form>
<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
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