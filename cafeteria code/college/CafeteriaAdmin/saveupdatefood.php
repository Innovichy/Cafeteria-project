<?php
include_once('../../include/connection.php');

 if(isset($_POST['thedata']))
 {
    //  $id =$_POST['thedata'];
    //   $sql = " update  food set foodname =,amount from food where  foodId =$id";
    //   if( $result =mysqli_query($con,$sql))
    //   {
    //       if(mysqli_num_rows( $result)>0)
    //       {
    //                $rowdata = mysqli_fetch_assoc($result);
    //                 echo  json_encode($rowdata);
    //       }
    //   }else{
    //       echo " not connected";

    //   }

// echo json_encode($_POST);
echo json_encode($_POST['thedata']);
 }





?>