<?php
include_once('include/connection.php');

$cardNumber = $_POST['cardNumber'];

// Prepare the query
$sql = "SELECT balance.balance, customer.FirstName, customer.phoneNumber FROM balance INNER JOIN customer ON balance.Ccardnumber = customer.cardNumber WHERE balance.Ccardnumber= '$cardNumber'";

// Execute the query
$result = $con->query($sql);

if ($result->num_rows > 0) {
    // Fetch the data
    $row = $result->fetch_assoc();
    
    // Print the data
    echo "balance: " . $row['balance'] . "\n";
    echo "firstName: " . $row['FirstName'] . "\n";
    echo "phoneNumber: " . $row['phoneNumber'] . "\n";
} else {
    // Print an error message
    echo "error: No results found for the specified cardNumber.";
}

// Close the connection
$con->close();
?>
