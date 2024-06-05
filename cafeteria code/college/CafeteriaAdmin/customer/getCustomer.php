<?php  
include_once('../../../include/connection.php');
if(isset($_POST['data']))
{
     $thecard =$_POST['data'];

     $sqlstatment1 = "SELECT userid ,active FROM cive where  numbercard =$thecard";
     if($dataquery1 = mysqli_query($con,$sqlstatment1))
     {
        if(mysqli_num_rows($dataquery1)>0)
        {     $data =mysqli_fetch_assoc($dataquery1);
            $id = $data['userid'] ;
            $active = $data['active'] ;

            $sqlstatment = "SELECT FirstName,email,FirstName, cardnumber as cadi FROM customer where  cardnumber =$id";
            if($dataquery = mysqli_query($con,$sqlstatment)){
                if(mysqli_num_rows($dataquery)>0)
                {
                    $dataResult  = mysqli_fetch_assoc($dataquery);
                    if($dataResult['cadi']!=10002)
                    {
                         $card =md5($dataResult['cadi']);
                         $thecard =md5($thecard);
                         

                        echo ' <div class=" mt-2 col-md-8 m-auto"> <table class =" table table-striped ">

                        <tr>
                <td  scope="row" >fullname</td>
                <td>'. $dataResult['FirstName']." ".$dataResult['FirstName'].'</td>
            </tr>
            <tr>
                <td  scope="row">email</td>
                <td> '.$dataResult['email'].'</td>
            </tr>
            <tr>
                <td  scope="row">action</td>
                <td ">';
                if($active)
                {
                    echo '<button class="btn btn-danger" onclick="deactivate(`'.$thecard.'`)">deactivate</button>';
                }
                
                else{
                    echo '<button class="btn btn-success" onclick="activate(`'.$thecard.'`)">activate</button>';

                }
           echo '  </td></tr>
            </table>
                 </table></div>';
                     }
                     else{
                
                
                        echo  '<div  class="col-md-6 m-auto"> <ul class="list-group">';
                        echo  '<li class="list-group-item text-white" style="background-color: rgb(8,59,102);"> no user present</li>';
                        
                    echo " </ul>  </div>";
                        }
                }
                else{
                
                
                echo  '<div  class="col-md-6 m-auto"> <ul class="list-group">';
                echo  '<li class="list-group-item text-white" style="background-color: rgb(8,59,102);"> no user present</li>';
                
            echo " </ul>  </div>";
                }
            }
                    else{
                    echo  '<div  class="col-md-6 m-auto"> <ul class="list-group">';
                    echo  '<li class="list-group-item text-white" style="background-color: rgb(8,59,102);"> something is wrong</li>';
                    
                echo " </ul>  </div>";
                    }
            
        }
    
    else{
        echo  '<div  class="col-md-6 m-auto"> <ul class="list-group">';
        echo  '<li class="list-group-item text-white" style="background-color: rgb(8,59,102);"> invalid card</li>';
        
    echo " </ul>  </div>";
        }
    }
    }
                              ?>
                   
        
