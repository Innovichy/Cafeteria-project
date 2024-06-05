<?php
session_start();
include_once('../include/connection.php');
$data123 =$_SESSION['customerCardNumber'];

if( $_GET['phone'] && $_GET['payment'] )
{    
    $phone ="+".$_GET['phone'];
    $pay =$_GET['payment'];
$lastid ;
    
                if($phone = mysqli_query($con,"select cardnumber from customer where phonenumber = '$phone'"))
                {
                    if(mysqli_num_rows($phone) > 0)
                    {
                        $row = mysqli_fetch_assoc($phone);
                        $card = $row["cardnumber"];
                        $query ="select  * from balance where BcardNumber = $card";
            $maxid;    
            $datainput = "INSERT INTO `balance`(`Bcardnumber`,`balance`,`balanceStatus`,`balanceRemain`) VALUES ($card,$pay,0,$pay)";

                if($select = mysqli_query($con,"select  id, sum(balanceremain) as summation from balance where Bcardnumber ='$card'" ))
                {
                    $row =mysqli_fetch_assoc($select);
                    if( $row['id']>0) {

                        $userid= $row['id']; 
                        $maxbalance= $row['summation'];
                        // echo " the id =$userid  and  balance = $maxbalance";

                        if($insert = mysqli_query($con, $datainput))
                        {
                             $thelastId =mysqli_query($con,"select max(id) as maxid from balance where bcardnumber=$card");
                              $result =mysqli_fetch_assoc($thelastId);
                           echo "last ". $getlastid =$result['maxid'];
                            if($selectupdate = mysqli_query($con,$query))
                            {
                                if(mysqli_num_rows($selectupdate) > 0)
                                {
                                    while($rowUpdate = mysqli_fetch_assoc($selectupdate) )
                                    {
                                        $id =$rowUpdate["balanceStatus"];
                                          $thelastid =$rowUpdate["id"];
                                          
                                          // echo $thelastid;
                                          if( $getlastid == $thelastid+1)
                                          {
                                       echo "lat 2". $thelastid ."<br>";
                      $update = mysqli_query($con,"update balance set  remark='current balance',balanceRemain = balanceRemain + $maxbalance, balanceStatus =1  where BcardNumber =$card");
                                    echo "current balance";
                                    echo " the balance is ".$rowUpdate['balance'];
                                     echo " the max balance is ". $maxbalance;
                                    break;
                                    }
                                    else{
                                    if($rowUpdate["balanceRemain"]>0)
                                            {
                                                mysqli_query($con,"update balance set balanceRemain = 0  ,balanceStatus =2,remark='balance updated' where BcardNumber =$card"); 
                                            echo "balance updated <br>";
                                            }
                                            else{
                                                mysqli_query($con,"update balance set remark='balance finished', balanceStatus =3 where BcardNumber =$card") ;
                                                echo "balance finished";
                                            }
                                    }
                                            
                                        
                                            }
                                            }
                                        }
                                    else{
                                        echo "11". mysqli_error($con) ;
                                    }
                                    
            
                        }
                        else{
                            echo "no payment". mysqli_error($con) ;
                        }
            
                                    }
                                    else{
                                        if($insert = mysqli_query($con, $datainput))
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
                
                    
                    
                }
                else{
                    echo " no service"."select cardnumber from customer where phonenumber = '$phone'";
                    // "http://localhost/cafeteria/customer/payment.php?phone=255766942257&payment=89900"
                }

            }else{
                echo " wrong number or user not present";
            }

}
else{
    echo "something went wrong";
}

                // else{
                //     echo " service not complited";
                // }
?>