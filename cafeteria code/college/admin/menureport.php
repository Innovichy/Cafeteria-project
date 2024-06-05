<?php
include_once('../../include/connection.php');
date_default_timezone_set("Africa/Nairobi");
$now = date("Y-m-d");
// if(isset($_SESSION['OwnerEmail']))
// {



 ?>
<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <meta http-equiv="refresh" content="100">
   <title>samart-card-billing-System<</title>
      <!-- Font Awesome -->
   <link rel="stylesheet" href="../../asset/fontawesome/css/all.min.css">
   <link rel="stylesheet" href="../../asset/css/adminlte.min.css">
   <link rel="stylesheet" href="../../asset/tables/datatables-bs4/css/dataTables.bootstrap4.min.css">
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
   </style>
</head>

<body class="hold-transition sidebar-mini layout-fixed">
   <div class="wrapper">

    <?php
    include_once('includes/nav.php');
    include_once('includes/aside.php');  
    // $sql;

  
    $card =[];
    $foodnames =[];
    $foodamount =[];
    $foodtotal =[];
    $foodtotal =[];
    $totalAmount =0;
    ?>
      <div class="content-wrapper">
         <div class="content-header">
            <div class="container-fluid">
               <div class="row mb-2">
                  <div class="col-sm-6">
                     <h1 class="m-0"><span class="fa fa-book"></span> report</h1>
                  </div>
                  <div class="col-sm-6">
                     <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">report</li>
                     </ol>
                  </div>
               </div>
              
            </div>
         </div>
         <section class="content">
            <div class="container-fluid">
               <div class="row mt-5 ">
              
             
                 <div class="col-md-12 col-lg-10 col-sm-6 m-auto  " >
                    <div class="card card card-info">
                        <div class="card-header" style="background-color: rgb(8,59,102);">
                            <div class="text-center" >
                               <h4>Menu</h4> 
                            </div>
                        </div>
                     </div>
               <table id="example1" class="table table-bordered table-responsive">
                           <thead>
                              <tr>
                                 <th>foodname</th>
                                <th>created at</th>
                                <th>create by</th>
                                <th>deleted at</th>
                                <th>deleted by</th>
                              </tr>
                           </thead>
                           <tbody>
                           <?php
                                  
                                $sql = "SELECT foodid,foodname,menufood.created_at,FirstName,SecondName,lastname,status,menuid FROM food right join menufood on menufood.id =food.foodid LEFT JOIN cafereriaowner on menufood.createdBY = cafereriaowner.id";                                       
                                   if($sqlResult = mysqli_query($con,$sql))
                                {
                                    if(mysqli_num_rows($sqlResult)>0)
                                    {
                                    while($row = mysqli_fetch_assoc($sqlResult))
                                    {
                                            
                                       
                                       $foodid = $row['foodid'];
                                       $status = $row['status'];
                                       $menuid = $row['menuid'];
                                        echo "<tr>";
                                        echo '<td scope="row">'. $row['foodname'].'</td>';
                                        echo '<td scope="row">'. $row['created_at'].'</td>';
                                        echo '<td scope="row">'. $row['FirstName']. ' ' . $row['SecondName'].' '. $row['lastname'].'</td>';
                                      
                                      $deletedby= '   SELECT foodname,deletedmenu.deletedAt,deletestatus, FirstName,SecondName,lastname FROM food right join deletedmenu on deletedmenu.deletedFoodId =food.foodid LEFT JOIN cafereriaowner on deletedmenu.deletedBY = cafereriaowner.id where deletedmenu.deletedFoodId ="'.$foodid.'"   and fromMenuId="'.$menuid.'"';

                                      if($deletedResult = mysqli_query($con,$deletedby))
                                      {
                                         if(mysqli_num_rows($deletedResult)>0)
                                         {
                                          $row = mysqli_fetch_assoc($deletedResult);
                                          if($status ==1)
                                          {

                                             echo '<td scope="row">'. $row['deletedAt'].'</td>';
                                             echo '<td scope="row">'. $row['FirstName']. ' ' . $row['SecondName'].' '. $row['lastname'].'</td>';
                                          }
                                          elseif($status ==2){
                                             echo '<td scope="row"> ----</td>';
                                             echo '<td scope="row">----</td>';
                                          }
                                          }
                                          else{
                                             echo '<td scope="row"> ----</td>';
                                             echo '<td scope="row">----</td>';
                                          }
                                    }
                                    echo "</tr>";
                                }
                                }

                                }
                                       
                                       

                              ?>
                           </tbody>
                        </table>
                    
                        </div>

                 </div>
             
                             
            </div>
         </section>
      </div>
   </div>
 
   <!-- jQuery -->

   <script src="../../asset/jquery/jquery.min.js"></script>
      <script src="../../asset/js/bootstrap.bundle.min.js"></script>
      <script src="../../asset/js/adminlte.js"></script>
   <script src="../../asset/js/chart.js"></script>
     <!-- DataTables  & Plugins -->
     <script src="../../asset/tables/datatables/jquery.dataTables.min.js"></script>
      <script src="../../asset/tables/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
      <script src="../../asset/tables/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
      <script src="../../asset/tables/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
     

<script>
 
         $(function () {
           $("#example1").DataTable();
         });
         $(function () {
           $("#example2").DataTable();
         });
      // Pie chart
      document.addEventListener("DOMContentLoaded", function() {      
         var values = <?=json_encode($foodnames);?>;
         var datavalues = <?=json_encode($foodtotal);?>;
               var theheight = $("#chartjs-pie");
               theheight.height(2000);
      new Chart(theheight, {
        type: "bar",
        data: {
          labels: values,
          datasets: [{
            data: datavalues,
            backgroundColor: [
              window.theme.primary,
              window.theme.warning,
              window.theme.danger,
              window.theme.success,
            ],
            borderColor: "transparent"
           
          }]
        },
        options: {
          maintainAspectRatio: true,
          legend: {
            display: false
          }, scales:{
            y:{
                beginAtZero:true
            }
          }
        }
      });
      });
   



    </script>

</body>

</html>