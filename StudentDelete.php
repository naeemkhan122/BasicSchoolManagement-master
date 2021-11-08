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
if (isset($_GET['del'])) 
{
	$del = $_GET['del'];
	
	$query1 = sqlsrv_query( $conn, "delete from Registration where StudentID=$del");
}

?>
</div><?php
if (isset($_GET['id'])) {
$id = $_GET['id'];

$query1 = sqlsrv_query($conn, "select * from Student where StudentID=$id");
while ($row1 = sqlsrv_fetch_array($query1, SQLSRV_FETCH_ASSOC)) {
?>
<form class="form">
<ul class="list-group">
  <li class="list-group-item"><span><b>Name</b> &nbsp </span> <?php echo $row1['StudentName']; ?></li>
  <li class="list-group-item"><span><b>FatherName &nbsp </b> </span> <?php echo $row1['FatherName']; ?></li>
  <li class="list-group-item"><span><b>Address </b> &nbsp </span> <?php echo $row1['Address']; ?></li>
  <li class="list-group-item"><span><b>Contact </b> &nbsp </span> <?php echo $row1['Contact']; ?></li>
  <li class="list-group-item"><span><b>DOB </b> &nbsp </span> <?php echo $row1['DOB']; ?></li>
  <li class="list-group-item"><span><b>Gender </b> &nbsp </span> <?php echo $row1['Gender']; ?></li>
  <li class="list-group-item"><span><b>AdmissionDate </b> &nbsp </span> <?php echo $row1['AdmissionDate']; ?></li>
  <li class="list-group-item"><span><b>Class </b> &nbsp </span> <?php echo $row1['Class']; ?></li>
  <li>
</ul>
<br>
<center>
<?php echo "<b><a href='StudentDelete.php?del={$row1['StudentID']}'><input class='btn btn-warning' type='button' name='submit' value='Delete'/></a></b>"; 

if (isset($_GET['submit'])) {
echo '<div class="form" id="form3"><br><br><br><br><br><br>
<Span>Data Deleted Successfuly......!!</span></div>';
header("Location:Student.php");
}
?>

</center>
</form>
<?php
}
}

sqlsrv_close($conn);

?>
<div class="clear"></div>
</div>
<div class="clear"></div>
</div>
</body>
</html>