<?php
include("connection.php");

if(isset($_POST['submit']))
{ // Fetching variables of the form which travels in URL
	$atten = $_POST['atten1'];
	$status = $_POST['status1'];
	$dateofd = $_POST['dateofd1'];
	
if($atten !=''){
	
$sql = ("Begin Transaction Insert into Attendence(AttendanceID,Status,DateOfDay) Values ('$atten','$status','$dateofd') Commit");
$query = sqlsrv_query($conn, $sql);


}
else{
echo "<p>Insertion Failed <br/> Some Fields are Blank or you have entered wrong data....!!</p>";
}
}
?>




