<?php
include("connection.php");

if(isset($_POST['submit']))
{ // Fetching variables of the form which travels in URL
	$fee1 = $_POST['fee1'];
	$status = $_POST['feesstatus1'];
	$dateofd = $_POST['paidon1'];
	
if($fee1 !=''){
	
$sql = ("Begin Transaction Insert into StudentFees (StudentID,FeesStatus,PaidOn) Values ('$fee1','$status','$dateofd') Commit");
$query = sqlsrv_query($conn, $sql);


}
else{
echo "<p>Insertion Failed <br/> Some Fields are Blank or you have entered wrong data....!!</p>";
}
}
?>




