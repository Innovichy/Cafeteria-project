<?php
session_start();
include_once('../../include/connection.php');
//  print_r( $_POST);
 $array = [];
 $data;
 $userid ;
 $sql;
 $userid = $_SESSION['id'];
 if(isset($_POST))
 {
    //  mysqli_query($con,"delete  from menufood");
if(!empty($_POST))
{
 foreach($_POST as $key => $value){
   

    $sql ="INSERT INTO `menufood`(`id`,createdBY,status) VALUES ( $value,$userid,2 )";
        
    
    if($insert = mysqli_query($con,$sql))
    {
                  $last =mysqli_insert_id($con);
            // echo ("Data inserted");
            if(mysqli_query($con,"insert into deletedmenu(deletedFoodId,deletedBY,deletestatus,fromMenuid) values($value,$userid,0,$last)"))
            {
                
                $data =1;
            }

             }else{
                
             if(mysqli_errno($con))
             {
                $data =2;
                break;
             }else{
                $data = 0;
                break;
             }
            }
    
}
if($data==1)
            {
                echo "Data inserted";
            }elseif($data==2){
                echo "  Data exist";

            }
            elseif($data==0){
                echo " not Data inserted";

            }

}
else{
    echo  "please select menu";
}
 }








?>