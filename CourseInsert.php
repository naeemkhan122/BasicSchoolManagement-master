<?php
include("connection.php");

if(isset($_POST['submit']))
{ 
	$cName = $_POST['c_name'];
	
if($cName !=''){
	
$sql = ("Insert into Course(CourseName) Values ('$cName')");
$query = sqlsrv_query($conn, $sql);
echo "<br/><br/><span>Data Inserted successfully...!!</span>";
header("Location:CourseInsert.php");
}
else{
echo "<p>Insertion Failed <br/> Some Fields are Blank or you have entered wrong data....!!</p>";
	}
}
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="stylesheet" href="assets/styles/bootstrap.min.css">
	<link rel="stylesheet" href="assets/styles/style.css" />
	 
	<title>Teacher</title>
  </head>
  
  <body>
  <?php include("nav.php"); ?>
	<div class="container-fluid">
	
		<div class ="main">
			<br>
<form action="#" method="post">
	<div class='form-group'>
		<h2>Add New Course</h2>
		<label>Course Name</label>
		<input class='form-control' name="c_name" type="text" value="" required>
		<br>
		<input class='btn btn-primary' name="submit" type="submit" value="Insert">
	</div>
	</form>

</div>
</div>
</body>
</html>