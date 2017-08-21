<html>
<head>
<title>Split & Pay</title>
<link href="bootstrap-3.3.7-dist/css/bootstrap.css" rel="stylesheet" type="text/css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

</head>
<body>
<div class="container-fluid">
<div align="center">
	<img src="split.jpg" class="img-responsive">
</div>
<br><br><br>
<div align="center"><span style="font-size: 45px"><strong>Split expenses with friends.</strong></span><br>
<span style="font-size: 30px"><strong>Share</strong> bills and IOUs. <strong>Make sure</strong> everyone gets paid back.</span>
</div><br><br><br>

<div class="col-sm-6" align="center">
    <button class="btn btn-lg btn-success" class="swap3 " data-toggle="modal" data-target="#modal1" style="width:50%">&nbsp;&nbsp;Login&nbsp;&nbsp;</button>
    <div class="modal fade" id="modal1" role="dialog">
            <div class="modal-dialog modal-lg">
            
            <!--MOdal COntent -->
                <div class="modal-content" align="center">
                    <div class="modal-header alert alert-info" >
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">LOGIN</h4>
                    </div>
                    <div class="modal-body">
                    <form method="post" action="login.php">
                        
                        <div class="col-sm-offset-0">
                           <input class="input-lg"  name="email" type="text" autocomplete="off" placeholder="Email" style="width:50%"/><br> <br>
                        </div>
                        <div class="col-sm-offset-0">
                           <input class="input-lg"  name="password" type="password" autocomplete="off" placeholder="Password" style="width:50%"/><br> <br>
                        </div>
                        <button name="submit" type="submit" class="col-sm-offset-0 btn-lg btn-success" style="width:35%">&nbsp;&nbsp;&nbsp;&nbsp;LOGIN&nbsp;&nbsp;&nbsp;&nbsp;</button>
                        <button name="register" type="submit" class="btn-lg btn-primary" style="color: #F9FCF9;width:15%">&nbsp;REGISTER&nbsp;</button> 
                    </form>
                    </div>
                </div>
            </div>
    <br><br>
    </div>
</div>

<div class="col-sm-6" align="center">
    <button class="btn btn-lg btn-primary" class="swap3" data-toggle="modal" data-target="#modal2" style="width:50%">Register</button>
    <div class="modal fade" id="modal2" role="dialog">
            <div class="modal-dialog modal-lg">
            
            <!--MOdal COntent -->
                <div class="modal-content" align="center">
                    <div class="modal-header alert alert-info" >
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">REGISTRATION</h4>
                    </div>
                    <div class="modal-body">
                    <form method="post" action="registration.php">
                        <div class="col-sm-offset-0">
                           <input class="input-lg" name="name" type="text" autocomplete="off" placeholder="First Name" style="width:50%"/><br> <br>
                        </div>
                        <div class="col-sm-offset-0">
                           <input class="input-lg"  name="email" type="text" autocomplete="off" placeholder="Email" style="width:50%"/><br> <br>
                        </div>
                        <div class="col-sm-offset-0">
                           <input class="input-lg"  name="password" type="password" autocomplete="off" placeholder="Password" style="width:50%"/><br> <br>
                        </div>
                        <button name="submit" type="submit" class="col-sm-offset-0 btn-lg btn-primary" style="width:35%">&nbsp;REGISTER&nbsp;</button>
                        <button name="login" type="submit" class="btn-lg btn-success" style="color: #F9FCF9;width:15%">&nbsp;&nbsp;&nbsp;&nbsp;LOGIN&nbsp;&nbsp;&nbsp;&nbsp;</button> 
                    </form>
                    </div>
                </div>
            </div>
    <br><br>
    </div>
</div>
<div align="center">
	<div class="col-sm-12"><br><br><br></div>
<span style="font-size: 20px;">&nbsp;&nbsp;IOUs made easy.</span><br><br><br>
<span style="font-size: 20px;">We do the math for you.</span><br><br><br>
<span style="font-size: 20px;">Split & Pay keeps a running total over time, so you can pay each other back in one big payment, instead of a bunch of small ones</span><br><br>
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
</div>
</body>
</html>