<?php
session_start();
include_once('include/connection.php');

if (isset($_GET['ScanedCardnumber']) && isset($_GET['userpassword'])) {
    $card = $_GET['ScanedCardnumber'];
    $pass = $_GET['userpassword'];

    $sql = "INSERT INTO scanneddata(Usercardnumber, userPassword) VALUES('$card', '$pass')";

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
