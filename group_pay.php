<?php
session_start();
$con=mysqli_connect("fdb17.your-hosting.net","2424765_splitup","splitup12","2424765_splitup") or die("Connection couldnot be established");

$err=0;
$a12=$a13=$a14=$a15=$a23=$a24=$a25=$a34=$a35=$a45=0;
$name=$_SESSION['name'];
$gname=$_SESSION['gname1'];
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
	<div>
			<?php 
            
            echo"<h4>&nbsp;&nbsp;&nbsp;GROUP : $gname</h4>";
            ?>
	</div>

	<br><br><br>
	<div>
	<?php
	 $gid1=$_SESSION['gid1'];
	 $checkx="SELECT * from grouplist WHERE gid='$gid1'";
	 $queryx=mysqli_query($con,$checkx);
	 if(mysqli_num_rows($queryx)==1)
	 {
		 $row=mysqli_fetch_assoc($queryx);
		 $p1=$row['p1'];
		 $p2=$row['p2'];
		 $p3=$row['p3'];
		 $p4=$row['p4'];
		 $p5=$row['p5'];
	 }
	 else
	 {
		 $err=1;
	 }
	 if($err!=1)
	 {
		 $check="SELECT * from $gname";
		$query=mysqli_query($con,$check);
		while($row=mysqli_fetch_assoc($query))
		{
			if($row['from1']==$p1 && $row['to1']==$p2)	$a12=$a12+$row['amount'];
			if($row['from1']==$p2 && $row['to1']==$p1)	$a12=$a12-$row['amount'];
			
			if($row['from1']==$p1 && $row['to1']==$p3)	$a13=$a13+$row['amount'];
			if($row['from1']==$p3 && $row['to1']==$p1)	$a13=$a13-$row['amount'];
			
			if($row['from1']==$p1 && $row['to1']==$p4)	$a14=$a14+$row['amount'];
			if($row['from1']==$p4 && $row['to1']==$p1)	$a14=$a14-$row['amount'];
			
			if($row['from1']==$p1 && $row['to1']==$p5)	$a15=$a15+$row['amount'];
			if($row['from1']==$p5 && $row['to1']==$p1)	$a15=$a15-$row['amount'];
			
			if($row['from1']==$p2 && $row['to1']==$p3)	$a23=$a23+$row['amount'];
			if($row['from1']==$p3 && $row['to1']==$p2)	$a23=$a23-$row['amount'];
			
			if($row['from1']==$p2 && $row['to1']==$p4)	$a24=$a24+$row['amount'];
			if($row['from1']==$p4 && $row['to1']==$p2)	$a24=$a24-$row['amount'];
			
			if($row['from1']==$p2 && $row['to1']==$p5)	$a25=$a25+$row['amount'];
			if($row['from1']==$p5 && $row['to1']==$p2)	$a25=$a25-$row['amount'];
			
			if($row['from1']==$p3 && $row['to1']==$p4)	$a34=$a34+$row['amount'];
			if($row['from1']==$p4 && $row['to1']==$p3)	$a34=$a34-$row['amount'];
			
			if($row['from1']==$p3 && $row['to1']==$p5)	$a35=$a35+$row['amount'];
			if($row['from1']==$p5 && $row['to1']==$p3)	$a35=$a35-$row['amount'];
			
			if($row['from1']==$p4 && $row['to1']==$p5)	$a45=$a45+$row['amount'];
			if($row['from1']==$p5 && $row['to1']==$p4)	$a45=$a45-$row['amount'];
				
		}
		?>
        <div align="center">
        <table class="table table-striped table-responsive " style="text-align:center; width:75%;">
           <!--- <tr>
            	<th style="text-align:center;padding-top:100px"> FROM</th>
                <th style="text-align:center;padding-top:100px"></th>
                <th style="text-align:center;padding-top:100px"> TO</th>
                <th style="text-align:center;padding-top:100px">Amount( Rs. )</th>
            </tr>
            -->
            <tr>
            	<th colspan="4" class="alert-danger" style="text-align:center; padding-top:50px; padding-bottom:50px">GROUP SUMMARY</th>
            </tr>
            <tr>
            	<?php if($a12<0)
				{ ?>
					<td style="padding-top:40px; padding-bottom:40px; "><strong style="font-size:20px"><?php echo $p1;?></strong></td>
                    <td style="padding-top:40px; padding-bottom:40px"><?php echo " will be paying ";?></td>
                    <td style="padding-top:40px; padding-bottom:40px"><strong><?php echo $p2;?></strong></td>
                    <td style="padding-top:40px; padding-bottom:40px"><strong>&#8377;</strong><?php echo $a12*(-1);?></td>
				<?php 
				}
				else
				{ ?>
                    <td style="padding-top:40px; padding-bottom:40px;"><strong style="font-size:20px"><?php echo $p2;?></strong></td>
                    <td style="padding-top:40px; padding-bottom:40px;"><?php echo " will be paying ";?></td>
                    <td style="padding-top:40px; padding-bottom:40px"><strong><?php echo $p1;?></strong></td>
                    <td style="padding-top:40px; padding-bottom:40px"><strong>&#8377;</strong><?php echo $a12;?></td>
                <?php
				} ?>
				
           </tr>
           
                       <tr>
            	<?php if($a13<0)
				{ ?>
					<td style="padding-top:40px; padding-bottom:40px"><strong style="font-size:20px"><?php echo $p1;?></strong></td>
                    <td style="padding-top:40px; padding-bottom:40px"><?php echo " will be paying ";?></td>
                    <td style="padding-top:40px; padding-bottom:40px"><strong><?php echo $p3;?></strong></td>
                    <td style="padding-top:40px; padding-bottom:40px"><strong>&#8377;</strong><?php echo $a13*(-1);?></td>
				<?php 
				}
				else
				{ ?>
                    <td style="padding-top:40px; padding-bottom:40px"><strong style="font-size:20px"><?php echo $p3;?></strong></td>
                    <td style="padding-top:40px; padding-bottom:40px"><?php echo " will be paying ";?></td>
                    <td style="padding-top:40px; padding-bottom:40px"><strong><?php echo $p1;?></strong></td>
                    <td style="padding-top:40px; padding-bottom:40px"><strong>&#8377;</strong><?php echo $a13;?></td>
                <?php
				} ?>
				
           </tr>
           
                       <tr>
            	<?php if($a14<0)
				{ ?>
					<td style="padding-top:40px; padding-bottom:40px"><strong style="font-size:20px"><?php echo $p1;?></strong></td>
                    <td style="padding-top:40px; padding-bottom:40px"><?php echo " will be paying ";?></td>
                    <td style="padding-top:40px; padding-bottom:40px"><strong><?php echo $p4;?></strong></td>
                    <td style="padding-top:40px; padding-bottom:40px"><strong>&#8377;</strong><?php echo $a14*(-1);?></td>
				<?php 
				}
				else
				{ ?>
                    <td style="padding-top:40px; padding-bottom:40px"><strong style="font-size:20px"><?php echo $p4;?></strong></td>
                    <td style="padding-top:40px; padding-bottom:40px"><?php echo " will be paying ";?></td>
                    <td style="padding-top:40px; padding-bottom:40px"><strong><?php echo $p1;?></strong></td>
                    <td style="padding-top:40px; padding-bottom:40px"><strong>&#8377;</strong><?php echo $a14;?></td>
                <?php
				} ?>
				
           </tr>
           
                       <tr>
            	<?php if($a15<0)
				{ ?>
					<td style="padding-top:40px; padding-bottom:40px"><strong style="font-size:20px"><?php echo $p1;?></strong></td>
                    <td style="padding-top:40px; padding-bottom:40px"><?php echo " will be paying ";?></td>
                    <td style="padding-top:40px; padding-bottom:40px"><strong><?php echo $p5;?></strong></td>
                    <td style="padding-top:40px; padding-bottom:40px"><strong>&#8377;</strong><?php echo $a15*(-1);?></td>
				<?php 
				}
				else
				{ ?>
                    <td style="padding-top:40px; padding-bottom:40px"><strong style="font-size:20px"><?php echo $p5;?></strong></td>
                    <td style="padding-top:40px; padding-bottom:40px"><?php echo " will be paying ";?></td>
                    <td style="padding-top:40px; padding-bottom:40px"><strong><?php echo $p1;?></strong></td>
                    <td style="padding-top:40px; padding-bottom:40px"><strong>&#8377;</strong><?php echo $a15;?></td>
                <?php
				} ?>
				
           </tr>
           
                       <tr>
            	<?php if($a23<0)
				{ ?>
					<td style="padding-top:40px; padding-bottom:40px"><strong style="font-size:20px"><?php echo $p2;?></strong></td>
                    <td style="padding-top:40px; padding-bottom:40px"><?php echo " will be paying ";?></td>
                    <td style="padding-top:40px; padding-bottom:40px"><strong><?php echo $p3;?><strong></td>
                    <td style="padding-top:40px; padding-bottom:40px"><strong>&#8377;</strong><?php echo $a23*(-1);?></td>
				<?php 
				}
				else
				{ ?>
                    <td style="padding-top:40px; padding-bottom:40px"><strong style="font-size:20px"><?php echo $p3;?></strong></td>
                    <td style="padding-top:40px; padding-bottom:40px"><?php echo " will be paying ";?></td>
                    <td style="padding-top:40px; padding-bottom:40px"><strong><?php echo $p2;?><strong></td>
                    <td style="padding-top:40px; padding-bottom:40px"><strong>&#8377;</strong><?php echo $a23;?></td>
                <?php
				} ?>
				
           </tr>
           
                       <tr>
            	<?php if($a24<0)
				{ ?>
					<td style="padding-top:40px; padding-bottom:40px"><strong style="font-size:20px"><?php echo $p2;?></strong></td>
                    <td style="padding-top:40px; padding-bottom:40px"><?php echo " will be paying ";?></td>
                    <td style="padding-top:40px; padding-bottom:40px"><strong><?php echo $p4;?></strong></td>
                    <td style="padding-top:40px; padding-bottom:40px"><strong>&#8377;</strong><?php echo $a24*(-1);?></td>
				<?php 
				}
				else
				{ ?>
                    <td style="padding-top:40px; padding-bottom:40px"><strong style="font-size:20px"><?php echo $p4;?></strong></td>
                    <td style="padding-top:40px; padding-bottom:40px"><?php echo " will be paying ";?></td>
                    <td style="padding-top:40px; padding-bottom:40px"><strong><?php echo $p2;?></strong></td>
                    <td style="padding-top:40px; padding-bottom:40px"><strong>&#8377;</strong><?php echo $a24;?></td>
                <?php
				} ?>
				
           </tr>
           
                       <tr>
            	<?php if($a25<0)
				{ ?>
					<td style="padding-top:40px; padding-bottom:40px"><strong style="font-size:20px"><?php echo $p2;?></strong></td>
                    <td style="padding-top:40px; padding-bottom:40px"><?php echo " will be paying ";?></td>
                    <td style="padding-top:40px; padding-bottom:40px"><strong><?php echo $p5;?></strong></td>
                    <td style="padding-top:40px; padding-bottom:40px"><strong>&#8377;</strong><?php echo $a25*(-1);?></td>
				<?php 
				}
				else
				{ ?>
                    <td style="padding-top:40px; padding-bottom:40px"><strong style="font-size:20px"><?php echo $p5;?></strong></td>
                    <td style="padding-top:40px; padding-bottom:40px"><?php echo " will be paying ";?></td>
                    <td style="padding-top:40px; padding-bottom:40px"><strong><?php echo $p2;?></strong></td>
                    <td style="padding-top:40px; padding-bottom:40px"><strong>&#8377;</strong><?php echo $a25;?></td>
                <?php
				} ?>
				
           </tr>
           
                       <tr>
            	<?php if($a34<0)
				{ ?>
					<td style="padding-top:40px; padding-bottom:40px"><strong style="font-size:20px"><?php echo $p3;?></strong></td>
                    <td style="padding-top:40px; padding-bottom:40px"><?php echo " will be paying ";?></td>
                    <td style="padding-top:40px; padding-bottom:40px"><strong><?php echo $p4;?></strong></td>
                    <td style="padding-top:40px; padding-bottom:40px"><strong></strong><?php echo $a34*(-1);?></td>
				<?php 
				}
				else
				{ ?>
                    <td style="padding-top:40px; padding-bottom:40px"><strong style="font-size:20px"><?php echo $p4;?></strong></td>
                    <td style="padding-top:40px; padding-bottom:40px"><?php echo " will be paying ";?></td>
                    <td style="padding-top:40px; padding-bottom:40px"><strong><?php echo $p3;?></strong></td>
                    <td style="padding-top:40px; padding-bottom:40px"><strong>&#8377;</strong><?php echo $a34;?></td>
                <?php
				} ?>
				
           </tr>
           
                       <tr>
            	<?php if($a35<0)
				{ ?>
					<td style="padding-top:40px; padding-bottom:40px"><strong style="font-size:20px"><?php echo $p3;?></strong></td>
                    <td style="padding-top:40px; padding-bottom:40px"><?php echo " will be paying ";?></td>
                    <td style="padding-top:40px; padding-bottom:40px"><strong><?php echo $p5;?></strong></td>
                    <td style="padding-top:40px; padding-bottom:40px"><strong>&#8377;</strong><?php echo $a35*(-1);?></td>
				<?php 
				}
				else
				{ ?>
                    <td style="padding-top:40px; padding-bottom:40px"><strong style="font-size:20px"><?php echo $p5;?></strong></td>
                    <td style="padding-top:40px; padding-bottom:40px"><?php echo " will be paying ";?></td>
                    <td style="padding-top:40px; padding-bottom:40px"><strong><?php echo $p3;?></strong></td>
                    <td style="padding-top:40px; padding-bottom:40px"><strong>&#8377;</strong><?php echo $a35;?></td>
                <?php
				} ?>
				
           </tr>
                
                       <tr>
            	<?php if($a45<0)
				{ ?>
					<td style="padding-top:40px; padding-bottom:40px"><strong style="font-size:20px"><?php echo $p4;?></strong></td>
                    <td style="padding-top:40px; padding-bottom:40px"><?php echo " will be paying ";?></td>
                    <td style="padding-top:40px; padding-bottom:40px"><strong><?php echo $p5;?></strong></td>
                    <td style="padding-top:40px; padding-bottom:40px"><strong>&#8377;</strong><?php echo $a45*(-1);?></td>
				<?php 
				}
				else
				{ ?>
                    <td style="padding-top:40px; padding-bottom:40px"><strong style="font-size:20px"><?php echo $p5;?></strong></td>
                    <td style="padding-top:40px; padding-bottom:40px"><?php echo " will be paying ";?></td>
                    <td style="padding-top:40px; padding-bottom:40px"><strong><?php echo $p4;?></strong></td>
                    <td style="padding-top:40px; padding-bottom:40px"><strong>&#8377;</strong><?php echo $a45;?></td>
                <?php
				} ?>
				
           </tr>
           
			</table>
            </div>
	<?php }?>
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