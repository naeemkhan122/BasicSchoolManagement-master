<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<!-- CSS -->
	<link rel="stylesheet" href="assets/styles/bootstrap.min.css">
	<link rel="stylesheet" href="assets/styles/style.css" />
	
	 
	<title>Course</title>
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
	
	$query1 = sqlsrv_query( $conn, "delete from Course where CourseID=$del");
	header("Location:Course.php");
}

?>
</div><?php
if (isset($_GET['id'])) {
$id = $_GET['id'];

$query1 = sqlsrv_query($conn, "select * from Course where CourseID=$id");
while ($row1 = sqlsrv_fetch_array($query1, SQLSRV_FETCH_ASSOC)) {
?>
<form class="form">
<ul class="list-group">
  <li class="list-group-item"><span><b>Id</b> &nbsp </span> <?php echo $row1['CourseID']; ?></li>
  <li class="list-group-item"><span><b>CourseName &nbsp </b> </span> <?php echo $row1['CourseName']; ?></li>
  
</ul>
<br>
<center>
<?php echo "<b><a href='CourseDelete.php?del={$row1['CourseID']}'><input class='btn btn-warning' type='button' name='submit' value='Delete'/></a></b>"; 

if (isset($_GET['submit'])) {
echo '<div class="form" id="form3"><br><br><br><br><br><br>
<Span>Data Deleted Successfuly......!!</span></div>';

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