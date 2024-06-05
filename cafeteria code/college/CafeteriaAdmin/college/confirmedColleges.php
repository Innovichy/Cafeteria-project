<?php
include_once('../../include/connection.php');

$Location   =   $_POST['Location'];
$city       =   $_POST['city'];
$college    =   $_POST['college'];
$cafeteria  =   $_POST['cafeteria'];



 $data ="INSERT INTO confimerdcolleges(address, location, college, cafeteria) 
VALUES ('$city','$Location','$college','$cafeteria')";

if($sql = mysqli_query($con,$data))
{
 echo "data inserted";
}
else{
    echo "something is wrong".mysqli_error($con);
}