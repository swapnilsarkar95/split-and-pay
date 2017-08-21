<?php
session_start();
$con=mysqli_connect("fdb17.your-hosting.net","2424765_splitup","splitup12","2424765_splitup") or die("Connection couldnot be established");
$name=$_SESSION['name'];
?>

<html>
<head>
	<title>Daily Expenses Summary</title>
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
            <li><a href="add_expense.php">Add Expense</a></li>
            <li><a href="show_daily_expense.php">Show Daily Expenses</a></li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
           	<li class="col-lg-3"><a href="logout.php"><span style="font-family: Segoe, 'Segoe UI', 'DejaVu Sans', 'Trebuchet MS', Verdana, sans-serif">Logout</span></a></li>
        </ul>
    </nav>
   
   	<div>
        <table class="table table-striped table-responsive" align="center" style="text-align:center; width:70%">
        	<tr align="center" style="text-align:center">
            	<th class="alert-danger" colspan="5" style="text-align:center" style="padding-top:10px; padding-bottom:10px">Expenses Summary</th>
            </tr>
            
            <tr>
            	<th style="text-align:center" style="padding-top:10px; padding-bottom:10px">Person</th>
                <th style="text-align:center" style="padding-top:10px; padding-bottom:10px">Description</th>
                <th style="text-align:center" style="padding-top:10px; padding-bottom:10px">Amount</th>
                <th style="text-align:center" style="padding-top:10px; padding-bottom:10px">Date</th>
                <th style="text-align:center" style="padding-top:10px; padding-bottom:10px">Notes</th>
            </tr>
		<?php
		
		$n=$_SESSION['no_of_e'];
		$check="SELECT * from $name ORDER BY tid DESC";
		$query=mysqli_query($con,$check);
		$i=1;
		
		while($i<=$n&&$row=mysqli_fetch_assoc($query))
		{
		?>
			<tr>
            	<td style="padding-top:10px; padding-bottom:10px"><?php echo $row['person'];?></td>
                <td style="padding-top:10px; padding-bottom:10px"><?php echo $row['description'];?></td>
                <td style="padding-top:10px; padding-bottom:10px"><strong>&#8377</strong><?php echo $row['amount'];?></td>
                <td style="padding-top:10px; padding-bottom:10px"><?php echo $row['date'];?></td>
				<td style="padding-top:10px; padding-bottom:10px"><?php echo $row['notes'];?></td>
			</tr>
        <?php
			$i++;
		}
		if($n==0)
		{
			while($row=mysqli_fetch_assoc($query))
			{
			?>
				<tr>
					<td style="padding-top:10px; padding-bottom:10px"><?php echo $row['person'];?></td>
					<td style="padding-top:10px; padding-bottom:10px"><?php echo $row['description'];?></td>
					<td style="padding-top:10px; padding-bottom:10px"><strong>&#8377</strong><?php echo $row['amount'];?></td>
					<td style="padding-top:10px; padding-bottom:10px"><?php echo $row['date'];?></td>
					<td style="padding-top:10px; padding-bottom:10px"><?php echo $row['notes'];?></td>
				</tr>
				<?php
				$i++;
			}
		}
		?>
        </table>
        <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
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