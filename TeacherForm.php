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
<form action="TeacherInsert.php" method="post">
	<div class='form-group'>
		<h2>Teacher Insertion</h2>
		<label>Teacher Name</label>
		<input class='form-control' name="t_Name" type="text" value="" required>
		<label>Address</label>
		<input class="form-control" name="t_add" type="text" value="" required>
		<label>Contact</label>
		<input class="form-control" name="t_cont" type="text" value="" required>
		<label>JoinDate</label>
		<input class="form-control" name="t_dat" type="date" value="" required>
		<div class='form-group'>
			<label>Gender</label>
				<select class='form-control' name='t_gen' required>
				  <option value='M'> Male</option>
				  <option value='F'>Female</option>  
				</select></div>
			<br>
		<input class='btn btn-primary' name="submit" type="submit" value="Insert">
	</div>
	</form>

</div>
</div>
</body>
</html>