<?php
include_once 'include/connection.php';

$Ccardnumber = $_GET["cardNumber"];
$balance = $_GET["balance"];

$queryb = mysqli_query($con, "SELECT * FROM balance WHERE Ccardnumber='$Ccardnumber'");
$numb = mysqli_num_rows($queryb);

if($numb==0){
    $insertQuery = mysqli_query($con, "INSERT INTO balance (Ccardnumber,balance balanceStatus) VALUES ($Ccardnumber,$balance,1)");
} else {
    // User already exists, update balance
    $updateQuery = mysqli_query($con, "UPDATE balance SET balance = balance + $balance WHERE Ccardnumber = '$Ccardnumber'");

    if ($updateQuery) {
         $insertQuery = mysqli_query($con, "INSERT INTO balance_recharge (balance, card_Number) VALUES ($balance, $Ccardnumber)");

        if ($insertQuery) {
            echo "successfully";
        } else {
            echo "Failed to add balance";
        }
    } else {
        echo "Failed to update balance";
    }
}

$con->close();
?>
