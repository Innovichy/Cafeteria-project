<?php
include_once('include/connection.php');
$randomComb = $_GET['randomComb']; // this is for tikect


 $update ="UPDATE `foodreport` SET `ticket_status`=1  WHERE ticket ='$randomComb'";


 if(!mysqli_query($con,$update))
 {
echo " not updated " ;
 }

 ?>
