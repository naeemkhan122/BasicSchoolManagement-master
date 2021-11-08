<?php
	function att()
	{
		echo '<form action="StudentFeesInsert.php" method="post">';
		echo "<div class='form-group'>";
		echo "<h2>Student Attendance </h2>";

		include("connection.php");

		$class = $_POST['class1'];

		$sql = "Select * from Registration as R
		Inner Join Student as S ON
		S.StudentID = R.StudentID Where ClassID = $class";

		$query = sqlsrv_query($conn, $sql);
		echo '<div class="form-group">
		<select class="form-control" name="fee1" required>
		<option value = "">Select</option>';

		while($row = sqlsrv_fetch_array($query, SQLSRV_FETCH_ASSOC))
		{	
			echo '<option value='.$row["StudentID"].'> '.$row["RollNo"].': '.$row["StudentName"].'</option>';
		}
		echo '</select>
			</div>';
		
		echo "<label>Status</label>";
				echo '<select class="form-control" name="feesstatus1" required>';
				echo '	<option value=""> Select </option>';
				echo '	<option value="Paid">Paid</option>';
				echo '	<option value="UnPaid">UnPaid</option>';
				echo '</select>';
		
		echo '<label>Date</label>';
		echo '<input class="form-control" name="paidon1" type="date" value="" required>';
		echo ' <br>';
		echo '<input class="btn btn-primary" name="submit" type="submit" value="Insert">';
		echo "</div>";
		echo "</form>";
	}
?>
		
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
	
<form action="#" method="post">
	<!-- Method can be set as POST for hiding values in URL-->
	<div class='form-group'>
	

			<label>Class</label>
				<select class="form-control" name="class1" required>
					<option value="null"> Select </option>
					<option value=1>1</option>
					<option value=2>2</option>
					<option value=3>3</option>
					<option value=4>4</option>
					<option value=5>5</option>
					<option value=6>6</option>
					<option value=7>7</option>
					<option value=8>8</option>
					<option value=9>9</option>
					<option value=10>10</option>
				</select>
				<br>
				<input class='btn btn-primary' type="submit" class="button" name="insert" value="Submit" />
		</div>
				</form>
	
			<?php 
				
				 if(isset($_POST['insert']))
							{
								att();
							}
			?>
	</div>
	

</div>
</div>
</body>
</html>