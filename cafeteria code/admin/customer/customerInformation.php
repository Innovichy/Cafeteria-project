<?php


include_once('../../include/connection.php');

$fisrtname      =   $_POST['firstname'];
 $middlename    =   $_POST['middlename'];
 $lastname      =   $_POST['lastname'];

 $contact       =   $_POST['Contact'];
 $email         =   $_POST['email'];
 $college       =   $_POST['college'];
 $cafeteria     =   $_POST['cafeteria'];
 $address       =   $_POST['address'];
if(isset($fisrtname ) && isset($middlename ) &&  isset($lastname )  && isset($contact)  && isset($email )
  && isset($college ) && isset($cafeteria) && isset($address) )
  {

if(!empty($fisrtname) && !empty($middlename) && !empty($lastname)  && !empty($contact) && !empty($email) && !empty($college )&& !empty($cafeteria ) && !empty($address ))
{

    $pass =strtoupper($lastname);
    $sqli = mysqli_query($con,"INSERT INTO cafereriaowner (FirstName, SecondName,lastName, phoneNumber, email,college,cafeteria,address,password) VALUES ('$fisrtname','$middlename','$lastname','$contact','$email', $college , '$cafeteria','$address','$pass')");
    if($sqli )
    {
 echo "record inserted successfuly";
    }
    else{
        echo " record  not inserted " .mysqli_error($con);

    }
}
else{
    echo " you  cant live empty field";

}
}


 


?>