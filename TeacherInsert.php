<?php
include("connection.php");

if(isset($_POST['submit']))
{ 
	$tName = $_POST['t_Name'];
	$tadd = $_POST['t_add'];
	$tcont = $_POST['t_cont'];
	$dat = $_POST['t_dat'];
	$tgen = $_POST['t_gen'];

	
if($tName !=''){
	
$sql = ("Insert into Teacher(TeacherName,Address,Contact,JoinDate,Gender) Values ('$tName','$tadd','$tcont','$dat','$tgen')");
$query = sqlsrv_query($conn, $sql);
echo "<br/><br/><span>Data Inserted successfully...!!</span>";
header("Location:Teacher.php");
}
else{
echo "<p>Insertion Failed <br/> Some Fields are Blank or you have entered wrong data....!!</p>";
}
}
?>




