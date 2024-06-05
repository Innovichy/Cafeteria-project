<?php
include_once('include/connection.php');

if (isset($_GET['cardnumber']) && isset($_GET['payment'])) {
    $cardnumber = $_GET['cardnumber'];
    $payment = $_GET['payment'];

    // Validate and sanitize input
    $cardnumber = mysqli_real_escape_string($con, $cardnumber);
    $payment = intval($payment); // Convert payment to an integer

    $selectQuery = "SELECT cardnumber FROM customer WHERE cardnumber = '$cardnumber'";
    $insertQuery = "INSERT INTO balance (Ccardnumber, balance, balanceStatus) VALUES ('$cardnumber', $payment, 1)";

    $selectStmt = mysqli_prepare($con, $selectQuery);
    mysqli_stmt_execute($selectStmt);
    $result = mysqli_stmt_get_result($selectStmt);

    if (mysqli_num_rows($result) > 0) {
        $balanceQuery = "SELECT id FROM balance WHERE Ccardnumber = '$cardnumber'";
        $balanceStmt = mysqli_prepare($con, $balanceQuery);
        mysqli_stmt_execute($balanceStmt);
        $balanceResult = mysqli_stmt_get_result($balanceStmt);

        if (mysqli_num_rows($balanceResult) > 0) {
            $balanceRow = mysqli_fetch_assoc($balanceResult);
            $balanceId = $balanceRow['id'];

            $updateQuery = "UPDATE balance SET balance = balance + ? WHERE Ccardnumber = '$cardnumber'";
            $updateStmt = mysqli_prepare($con, $updateQuery);
            mysqli_stmt_bind_param($updateStmt, "i", $payment);
            mysqli_stmt_execute($updateStmt);
            $comment = "successfully";
            myhistory($con, $balanceId, $payment, $comment);
        } else {
            $insertStmt = mysqli_prepare($con, $insertQuery);
            mysqli_stmt_execute($insertStmt);
            $lastId = mysqli_insert_id($con);
            $comment = "successfully";
            myhistory($con, $lastId, $payment, $comment);
        }
    } else {
        echo "User not present";
    }
} else {
    echo "Incomplete parameters";
}

function myhistory($con, $number, $amount, $comment)
{
    $dataRechargeQuery = "INSERT INTO balance_recharge (rechargeid, balance) VALUES (?, ?)";
    $dataRechargeStmt = mysqli_prepare($con, $dataRechargeQuery);
    mysqli_stmt_bind_param($dataRechargeStmt, "ii", $number, $amount);
    mysqli_stmt_execute($dataRechargeStmt);

    if ($dataRechargeStmt) {
        echo $comment;
    } else {
        return "Failed to add balance";
    }
}
