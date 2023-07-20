<?php
require_once 'user-registration/lib/DataSource.php';
session_start();
$database = new \Phppot\DataSource();

if (isset($_POST['itemId'])) {
    $itemId = $_POST['itemId'];
    $timestamp=$_POST['timestamp'];
    $deliveryLocation=$_POST['deliveryLocation'];
    $username = $_SESSION["username"];
    
    $paramType = "siss";
    $paramArray = array($username, $itemId,$timestamp,$deliveryLocation);

    $orders = "INSERT INTO `orders` VALUES (?, ?, ?, ?)";
    $result2 = $database->insert($orders, $paramType, $paramArray);

    if ($result2) {
        echo "Item ID stored successfully.";
    } else {
        echo "Error storing item ID.";
    }
} else {
    echo "Item ID not found.";
}
?>
