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
</div>
<?php
include("connection.php");


if (isset($_GET['submit'])) 
{
	$id = $_GET['std_id1'];
	$status = $_GET['status1'];
	$date = $_GET['date1'];
	
	$stm = "update Attendence set Status='$status' Where AttendanceID = '$id' and DateOfDay = '$date' ";
	
	if($stm)
	{ 
		$query = sqlsrv_query( $conn , $stm);
		echo 'Data Updated Successfuly......!!';
		header("Location:Attendance.php");

	}
	else
	{
				die("Didn't Update"); 
	}

}



if (isset($_GET['update'])) 
{
	$update = $_GET['update'];
	$dat = $_GET['dat'];
	$stm1 = "Select * from Attendence as A
	Inner Join Student as S ON
	S.StudentID = A.AttendanceID where StudentID=$update and DateOfDay = '$dat'";
	$query1 = sqlsrv_query($conn ,$stm1);
	
	while($row1 = sqlsrv_fetch_array($query1,SQLSRV_FETCH_ASSOC)) 
	{
		echo "<form action='#' class='form' method='get'>";
		echo "<div class='form-group'>";
		echo "<h2>Update Form</h2>";
		echo "<hr/>";
		echo "<input class='form-control' type='hidden' name='std_id1' value='{$row1['StudentID']}' readonly/>";
		echo "<br />";
		echo "<label>" . "StudentName" . "</label>" . "<br />";
		echo "<input class='form-control' type='text' name='sName' value='{$row1['StudentName']}' readonly/>";
		echo "<br />"; ?>
		<div class='form-group'>
			<label>Status</label>
				<select class='form-control' name='status1' required>
				  <option value='Present' <?php If($row1['Status'] == 'Present') { echo 'selected'; } ?> > Present</option>
				  <option value='Absent' <?php If($row1['Status'] == 'Absent') { echo 'selected'; } ?> >Absent</option>  
				</select></div>
		<?php
		echo "<label>" . "AdmissionDate" . "</label>" . "<br />";
		echo"<input class='form-control' type='date' name='date1' value='{$row1['DateOfDay']}' readonly/>";
		echo "<br />";
		echo "<center><input class='btn btn-primary' type='submit' name='submit' value='UPDATE' /></center>";
		echo "</div>";
		echo "</form>";
	}
}



?>
</div>
</div>
</div>
</body>
</html>