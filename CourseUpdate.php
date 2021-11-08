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
	$id = $_GET['std_id1'];
	$sName = $_GET['cName'];
	
	$stm = "BEGIN TRANSACTION update Course set CourseName='$sName' where CourseID='$id' COMMIT TRANSACTION";
	$query = sqlsrv_query( $conn , $stm);
}
?>
</div>
<?php
if (isset($_GET['update'])) {
	$update = $_GET['update'];
	$stm1 = "select * from Course where CourseID=$update";
	$query1 = sqlsrv_query($conn ,$stm1);
	
	while($row1 = sqlsrv_fetch_array($query1,SQLSRV_FETCH_ASSOC)) 
	{
		echo "<form class='form' method='get'>";
		echo "<div class='form-group'>";
		echo "<h2>Update Form</h2>";
		echo "<hr/>";
		echo "<input class='form-control' type='hidden' name='std_id1' value='{$row1['CourseID']}' required/>";
		echo "<br />";
		echo "<label>" . "StudentName" . "</label>" . "<br />";
		echo "<input class='form-control' type='text' name='cName' value='{$row1['CourseName']}' required/>";
		echo "<br />"; ?>
		<?php
		echo "<br />";
		echo "<center><input class='btn btn-primary' type='submit' name='submit' value='UPDATE' /></center>";
		
		echo "</div>";
		echo "</form>";
	}
}
if (isset($_GET['submit'])) {
echo '<div class="form" id="form3"><br><br><br><br><br><br>
<Span>Data Updated Successfuly......!!</span></div>';
header("Location:Course.php");
}
?>
<div class="clear"></div>
</div>
<div class="clear"></div>
</div>
</div>
</body>
</html>