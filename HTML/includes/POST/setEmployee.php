<?php

session_start();

if (empty($_SESSION['username'])){
    header("Location: ../../index.html");
    exit();
}

$first = $_POST['first'];
$last = $_POST['last'];
$email = $_POST['email'];
$address = $_POST['address'];
$phone = $_POST['phone'];
$type = $_POST['type'];

if (empty($first) | empty($last) | empty($email)){
    echo "Please complete the form";
    if (empty($adress) | empty($phone) | empty($type)){
        echo "Please complete the form";
    }
}

include '../connect.php';

$mysqli->query("INSERT INTO `Employees`(`ID`, `first`, `last`, `email`, `address`, `phone`, `type`) VALUES ('','$first','$last','$email','$address','$phone','$type')");

header("Location: ../../admin.php");
exit();

?>