<?php
session_start();
$con=mysqli_connect("fdb17.your-hosting.net","2424765_splitup","splitup12","2424765_splitup") or die("Connection couldnot be established");

$name=$_SESSION['name'];
$gname=$_SESSION['gname1'];
$n=$_SESSION['no_of_t'];


?>

<html>
<head>
	<title>Group Summary</title>
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
    <br>
    <br>
    <div>
		<?php 
        $gname=$_SESSION['gname1'];
	    echo"<h4>&nbsp;&nbsp;&nbsp;GROUP : $gname</h4>";
        ?>
	</div>
    <br><br>
	<div align="center">	
        <table class="table table-striped table-responsive" style="text-align:center; width:75%;">
        	<?php if($n==10)
			{
			?>
            <tr >
            	<th colspan="4" style="text-align:center" class="alert-danger">Last 10 Transactions</th>
            </tr>
            <?php 
			}
			else
			{
			?>
            <tr style="text-align:center">
            	<th colspan="4" style="text-align:center" class="alert-danger">Last 30 Transactions</th>
            </tr>
            <?php 
			}
			?>
            <tr>
            	<th style="text-align:center">The one who <strong>PAID</strong></th>
                <th style="text-align:center">The one who <strong>OWES</strong></th>
                <th style="text-align:center">Amount</th>
                <th style="text-align:center">Date</th>
            </tr>
		<?php
		
		
		$check="SELECT * from $gname ORDER BY tid DESC";
		$query=mysqli_query($con,$check);
		$i=1;
		
		while($i<=$n&&$row=mysqli_fetch_assoc($query))
		{
		?>
			<tr>
            	<td style="text-align:center;padding-top:20px; padding-bottom:20px"><?php echo $row['from1'];?></td>
                <td style="text-align:center;padding-top:20px; padding-bottom:20px"><?php echo $row['to1'];?></td>
                <td style="text-align:center;padding-top:20px; padding-bottom:20px"><?php echo "&#8377;".$row['amount'];?></td>
                <td style="text-align:center;padding-top:20px; padding-bottom:20px"><?php echo $row['date'];?></td>
            </tr>
        <?php
			$i++;
		}
		?>
        </table>
	</div>
    <div><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
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