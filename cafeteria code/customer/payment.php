<?php
session_start();
include_once('../include/connection.php');

if( $_GET['phone'] && $_GET['payment'] )
{    
    $phone ="+".$_GET['phone'];
    $pay =$_GET['payment'];
    
                if($phone = mysqli_query($con,"select cardnumber from customer where phonenumber = '$phone'"))
                {
                    if(mysqli_num_rows($phone) > 0)
                    {
                        $row = mysqli_fetch_assoc($phone);
                        $card = $row["cardnumber"];
                        $query ="select  * from balance where BcardNumber = $card";
            $datainput = "INSERT INTO `balance`(`Bcardnumber`,`balance`,`balanceStatus`,`balanceRemain`) VALUES ($card,$pay,0,$pay)";

                        // echo " the id =$userid  and  balance = $maxbalance";

                        if($balance = mysqli_query($con, $query))
                        {
                            if(mysqli_num_rows($balance) > 0)
                            {
                                $update = mysqli_query($con,"update balance set  remark='current balance',balanceRemain = balanceRemain + $pay, balanceStatus =1  where BcardNumber =$card");
                                echo "current balance updated";
                              
                                    }
                                    else{
                                        if($balanceinsert = mysqli_query($con, $datainput))
                                            {
                                                if($update = mysqli_query($con,"update balance set  remark='current balance' ,balanceStatus =1  where  BcardNumber =$card"))
                                                {
                    
                                                    echo " balance ";
                                                }else{
                                                    echo  "no balce";
                                                }
                    
                                            }
                                            else{
                                                echo " something went wrong";
                                            }
                                            
                                        }
                    
                        }
                        else{
                            echo " something went wrong"; 
                            // "http://localhost/cafeteria/customer/payment.php?phone=255766942257&payment=89900"
                        }

            }else{
                echo " wrong number or user not present";
            }

}
else{
    echo "something went wrong";
}

             }      
?>