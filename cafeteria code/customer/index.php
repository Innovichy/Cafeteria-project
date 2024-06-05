<?php 
session_start();
include_once('../include/connection.php');
$data123 =$_SESSION['customerCardNumber'];

?>
<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <title>samart-card-billing-System<</title>   <!-- Font Awesome -->
   <link rel="stylesheet" href="../asset/fontawesome/css/all.min.css">
   <link rel="stylesheet" href="../asset/css/adminlte.min.css">
   <link rel="stylesheet" href="../asset/tables/datatables-bs4/css/dataTables.bootstrap4.min.css">
   <script src="../asset/jquery/jquery.min.js"></script>

   <style type="text/css">
      .txt {
         padding-left: 20px !important;
      }

      .text-color {
         color: rgb(0,166,90);
      }
      ul.nav-sidebar li a i{
         color: rgb(0,166,90);
      }
      li a i{
         color: #fff;
      }
      .d{
display:none;
/* visibility:hidden; */
      }
   </style>
</head>

<body class="hold-transition sidebar-mini layout-fixed">
   <div class="wrapper">
 
<?php
include_once("common/navbar.php");
include_once("common/sidebar.php");
?>
      <div class="content-wrapper">
         <div class="content-header">
            <div class="container-fluid">
               <div class="row mb-2">
                  <div class="col-sm-6">
                     <h1 class="m-0"><span class="fa fa-tachometer-alt"></span> Dashboard</h1>
                  </div>
                  <div class="col-sm-6">
                     <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Dashboard</li>
                     </ol>
                  </div>
               </div>
            </div>
         </div>
         <section class="content">
            <div class="container-fluid">
               <div class="row">
               
                  <div class="col-xl-12 col-md-12 col-12">
                     <div class="card">
                        <div class="card-body">
                           <?php 



      if(isset($_POST['cardbutton']))
      {
         if(!empty($_POST['pwd']) && !empty($_POST['confirmed']) && !empty($_POST['cardnumber']) )
         {
             if($_POST['pwd'] === $_POST['confirmed'])
            {
                  $pwd=$_POST['confirmed'];
                  $cardnumber=$_POST['cardnumber'];
                if($card = mysqli_query($con,"update   cive set userid ='$data123', password ='$pwd', taken = 1  where Numbercard =$cardnumber"))
                {
                   if(mysqli_query($con," update customer set  card_status = 1"))
                   {
                     
                        echo "successfully register card";
                  

                  }else{
                     echo  " something went wrong";
                  }
                  
                }
                else{
                  echo " not okay" . mysqli_error($con);
                }

            }
            else{
               echo " password don't match";
            }
          
         }

         // echo " cardbutton";
      }
                           // include_once('../include/connection.php');
                           $cafeteriaArray =[];
                           $sqlCafeteria = "SELECT * FROM confimerdcolleges";
                           $cafeteria = mysqli_query($con,$sqlCafeteria);
                           if($cafeteria) {
                              if(mysqli_num_rows($cafeteria)>0)
                              {
                                 while($row = mysqli_fetch_assoc($cafeteria))
                                 {
                                    $cafeteriaArray[0]=$row['cafeteria'];
                                    $cafeteriaArray[1]=$row['college'];
                              //  array_push($cafeteriaArray[0],$row['cafeteria']);
                                   
                                 }
                              }
                              else{
                                 $cafeteriaArray[0]=" no data available";
                              }
                           }
                           else{
                              $cafeteriaArray[0]="something is wrong";
                           }
                         
                           // print_r($cafeteriaArray);
                           $balance ;
                           if($sql = mysqli_query($con,"SELECT  balance, balanceRemain FROM `balance`,customer WHERE   balanceStatus =1 and Bcardnumber = $data123"))
                           {
                              if(mysqli_num_rows($sql)>0) 
                              {
                                 $row =mysqli_fetch_assoc($sql);
                                 $balance =$row['balanceRemain'];
                              }
                              else{ 

                                 $balance =0.00000;
                              }
                           }

                      
                          
                           $fullcardnumber =$_SESSION['customerFullCardNumber'];
                           $data ='
                           <div class="d-flex justify-content-between p-md-1">
                           <div class="d-flex flex-row">
                               
                           <div class="align-self-center">
                              <i class="fa fa-money-bill text-color fa-3x me-4"></i>
                           </div>
                           <div>
                              <h4 class="txt">Balance</h4>
                              <p class="mb-4 txt">Remaining Balance</p>
                           </div>
                        </div>
                        <div class="align-self-center">

                           <h2 class="h1 mb-4">'.$balance.'</h2>
                        </div>
                        </div>';
                         $data2 ='<div    id="cardregistration"       style="height: 22vh; background-color: blanchedalmond; " class="text-center ">
                                                         <h3 class=" mb-3">  no card information </h3>
                                                        <h4 class="mb-3"> once you  click to register | card will be your personal responsibility </h4>
                                                    <div>
                                                      <button onclick="openmodel()" style="background-color: green; color:white; font-size:20px"> click to register card</button>
                                                     </div>
                                                         </div>';

                                                   $form = '<form action="index.php" method ="post" class ="d" id="form">
                                                   <div class="form-group">
                                                   <label for="">   Location</label>
                                                   <select onchange="data(this.value)" class="form-control" name="" id="">
                                                   <option value =""> choose Near Location to take card</option> 
                                                   
                                                    <option value ="'.$cafeteriaArray[1].'">'. $cafeteriaArray[0].'</option> 
                                     
                                                 </select>
                                                 </div>  
                                                 <div id ="credit" class ="d">
                   
                                                   <div   class="form-group ">
                                                           <label for=""> card number</label>
                                                           <input type="text"
                                                             class="form-control" name="cardnumber" id="number" value =""  aria-describedby="helpId" placeholder="" readonly>
                                                             <small id="helpId" class="form-text text-muted">my card number</small>
                                                         </div>
                                                         
                                                         <div class="form-group">
                                                           <label for="">password</label>
                                                           <input type="password"
                                                             class="form-control" name="pwd" id="" aria-describedby="helpId" placeholder="">
                                                         </div>
                                                         <div class="form-group">
                                                           <label for="">confrim password</label>
                                                           <input type="password"
                                                             class="form-control" name="confirmed" id="" aria-describedby="helpId" placeholder="">
                                                         </div>
                                                         
                                                         </div>
                                             <input type="submit" value ="register" name ="cardbutton">
                                                         </form>';

                                    
            if($val =mysqli_query($con,"select  card_status from customer where cardNumber = $data123"))
            {
                $cardstatus = mysqli_fetch_assoc($val);
             
                     if($cardstatus['card_status'])
                                       {
                                      echo $data;
                                        }
                                    else{
                                       echo $data2;
                                      echo   $btn ='  <script>
                                       function openmodel()
                                         {
                                           alert(" register card");
                                           $("#cardregistration").addClass("d");
                                           $("#form").removeClass("d");
                                          
                                         }
                                          
                                         </script>';
                                         echo $form;
                                       }

            }
            else{
               echo " no data available";
            }


                                                    
                              ?>
                           
                        </div>
                     </div>
                  </div>
               
               </div>
            </div>
         </section>
      </div>
   </div>
   <!-- jQuery -->
   
   <script src="../asset/js/adminlte.js"></script>
   <script>
      function data(value)
      {
         if(value!="")
         {

      $.ajax({
         type: "post",
         url: "credential/credit.php",
         data: "data="+ value,
         // dataType: "dataType",
         success: function (response) {
            $("#credit").removeClass("d");
    
        $("#number").attr("value",response) ;
            
         }
      });


         }
// insert into cive (id,number) select collegeid,cardnumber  from card,college where card.cardnumber between 1000 and 1005 and collegeid =1;
      }
   </script>

    

 
</body>

</html>