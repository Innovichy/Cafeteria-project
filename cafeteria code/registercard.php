<?php
include_once('include/connection.php');

// Get the data from the ESP32 NodeMCU
$cardNumber = $_GET["number"];

// Create the select query
$sql = "INSERT INTO card (cardNumber) VALUES ('$cardNumber')";

if ($con->query($sql) === TRUE) {
    echo "successful";
} else {
    echo "card already present";
}

$con->close();
?>
