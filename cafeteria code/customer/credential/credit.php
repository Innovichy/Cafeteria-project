<?php
include_once('../../include/connection.php');
if(isset($_POST['data']))
{
   $id = $_POST['data'];
    $sql = "SELECT NumberCard,id,taken FROM `cive` WHERE   id =1";
    if($sqldata = mysqli_query($con,$sql))
    {
        if(mysqli_num_rows($sqldata)>0)
        {
            while($row = mysqli_fetch_assoc($sqldata))
            {
                if($row['taken']==0)
                {
                    echo $row['NumberCard'];
                    break;

                }
            }

        }
    }


}
?>