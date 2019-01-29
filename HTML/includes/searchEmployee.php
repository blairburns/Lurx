<?php

$string = $_POST['search'];

if (isset($string)){
    include'connect.php';
    
    $employeesFound = $mysqli->query("SELECT * FROM Employees WHERE first LIKE '%$string%' OR last LIKE '%$string%' OR email LIKE '%$string%' OR phone LIKE '%$string%' OR address LIKE '%$string%'");

    $dbdata = array();

    while ($row = $employeesFound->fetch_assoc())  {
	$dbdata[]=$row;
    }

    header('Content-Type: application/json');

    echo json_encode($dbdata);
    }

?>