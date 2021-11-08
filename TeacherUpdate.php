<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<!-- CSS -->
	<link rel="stylesheet" href="assets/styles/bootstrap.min.css">
	<link rel="stylesheet" href="assets/styles/style.css" />
	
	 
	<title>Student</title>
  </head>
  
  <body>
  
	<?php include("nav.php"); ?>

	<!-- Main Container Starts -->
	<div class="container-fluid">
	
		<!-- Main Sub Container Starts -->
		<div class ="main">
			<br>
<?php

include("connection.php");

if (isset($_GET['submit'])) 
{
	$id = $_GET['t_id1'];
	$tName = $_GET['tName'];
	$add = $_GET['add1'];
	$cont = $_GET['cont1'];
	$join = $_GET['join1'];
	$gen = $_GET['gen1'];
	$stm = "update Teacher set TeacherName='$tName', Address='$add', Contact='$cont', JoinDate='$join', Gender = '$gen'
	where TeacherID='$id'";
	$query = sqlsrv_query( $conn , $stm);
}
?>
</div>
<?php
if (isset($_GET['update'])) {
	$update = $_GET['update'];
	$stm1 = "select * from Teacher where TeacherID=$update";
	$query1 = sqlsrv_query($conn ,$stm1);
	
	while($row1 = sqlsrv_fetch_array($query1,SQLSRV_FETCH_ASSOC)) 
	{
		echo "<form class='form' method='get'>";
		echo "<div class='form-group'>";
		echo "<h2>Update Form</h2>";
		echo "<hr/>";
		echo"<input class='form-control' type='hidden' name='t_id1' value='{$row1['TeacherID']}' />";
		echo "<br />";
		echo "<label>" . "TeacherName" . "</label>" . "<br />";
		echo"<input class='form-control' type='text' name='tName' value='{$row1['TeacherName']}' />";
		echo "<br />";
		echo "<label>" . "Address" . "</label>" . "<br />";
		echo"<input class='form-control' type='text' name='add1' value='{$row1['Address']}' />";
		echo "<br />";
		echo "<label>" . "Contact" . "</label>" . "<br />";
		echo"<input class='form-control' type='text' name='cont1' value='{$row1['Contact']}' />";
		echo "<br />";
		echo "<label>" . "JoinDate" . "</label>" . "<br />";
		echo"<input class='form-control' type='text' name='join1' value='{$row1['JoinDate']}' />";
		echo "<br />";
		echo "<label>" . "Gender" . "</label>" . "<br />";
		echo"<input class='form-control' type='text' name='gen1' value='{$row1['Gender']}' />";
		echo "<br />";
		echo "<input class='btn btn-primary' type='submit' name='submit' value='UPDATE' />";
		echo "</div>";
		echo "</form>";
	}
}
if (isset($_GET['submit'])) {
echo '<div class="form" id="form3"><br><br><br><br><br><br>
<Span>Data Updated Successfuly......!!</span></div>';
header("Location:Teacher.php");
}
?>
<div class="clear"></div>
</div>
<div class="clear"></div>
</div>
</div>
</body>
</html>