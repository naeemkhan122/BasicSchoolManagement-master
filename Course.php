<?php
	
	
	function student(){
	include("connection.php");
	
	$sql = "Select * from Course";

	$query = sqlsrv_query($conn, $sql);

	if($query == false)
	{
	die(print_r(sqlsrv_errors(), true));
	} 	
	else
	{ 
		echo "<thead>
		<tr>
		<th class='table-active' colspan='4'><center><h5>Courses Table</h5></center></th>
		</tr></thead>";

		echo "<th>Course Name</th>
		";
		while($row = sqlsrv_fetch_array($query, SQLSRV_FETCH_ASSOC))
		{	
		echo '<tr> 
		<td>'.$row["CourseName"].'</td>
		<td>'."<b><a href='CourseUpdate.php?update={$row['CourseID']}'>UPDATE</a></b>".'</td> 
		<td>'."<b><a class='text-danger' href='CourseDelete.php?id={$row['CourseID']}'>DELETE</a></b>".'</td>
		
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
				<table id="2" class="table table-borderless table-dark">

					<tbody>
					
					<?php 
						
								student();
						
					?>
					</tbody>
				</table>
			
			 <br><br>
		</div>
	</div>
  </body>
</html>
