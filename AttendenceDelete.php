<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="stylesheet" href="assets/styles/bootstrap.min.css">
	<link rel="stylesheet" href="assets/styles/style.css" />
	
	 
	<title>Attendence</title>
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
	$date = $_GET['dat'];
	$query1 = sqlsrv_query( $conn, "delete from Attendence where AttendanceID=$del and DateOfDay = '$date'");
	
	header("Location:Attendance.php");
}

?>
</div><?php
if (isset($_GET['id'])) {
$id = $_GET['id'];
$date = $_GET['dat'];
$query1 = sqlsrv_query($conn, "Select * from Attendence as A
				Inner Join Student as S ON
				S.StudentID = A.AttendanceID where AttendanceID=$id and DateOfDay = '$date'");
while ($row1 = sqlsrv_fetch_array($query1, SQLSRV_FETCH_ASSOC)) {
?>
<form class="form">
<ul class="list-group">
 <li class="list-group-item"><span><b>Id</b> &nbsp </span> <?php echo $row1['StudentName']; ?></li>
  <li class="list-group-item"><span><b>Status</b> &nbsp </span> <?php echo $row1['Status']; ?></li>
    <li class="list-group-item"><span><b>Date </b> &nbsp </span> <?php echo $row1['DateOfDay']; ?></li>

  <li>
</ul>
<br>
<center>
<?php echo "<b><a href='AttendenceDelete.php?del={$row1['AttendanceID']}&dat={$row1['DateOfDay']}'><input class='btn btn-danger' type='button' name='submit' value='Delete'/></a></b>"; 

if (isset($_GET['del'])) {
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