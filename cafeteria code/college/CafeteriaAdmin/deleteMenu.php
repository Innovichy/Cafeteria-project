<?php
session_start();
    include_once('../../include/connection.php');
    date_default_timezone_set("Africa/Nairobi");
    $now = date("Y-m-d");

if(isset($_POST['data']))
{
    $userid = $_SESSION['id']; 
    $id = $_POST['data'];
    if(mysqli_query($con,"update  menufood  set status =1 where menuid = $id "))
    {

      

        if(mysqli_query($con,"update  deletedmenu  set deletestatus = 1 where fromMenuid = $id  and deletestatus  = 0 "))
    {
 
        echo "recored deleted";
    }
    else{
        // echo "recored  not deleted";
        echo" 1 ". mysqli_error($con);
    }
}
    else{
        // echo "recored  not deleted";
        echo " 2 ".  mysqli_error($con) . "update  menufood  set status =1 where id = $id and  status =2 ";
    }
}

?>