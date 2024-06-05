<?php
include_once('../include/connection.php');

$maxid;
 $query ="select  * from balance where BcardNumber = 10000";
    if($select = mysqli_query($con,"select  max(id) as MaxId,sum(balanceremain) as summation from balance" ))
    {
         $row =mysqli_fetch_assoc($select);
           $maxid= $row['MaxId']; $maxbalance= $row['summation'];
         if($update = mysqli_query($con,"update balance set balanceRemain = balanceRemain + $maxbalance, balanceStatus =1  where id =$maxid and BcardNumber =10000 "))
                        {
                         if($update)   
                         {
                            
                            if($selectupdate = mysqli_query($con,$query))
                            {
                                if(mysqli_num_rows($selectupdate) > 0)
                                {
                                    while($rowUpdate = mysqli_fetch_assoc($selectupdate) )
                                    {
                                        $id =$rowUpdate["id"];
                                        if($rowUpdate["id"]== $maxid)
                                        {
                                            mysqli_query($con,"update balance set remark='current balance' where id =$id");
                                        }
                                         else{ 
                                            if($rowUpdate["balanceRemain"]>0)
                                            {
                                               mysqli_query($con,"update balance set balanceRemain = 0 ,remark='balance updated' where id =$id"); 
                                            }
                                            else{
                                                mysqli_query($con,"update balance set remark='balance finished' where id =$id") ;
                                             }
                                       
                                            }
                                        }
                                    }

                                }
                                
                            }

                          }
                        }
                        else{
                             echo "no";
                        }


    

    


?>