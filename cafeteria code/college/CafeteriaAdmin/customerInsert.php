<?php
include_once('../../include/connection.php');



$errro =[];
if( isset($_POST['firstname']) &&  isset($_POST['middlename']) && isset($_POST['lastname']) 
 && isset($_POST['Contact'])  && isset($_POST['Contact']) &&  isset($_POST['gender']) &&  isset($_POST['cardnumber'])
  ){
 $firstname  =   validation($_POST['firstname']); 
 $middlename =  validation($_POST['middlename']); 
 $lastname =    validation($_POST['lastname']) ;
 $Contact =     validation($_POST['Contact']);
 $gender =      validation($_POST['gender']);
 $cardnumber =  validation($_POST['cardnumber']);
 $password =    validation($_POST['password']);
               
 
          $data ="select cardNumber from customer where cardNumber =$cardnumber";

          if( $result = mysqli_query($con,$data))
          {
            if(mysqli_num_rows($result) >0)
            {
                $drop =  'delete from scanneddata';
                if(mysqli_query($con,$drop))
                {
                           $errro['error'] =" cardnumber already used";
                        
                         }
            }
            else{

                $sql ="INSERT INTO customer(cardNumber,FirstName,MiddleName,lastName, gender, phoneNumber,  password,card_status  
                )VALUES('$cardnumber','$firstname','$middlename','$lastname','$gender','$Contact','$password', '1')";
                if(mysqli_query($con,$sql))
                {
                    $drop =  'delete from scanneddata';
                     $update ="update card set card_status =1 where cardNumber = $cardnumber";

                       if(mysqli_query($con,$drop)  && mysqli_query($con,$update) )
                       {
                        
                        $errro['success'] ="record inserted successful";
                         }
                }
                else{
                    $errro['error'] ="failed to insert record";
                }

            }
          }

  }
else{
    $errro['error'] ="  not alright";
}



function validation($input)
{
 $input = trim($input);
 $input = stripslashes($input);
 $input = htmlspecialchars($input);
 return ($input);


}

 if(isset($errro))
 {
    echo json_encode($errro);
 }
?>