

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
<?php
include("connection.php");
if (isset($_GET['del'])) 
{
	$del = $_GET['del'];

	$query1 = sqlsrv_query( $conn, "delete from Teacher where TeacherID=$del");
	header("Location:Teacher.php");
}

?>
</div><?php
if (isset($_GET['id'])) {
$id = $_GET['id'];

$query1 = sqlsrv_query($conn, "select * from Teacher where TeacherID=$id");
while ($row1 = sqlsrv_fetch_array($query1, SQLSRV_FETCH_ASSOC)) {
?>
<form class="form">
<ul class="list-group">
  <li class="list-group-item"><span><b>Teacher ID</b> &nbsp </span> <?php echo $row1['TeacherID']; ?></li>
  <li class="list-group-item"><span><b>Teacher Name</b> &nbsp </span> <?php echo $row1['TeacherName']; ?></li>
  <li class="list-group-item"><span><b>Address </b> &nbsp </span> <?php echo $row1['Address']; ?></li>
  <li class="list-group-item"><span><b>Contact </b> &nbsp </span> <?php echo $row1['Contact']; ?></li>
  <li class="list-group-item"><span><b>Join Date </b> &nbsp </span> <?php echo $row1['JoinDate']; ?></li>
  <li class="list-group-item"><span><b>Gender </b> &nbsp </span> <?php echo $row1['Gender']; ?></li>
  <li>
</ul>
<br>
<center>
<?php echo "<b><a href='TeacherDelete.php?del={$row1['TeacherID']}'><input class='btn btn-danger' type='button' name='submit' value='Delete'/></a></b>"; 

if (isset($_GET['Delete'])) {
echo '<div class="form" id="form3"><br><br><br><br><br><br>
<Span>Data deleted Successfuly......!!</span></div>';

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