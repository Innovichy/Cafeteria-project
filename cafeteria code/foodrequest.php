
<?php
include_once('include/connection.php');
//include_once('login.php');
// Get the foodId and cardNumber from NodeMCU ESP32
 echo $foodId = $_GET['foodId'];
 echo $cardNumber = $_GET['cardNumber'];
                //queries 
$foodsql = "SELECT * FROM food WHERE foodId = $foodId";
$customerSql ="SELECT PhoneNumber,balance FROM `customer`,balance WHERE  customer.cardNumber = '$cardNumber' and balance.Ccardnumber = '$cardNumber'";
    //connetion to databse
$foodresult = mysqli_query($con,$foodsql);
$customerresult = mysqli_query($con,$customerSql);
        //checking connection
        if(!$customerresult && !$foodresult)
        {
            echo " wrong";
        }
        else{
            $cphone; $balance; $fooddata; $foodAmount; $foodId;
         
            if(mysqli_num_rows($customerresult)>0)
            {
                 $customerdata = mysqli_fetch_assoc($customerresult);
                 $cphone       = $customerdata['PhoneNumber'];
                 $balance      = $customerdata['balance'];
            }
            else{
                echo " no such food ";
                return;
            }
            if(mysqli_num_rows($foodresult))
            {
                $fooddata     = mysqli_fetch_assoc($foodresult);
                $foodAmount   = $fooddata['amount'];
                $foodId       = $fooddata['foodId'];

            }
            else{
                echo " no such food ";
                return;
            }
            
            if(!empty( $cphone) && !empty($foodId))
            {
                foodHistory($con,$foodId,$cphone);

            }
            else{
                 echo " somethng is empty";
            }
          


        }
//function  to keep record of food
function foodHistory($con,$foodid,$cphone)
{
    $insert= "insert into foodreport(foodReportId,CPhoneNumber)values($foodid,$cphone)";
    if(mysqli_query($con,$insert))
    {
        echo "success";
    }
    else
    {
        echo " not success".mysqli_error($con);
    }
}
            // use this link to request food
   // "http://localhost/cafeteria/foodrequest.php?foodId=1&cardNumber=99110022"


?>