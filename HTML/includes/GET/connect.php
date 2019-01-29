<?php

//reports errors
error_reporting(E_ALL);
ini_set('display_errors', 'on');


try {
    $mysqli = new mysqli("localhost", "admin", "admin", "LURX");
}catch(Exception $e) {
    echo "failed" + $e;
}

$Products_db = $mysqli->query("SELECT * FROM Products");
$Employees_db = $mysqli->query("SELECT * FROM Employees");
$Accounts_db = $mysqli->query("SELECT * FROM Accounts");

?>