
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
			 
				<table class="table table-borderless table-dark">
					<tbody>
					<?php
						include("connection.php");

							$sql = "Select * from Student_log";
							$query = sqlsrv_query($conn, $sql);

							if($query == false)
							{
								die(print_r(sqlsrv_errors(), true));
							}
							else
							{ 
								echo "<thead>
									<tr>
								<th class='table-active' colspan='11'><center><h5>Student Log Table</h5></center></th>
								</tr></thead>";
						
								echo "<th>Id</th>
									<th>Student Name</th>
									<th>Father Name</th>
									<th>Address</th>
									<th>Contact</th>
									<th>DOB</th>
									<th>Gender</th>
									<th>Admission Date</th>
									<th>Class</th>
									<th>Action</th>
									<th>TimeStamp</th>
									";
								while($row = sqlsrv_fetch_array($query, SQLSRV_FETCH_ASSOC))
								{	
									echo '<tr> 
									<td>'.$row["S_ID"].'</td> 
									<td>'.$row["S_name"].'</td> 
									<td>'.$row["F_name"].'</td> 
									<td>'.$row["Address"].'</td> 
									<td>'.$row["Contact"].'</td> 
									<td>'.$row["DOB"].'</td> 
									<td>'.$row["Gender"].'</td> 
									<td>'.$row["AdmissionDate"].'</td> 
									<td>'.$row["Class"].'</td>
									<td>'.$row["Log_action"].'</td>
									<td>'.$row["log_Timestamp"].'</td>									
									</tr>';
													
								}
							}
				sqlsrv_close($conn);
						?>
					</tbody>
				</table>
			
			 <br><br>
		</div>
	</div>
  </body>
</html>