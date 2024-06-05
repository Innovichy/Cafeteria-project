<?php
session_start();

if (isset($_GET['ScanedCardnumber']) && isset($_GET['userpassword'])) {
    $scanedCardnumber = $_GET['ScanedCardnumber'];
    $userpassword = $_GET['userpassword'];

    // Use the session data as needed
    echo "Scaned Card Number: $scanedCardnumber<br>";
    echo "User Password: $userpassword";
} else {
    echo "Incomplete parameters";
}
?>
