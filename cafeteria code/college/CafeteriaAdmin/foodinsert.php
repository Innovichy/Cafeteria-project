<?php

include_once('../../include/connection.php');



if(isset($_POST['foodname']) && isset($_POST['price']) )
{
        $food =validation($_POST['foodname']);

        $price  = validation($_POST['price']);
     $sql ="INSERT INTO `food`(`foodname`, `amount`) VALUES ('$food','$price')";
     if($sqlinsert = mysqli_query($con,$sql))
     {
        // echo "record added";
        $error["success"] ="record added";
     }
     else{
        if(mysqli_errno($con))
        {

            // echo "record already exist ";
            $error["error"] ="record already exist";
        }
     }
  

if(isset($error))   
echo json_encode($error);
}
function validation($input)
{
 $input = trim($input);
 $input = stripslashes($input);
 $input = htmlspecialchars($input);
 return ($input);


}

?>