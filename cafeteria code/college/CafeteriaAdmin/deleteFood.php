<?php
session_start();
    include_once('../../include/connection.php');

if(isset($_POST['data']))
{
    $userid = $_SESSION['id']; 
    $id = $_POST['data'];
    if(mysqli_query($con,"delete from food where foodId = $id "))
    {

 
        echo "food deleted";
    
}
    else{
        echo "recored  not deleted";
    }
}

?>