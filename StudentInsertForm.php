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
	
<form action="StudentInsert.php" method="post">
	<!-- Method can be set as POST for hiding values in URL-->
	<div class='form-group'>
		<h2>Student Insertion</h2>
		<label>Student Name</label>
		<input class='form-control' name="sName1" type="text" value="" required>
		<label>RollNumber</label>
		<input class='form-control' name="rollnum1" type="text" value="" required>
		<label>Father Name</label>
		<input class="form-control" name="fName1" type="text" value="" required>
		<label>Address</label>
		<input class="form-control" name="add1" type="text" value="" required>
		<label>Contact</label>
		<input class="form-control" name="cont1" type="text" value="" required>
		<label>DOB </label>
		<input class="form-control" name="dob1" type="date" value="" required>
		<div class="form-group">
			<label>Gender</label>
				<select class="form-control" name="gen1" required>
				  <option value="M">Male</option>
				  <option value="F">Female</option>
				</select>
		</div>
		<label>Admission Date</label>
		<input class="form-control" name="addate1" type="date" value="" required>
		<label>Class</label>
		<input class="form-control" type="text" value="">
		<div class="form-group">
			<label>Class</label>
				<select class="form-control" name="class1" required>
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
		</div>
		<br>
		<input class='btn btn-primary' name="submit" type="submit" value="Insert">
	</div>
	</form>

</div>
</div>
</body>
</html>