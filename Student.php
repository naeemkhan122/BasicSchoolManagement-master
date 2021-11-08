<?php
	
	
	function student(){
	include("connection.php");
	
	$class = $_POST['class1'];
	
	$sql = "Select * from Student Where Class = $class";

	$query = sqlsrv_query($conn, $sql);

	if($query == false)
	{
	die(print_r(sqlsrv_errors(), true));
	} 	
	else
	{ 
		echo "<thead>
		<tr>
		<th class='table-active' colspan='11'><center><h5>Student Table</h5></center></th>
		</tr></thead>";

		echo "<th>Student Id</th>
		<th>Student Name</th>
		<th>Father Name</th>
		<th>Address</th>
		<th>Contact</th>
		<th>DOB</th>
		<th>Gender</th>
		<th>Admission Date</th>
		<th>Class</th>
		";
		while($row = sqlsrv_fetch_array($query, SQLSRV_FETCH_ASSOC))
		{	
		echo '<tr> 
		<td>'.$row["RollNo"].'</td> 
		<td>'.$row["StudentName"].'</td> 
		<td>'.$row["FatherName"].'</td> 
		<td>'.$row["Address"].'</td> 
		<td>'.$row["Contact"].'</td> 
		<td>'.$row["DOB"].'</td> 
		<td>'.$row["Gender"].'</td> 
		<td>'.$row["AdmissionDate"].'</td> 
		<td>'.$row["Class"].'</td> 
		<td>'."<b><a href='StudentUpdate.php?update={$row['StudentID']}'>UPDATE</a></b>".'</td> 
		</tr>';
						
		}
	}
	sqlsrv_close($conn);
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
	 
	<title> All Students</title>
  </head>
  
  <body>
  
	<?php include("nav.php"); ?>

	<!-- Main Container Starts -->
	<div class="container-fluid">

		<!-- Main Sub Container Starts -->
		<div class ="main">
			<br>
			 <form action="#" method="POST">
					
					<div class="form-group">
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
					
					<?php if(isset($_POST['insert']))
							{
								echo "<h4> Students Data of Class ";
								echo $_POST['class1'];
								echo "</h4>";
							}
							?>
					
				<table id="2" class="table table-borderless table-dark">

					<tbody>
					
					<?php 
						 if(isset($_POST['insert']))
							{
								student();
							}
					?>
					</tbody>
				</table>
			
			 <br><br>
		</div>
	</div>
  </body>
</html>
