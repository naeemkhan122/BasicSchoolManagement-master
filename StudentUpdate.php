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
	$sName = $_GET['sName'];
	$fName = $_GET['fName1'];
	$add = $_GET['add1'];
	$cont = $_GET['cont1'];
	$dob = $_GET['dob1'];
	$gen = $_GET['gen1'];
	$addate = $_GET['addate1'];
	$class = $_GET['class1'];
	$stm = "BEGIN TRANSACTION update Student set StudentName='$sName', FatherName='$fName', Address='$add', Contact='$cont', DOB='$dob', Gender = '$gen',
	AdmissionDate = '$addate', Class = '$class' where StudentID='$id' COMMIT TRANSACTION";
	$query = sqlsrv_query( $conn , $stm);
}
?>
</div>
<?php
if (isset($_GET['update'])) {
	$update = $_GET['update'];
	$stm1 = "select * from Student where StudentID=$update";
	$query1 = sqlsrv_query($conn ,$stm1);
	
	while($row1 = sqlsrv_fetch_array($query1,SQLSRV_FETCH_ASSOC)) 
	{
		echo "<form class='form' method='get'>";
		echo "<div class='form-group'>";
		echo "<h2>Update Form</h2>";
		echo "<hr/>";
		echo "<input class='form-control' type='hidden' name='std_id1' value='{$row1['StudentID']}' required/>";
		echo "<br />";
		echo "<label>" . "StudentName" . "</label>" . "<br />";
		echo "<input class='form-control' type='text' name='sName' value='{$row1['StudentName']}' required/>";
		echo "<br />";
		echo "<label>" . "Father Name" . "</label>" . "<br />";
		echo"<input class='form-control' type='text' name='fName1' value='{$row1['FatherName']}' required/>";
		echo "<br />";
		echo "<label>" . "Address" . "</label>" . "<br />";
		echo "<input class='form-control' type='text' name='add1' value='{$row1['Address']}' required/>";
		echo "<br />";
		echo "<label>" . "Contact" . "</label>" . "<br />";
		echo "<input class='form-control' type='text' name='cont1' value='{$row1['Contact']}' required/>";
		echo "<br />";
		echo "<label>" . "DOB" . "</label>" . "<br />";
		echo "<input class='form-control' type='date' name='dob1' value='{$row1['DOB']}' />"; ?>
		<div class='form-group'>
			<label>Gender</label>
				<select class='form-control' name='gen1' required>
				  <option value='M' <?php If($row1['Gender'] == 'M') { echo 'selected'; } ?> > Male</option>
				  <option value='F' <?php If($row1['Gender'] == 'F') { echo 'selected'; } ?> >Female</option>  
				</select></div>
		<?php
		echo "<label>" . "AdmissionDate" . "</label>" . "<br />";
		echo"<input class='form-control' type='date' name='addate1' value='{$row1['AdmissionDate']}' required/>";
		echo "<br />";
		echo "<label>" . "Class" . "</label>" . "<br />";
		echo"<input class='form-control' type='text' name='class1' value='{$row1['Class']}' required/>";
		echo "<br />";
		echo "<center><input class='btn btn-primary' type='submit' name='submit' value='UPDATE' /></center>";
		echo "</div>";
		echo "</form>";
	}
}
if (isset($_GET['submit'])) {
echo '<div class="form" id="form3"><br><br><br><br><br><br>
<Span>Data Updated Successfuly......!!</span></div>';
header("Location:Student.php");
}
?>
<div class="clear"></div>
</div>
<div class="clear"></div>
</div>
</div>
</body>
</html>