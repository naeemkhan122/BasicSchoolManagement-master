<?php 
$server_name = "X"; //servername
$connectionInfo = array("Database"=>"SchoolManagement", 'ReturnDatesAsStrings'=> true,"CharacterSet" => 'utf-8');
$conn = sqlsrv_connect($server_name, $connectionInfo);

if(!$conn)
{
	echo " connection couldn't be esatblished";
		die(print_r(sqlsrv_errors(),true));
}

?>