<?php
include("connection.php");

if(isset($_POST['submit']))
{ 
	$sName = $_POST['sName1'];
	$fName = $_POST['fName1'];
	$add = $_POST['add1'];
	$cont = $_POST['cont1'];
	$dob = $_POST['dob1'];
	$gen = $_POST['gen1'];
	$addate = $_POST['addate1'];
	$class = $_POST['class1'];
	$rollnum = $_POST['rollnum1'];
	
if($sName !=''){
	
$sql = ("Begin Transaction Insert into Student(StudentName,FatherName,Address,Contact,DOB,Gender,AdmissionDate,Class,RollNo) Values ('$sName','$fName','$add','$cont','$dob','$gen','$addate',$class,'$rollnum') Commit");
$query = sqlsrv_query($conn, $sql);
echo "<br/><br/><span>Data Inserted successfully...!!</span>";
header("Location:RegisteredStudents.php");
}
else{
echo "<p>Insertion Failed <br/> Some Fields are Blank or you have entered wrong data....!!</p>";
}
}
?>




