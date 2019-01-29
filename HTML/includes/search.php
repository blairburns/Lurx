<?php

include 'connect.php';

$string = $_POST['search'];

if (isset($string)){


$lowerString = strtolower($string);

if ($lowerString == 'sale') {
    $saleString = 1;
}else {
    $saleString = $string;
}

$Products_db = $mysqli->query("SELECT * FROM Products WHERE name LIKE '%$string%' OR brand LIKE '%$string%' OR price LIKE '%$string%' OR sale LIKE '%$saleString%'");

$dbdata = array();

while ($row = $Products_db->fetch_assoc())  {
	$dbdata[]=$row;
}

header('Content-Type: application/json');

echo json_encode($dbdata);

}
?>