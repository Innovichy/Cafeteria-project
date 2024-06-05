<?php
session_start();
include_once('include/connection.php');
// use this link to recharge
   // "http://localhost/cafeteria/thepayment.php?cardnumber=99110022&payment=60000"
if( $_GET['cardnumber'] && $_GET['payment'] )
{    
    $cardnumber =$_GET['cardnumber'];
    $pay =$_GET['payment'];
    
                if($insertion = mysqli_query($con,"select cardnumber from customer where cardNumber = '$cardnumber'"))
                {
                    if(mysqli_num_rows($insertion) > 0)
                    {
                        $row = mysqli_fetch_assoc($insertion);
                        $card = $row["cardnumber"];
                        $query ="select  * from balance where Ccardnumber = $card";
                        $datainput = "INSERT INTO `balance`(`Ccardnumber`,`balance`,balanceStatus) VALUES ('$card',$pay,1)";

                        // echo " the id =$userid  and  balance = $maxbalance";

                        if($balance = mysqli_query($con, $query))
                        {
                            if(mysqli_num_rows($balance) > 0)
                            { 
                                 $thebalance =mysqli_fetch_assoc($balance);
                                     $balanceid =$thebalance['id'];
                                 if($update = mysqli_query($con,"update balance set balance= balance + $pay  where Ccardnumber =$card"))
                                 {
                                     $comment = "successfully";
                                        myhistory($con,$balanceid,$pay,$comment);

                                 }else{
                                    echo " balance not updated";
                                    // echo " balance not updated".mysqli_error($con);
                                 }
                              
                            }
                            else{
                                if($balanceinsert = mysqli_query($con, $datainput))
                                    {
                                    $comment=  "successfully";
                                        $last_id = mysqli_insert_id($con);
                                        myhistory($con,$last_id,$pay,$comment);


                                }else{
                                    echo "po";
                                }
                    
                        }
                        }
                        else{
                            echo " something went wrong"; 
                         
                        }
           
                     }
                     else{
                     echo "user not present";
                        }
                }
                else{
                    echo "something went wrong 3";
                }
  
    
                
                
               
                
}
function myhistory($con,$number,$amount,$comment)
{
   $datareharge = "INSERT INTO `balance_recharge`(`rechargeid`,`balance`) VALUES ($number,$amount)";
   if(mysqli_query($con,$datareharge))
   {
echo $comment;
   }
   else{
       echo " Failed to add balance";
    //    echo " data not inserted ".mysqli_error($con);
   }

}
?>