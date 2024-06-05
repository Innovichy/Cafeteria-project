<?php
include_once('../../../include/connection.php');
 if(isset($_POST['data']))
 {

     $data = $_POST['data'];

     
      $sql ="SELECT * FROM cive  "; 
      if($sqlResult = mysqli_query($con,$sql))
      {
            while($row = mysqli_fetch_assoc($sqlResult))
            {
                if(md5($row['NumberCard'])== $data )
                {
                    $id =$row['NumberCard'];
                    if(mysqli_query($con,"UPDATE cive SET active = 1, deactivated = 0 WHERE  NumberCard = $id" ))
                    {

                       echo "card activated successfuly ";
                       
                    }else{
                       echo "card  not activated";

                   }
                   break;
                }
            }
      }

 }else{

     echo "ooops";
    }
 ?>