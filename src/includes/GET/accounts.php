<?php
//includes the needed scripts
include 'connect.php';

//reports errors
error_reporting(E_ALL);
ini_set('display_errors', 'on');

$result = $GLOBALS['Accounts_db'];

$dbdata = array();

while ($row = $result->fetch_assoc())  {
	$dbdata[]=$row;
}

header('Content-Type: application/json');

echo json_encode($dbdata);

?>