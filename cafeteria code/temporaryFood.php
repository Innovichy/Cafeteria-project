<?php
session_start();
include_once('include/connection.php');

if (isset($_GET['ScanedCardnumber']) && isset($_GET['foodID'])) {
    $card = $_GET['ScanedCardnumber'];
    $foodID = $_GET['foodID'];

    $sql = "INSERT INTO scanneddata(Usercardnumber, userPassword) VALUES('$card', '$foodID')";

    $result = mysqli_query($con, $sql);
    if ($result) {
        echo "Successful";
    } else {
        echo "Not successful";
    }
} else {
    echo "Incomplete parameters";
}
?>
