<?php
include_once('../../include/connection.php');


// if(isset($_SESSION['OwnerEmail']))
// {

//  ?>
<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1">
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
   
    $card =[];
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
                  <div class="col-xl-6 col-md-6 col-12">
                     <div class="card">
                        <div class="card-body ">
                           <div class="d-flex justify-content-between p-md-1">
                              <div class="d-flex flex-row">
                                 <div class="align-self-center">
                                    <i class="fa fa-user text-color fa-3x me-4"></i>
                                 </div>
                                 <div>
                                    <h4 class="txt">customer</h4>
                                    <p class="mb-4 txt">Number of customer</p>
                                 </div>
                              </div>
                              <div class="align-self-center">
                              <?php
                                 if($sql = mysqli_query($con,"SELECT  COUNT(*) as number FROM customer"))
                                 {
                                    if(mysqli_num_rows($sql)>0)
                                    {
                                       $row = mysqli_fetch_assoc($sql);
                                       
                                       echo `<h2 class="h1 mb-4">`.$row['number'].`</h2>`;
                                    }
                                 }
                                 else{
                                    echo  "something is wrong";
                                 }
                                 
                                 ?>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="col-xl-6 col-md-6 col-12">
                     <div class="card">
                        <div class="card-body ">
                           <div class="d-flex justify-content-between p-md-1">
                              <div class="d-flex flex-row">
                                 <div class="align-self-center">
                                    <i class="fa fa-users text-color fa-3x me-4"></i>
                                 </div>
                                 <div>
                                    <h4 class="txt">Employee</h4>
                                    <p class="mb-4 txt">Number of Employee</p>
                                 </div>
                              </div>
                              <div class="align-self-center">
                                 <?php
                                 if($sql = mysqli_query($con,"SELECT  COUNT(*) as number FROM cafereriaowner where usertype =1"))
                                 {
                                    if(mysqli_num_rows($sql)>0)
                                    {
                                       $row = mysqli_fetch_assoc($sql);
                                       
                                       echo `<h2 class="h1 mb-4">`.$row['number'].`</h2>`;
                                    }
                                 }
                                 else{
                                    echo  "something is wrong";
                                 }
                                 
                                 ?>
                             
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
                 <div class="col-md-6  col-xl-6 col-lg-12 col-sm-12 h-75 m-auto" >
                 <?php
                              $sql = "SELECT * FROM `cive` WHERE id = 1";
                              if($sqlresult=mysqli_query($con,$sql))
                              {
                                 if(mysqli_num_rows($sqlresult)>0)
                                 {
                                    $active =0;$deactivated =0;$taken=0;
                                    $total=0;
                                    while($row = mysqli_fetch_assoc($sqlresult))
                                    {
                                       if($row['active'] ==1)
                                       {
                                           $active++;

                                       }
                                        if($row['deactivated'] ==1)
                                       {
                                         $deactivated++;
                                       }
                                      if($row['taken'] ==1)
                                       {
                                            $taken++;
                                          
                                       }
                                       $total++;
                                    }
                                    
                                    $card=[$total,$taken,$deactivated,$active];
                                 
                                 }
                              }
                              ?>
               

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

<script>
   
      // Pie chart
      document.addEventListener("DOMContentLoaded", function() {      
         var values = <?=json_encode($card);?>;

      new Chart(document.getElementById("chartjs-pie"), {
        type: "bar",
        data: {
          labels: ["total","taken"," deactivaed","active"],
          datasets: [{
            data: values,
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
            display: true
          }
        }
      });
      });
   
    </script>

</body>

</html>