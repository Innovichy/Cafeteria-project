<?php

include_once('../../include/connection.php');
// $_POST[data2];
 $name =$_POST["data2"];
 $array = array();
       if($sql= mysqli_query($con,"SELECT  cafeteria_name FROM cafeteria_table where collegeName = $name"))
       {
        if(mysqli_num_rows($sql)>0)
        { 
            echo '<option value ="">select cafeteria</option>';
            while( $row =mysqli_fetch_assoc($sql))
            {
                // $array['cafeterianame'] =$row['cafeterianame'];
                // array_push($array,$row);
                echo '<option value ="'.$row['cafeteria_name'].'">'.$row['cafeteria_name'].'</option>';
                // echo "<br>";
            }

        }else
        {
            echo json_encode("no data available");
        }
       }
       else{
        echo "something is wrong";
       }
?>