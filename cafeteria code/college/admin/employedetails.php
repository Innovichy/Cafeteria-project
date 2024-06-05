<?php


include_once('../../include/connection.php');

$fisrtname      =   $_POST['firstname'];
 $middlename    =   $_POST['middlename'];
 $lastname      =   $_POST['lastname'];

 $contact       =   $_POST['contact'];
 $email         =   $_POST['email'];
 $college       =   1;
 $adminid      =   1;
 
if(isset($fisrtname ) && isset($middlename ) &&  isset($lastname )  && isset($contact)  && isset($email )
  && isset($college ) )
  {

if(!empty($fisrtname) && !empty($middlename) && !empty($lastname)  && !empty($contact) && !empty($email) && !empty($college ))
{

    $pass =strtoupper($lastname);
    $sqli = mysqli_query($con,"INSERT INTO cafereriaowner (FirstName, SecondName,lastName, phoneNumber, email,college,cafeteria,usertype,password) VALUES ('$fisrtname','$middlename','$lastname','$contact','$email', $college , '$college','$adminid','$pass')");
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