<?php

if (empty($_SESSION['username'])){
    header("Location: ../../index.html");
    exit();
}

$name = $_POST['name'];
$brand = $_POST['brand'];
$imageURL = $_POST['imageURL'];
$price = $_POST['price'];
$salePrice = $_POST['salePrice'];
$delivery = $_POST['delivery'];
$sale = $_POST['sale'];

if (empty($name) | empty($brand) | empty($imageURL)){
    echo "Please complete the form";
    if (empty($price) | empty($salePrice)){
        echo "Please complete the form";
    }
}

include '../connect.php';

$mysqli->query("INSERT INTO `Products`(`ID`, `name`, `brand`, `price`, `salePrice`, `imageURL`, `delivery`, `sale`) VALUES ('','$name','$brand','$price','$salePrice','$imageURL','$delivery','$sale')");

header("Location: ../../admin.php");
exit();

?>