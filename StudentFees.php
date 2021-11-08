<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<!-- CSS -->
	<link rel="stylesheet" href="assets/styles/bootstrap.min.css">
	<link rel="stylesheet" href="assets/styles/style.css" />
	
	 
	<title>StudentFees</title>
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

							$sql = "Select * from StudentFees";
							$query = sqlsrv_query($conn, $sql);

							if($query == false)
							{
								die(print_r(sqlsrv_errors(), true));
							}
							else
							{ 
								echo "<thead>
									<tr>
								<th class='table-active' colspan='10'><center><h5>Student Table</h5></center></th>
								</tr></thead>";
						
								echo "<th>StudentID</th>
									<th>FeesStatus</th>
									<th>PaidOn</th>
									";
								while($row = sqlsrv_fetch_array($query, SQLSRV_FETCH_ASSOC))
								{	
									echo '<tr> 
									<td>'.$row["StudentID"].'</td> 
									<td>'.$row["FeesStatus"].'</td> 
									<td>'.$row["PaidOn"].'</td> 
									<td>'."<b><a href='StudentFeesUpdate.php?update={$row['StudentID']}'>UPDATE</a></b>".'</td> 
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