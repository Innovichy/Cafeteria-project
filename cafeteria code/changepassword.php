<?php
include_once('include/connection.php');

// Get the data from the ESP32 NodeMCU
$cardNumber= $_GET["cardNumber"];
$password = $_GET["password"];

// Create the select query
$sql = "UPDATE customer SET password='$password' WHERE cardNumber= '$cardNumber'";

$result = $con->query($sql);

if ($result) {
  
        echo "Successful";
    }else {
        echo "failed to change";
    }


$con->close();

?>
