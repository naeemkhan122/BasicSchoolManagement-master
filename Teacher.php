
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<!-- CSS -->
	<link rel="stylesheet" href="assets/styles/bootstrap.min.css">
	<link rel="stylesheet" href="assets/styles/style.css" />
	 
	<title>Teacher</title>
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

							$sql = "Select * from Teacher";
							$query = sqlsrv_query($conn, $sql);

							if($query == false)
							{
								die(print_r(sqlsrv_errors(), true));
							}
							else
							{ 
								echo "<thead>
									<tr>
								<th class='table-active' colspan='10'><center><h5>Teacher Table</h5></center></th>
								</tr></thead>";
						
								echo "<th>Id</th>
									<th>Teacher Name</th>
									<th>Address</th>
									<th>Contact</th>
									<th>JoinDate</th>
									<th>Gender</th>
									";
								while($row = sqlsrv_fetch_array($query, SQLSRV_FETCH_ASSOC))
								{	
									echo '<tr> 
									<td>'.$row["TeacherID"].'</td> 
									<td>'.$row["TeacherName"].'</td> 
									<td>'.$row["Address"].'</td> 
									<td>'.$row["Contact"].'</td> 
									<td>'.$row["JoinDate"].'</td> 
									<td>'.$row["Gender"].'</td>
									<td>'."<b><a  href='TeacherUpdate.php?update={$row['TeacherID']}'>UPDATE</a></b>".'</td> 
									<td>'."<b><a class='text-danger' href='TeacherDelete.php?id={$row['TeacherID']}'>DELETE</a></b>".'</td> 
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