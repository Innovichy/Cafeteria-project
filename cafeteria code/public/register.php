

<?php
include_once("../include/connection.php");
$fname       =     $_POST['fname'];
$lname       =     $_POST['lname'];
$gender      =      $_POST['gender'];
$email      =    $_POST['email'];
$pass        =  $_POST['pass'];
$phone       =    $_POST['phone'];



  $sqli= "INSERT INTO `customer` (`FirstName`, `lastName`, `gender`, `phoneNumber`, `email`, `password`) VALUES ('$fname','$lname','$gender','$phone','$email','$pass')";
if($sqlidata = mysqli_query($con,$sqli))
{
    echo "successfull regiseter";
}else{
    echo " failed to register";
}
        ?>