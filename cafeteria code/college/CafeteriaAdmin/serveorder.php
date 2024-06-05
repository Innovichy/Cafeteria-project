<?php
    include_once('../../include/connection.php');

if(isset($_POST['data'])  && isset($_POST['data2']))
{
    $id = $_POST['data'];
    $tiket = $_POST['data2'];
    $update ="UPDATE `foodreport` SET `ticket_status`=1  WHERE  id =$id and ticket ='$tiket'";


    if(!mysqli_query($con,$update))
    {
   echo " not updated " ;
    }

    else{
        echo  "order served";
    }
}

?>