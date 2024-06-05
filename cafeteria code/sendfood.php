<?php
include_once('include/connection.php');

// Get the foodId and cardNumber from NodeMCU ESP32
$foodId =$_GET['foodId'];
$Ccardnumber = $_GET['cardNumber'];
$randomCombination = $_GET['randomCombination'];

// Get the amount of the selected food
$foodAmountQuery = "SELECT `amount` FROM `food` WHERE `foodId` = $foodId";
$foodAmountResult = mysqli_query($con, $foodAmountQuery);
$foodAmountRow = mysqli_fetch_assoc($foodAmountResult);
$foodAmount = $foodAmountRow['amount'];

// Check if the balance is sufficient
$checkBalanceQuery = "SELECT `balance` FROM `balance` WHERE `Ccardnumber` = '$Ccardnumber'";
$checkBalanceResult = mysqli_query($con, $checkBalanceQuery);
$balanceRow = mysqli_fetch_assoc($checkBalanceResult);
$balance = $balanceRow['balance'];

if ($balance < $foodAmount) {
    // Insufficient balance
    $response = array(
        'status' => 'error',
        'message' => 'Insufficient balance.'
    );
} else {
    // Reduce the balance by the food amount
    $updateBalanceQuery = "UPDATE `balance` SET `balance` = `balance` - $foodAmount WHERE `Ccardnumber` = '$Ccardnumber'";
    mysqli_query($con, $updateBalanceQuery);

   


   $foodreport ="INSERT INTO `foodreport`(`foodReportId`,`cardnumber`,`ticket`) VALUES ($foodId,'$Ccardnumber','$randomCombination')";
   if(mysqli_query($con,$foodreport))
   {
    $response = array(
        'status' => 'success',
        'message' => 'Balance deducted successfully.'
    );
   }
}



// Convert the response to JSON
$json = json_encode($response);

// Print the JSON response
echo $json;

// Close the database connection
mysqli_close($con);
?>
