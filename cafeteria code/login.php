<?php
include_once('include/connection.php');

// Get the data from the ESP32 NodeMCU
$cardNumber= $_GET["cardNumber"];
$password = $_GET["password"];

// Create the select query
$sql = "SELECT password FROM customer WHERE cardNumber= '$cardNumber'";

$result = $con->query($sql);

if ($result->num_rows > 0) {
    // Output data of each row
    $row = $result->fetch_assoc();
    if($row["password"] == $password){
        echo "Successful";
    }else {
        echo "Incorrect CardNo or password";
    }
} else {
    echo "Incorrect CardNo or password";
}

$con->close();

?>
