<?php
session_start();
include_once('../include/connection.php');
$data123 =$_SESSION['customerCardNumber'];

// $_GET[]
 if($sql = mysqli_query($con,"SELECT `amount` FROM `food` WHERE foodId = 1"))
 {
    if(mysqli_num_rows($sql)>0)
   {
    $row = mysqli_fetch_assoc($sql);
     $amount =$row['amount'];
     if($sqlbalance = mysqli_query($con,"SELECT balanceRemain FROM `balance`,customer WHERE    Bcardnumber = $data123 and balanceStatus =1"))
     {
        if(mysqli_num_rows($sqlbalance)>0)
        {
         $rowbalance = mysqli_fetch_assoc($sqlbalance);
        if($rowbalance['balanceRemain'] >= $amount)
        {
            if($sql2 = mysqli_query($con,"update   balance set  balanceRemain = balanceRemain - $amount   WHERE   Bcardnumber = $data123"))
            {
               echo "balance updated";  
            }
            else{
                 echo "balance not updated" ;
            }
        }
        else{
            echo "no enough balance";
        }
        }
        }
     }
 }
 else
 {
 echo " request service not complited";
 }











?>
