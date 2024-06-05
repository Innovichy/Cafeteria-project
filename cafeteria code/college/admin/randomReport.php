<?php
session_start();
include_once('../../include/connection.php');
date_default_timezone_set("Africa/Nairobi");
$now = date("Y-m-d");
if(isset($_SESSION['OwnerEmail']))
{


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
    $sql =' SELECT amount,foodid,count(foodreportid) as foodtotal,foodname FROM food right join foodreport on foodreport.foodreportid =food.foodid WHERE date(foodreport.createdAt) BETWEEN "2023-05-24" and "2023-05-24" group by foodid;';

  
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
               <div class="card-header" style="background-color:rgb(8,59,102);">

<a class="btn btn-sm" href="#" data-toggle="modal"
   data-target="#add" style="border: 1px solid #ddd;"><i
   class="fa fa-user-plus"></i> Add</a>
</div>
            </div>
         </div>
         <section class="content">
            <div class="container-fluid">
               <div class="row">
              
             
                 <div class="col-md-7 col-xl-6 col-lg-12 col-sm-12 h-75 m-auto  " >
                 <?php
// echo "dsakldsanas";

                     
                           ?>
                  <h2 class ="text-center "> food chart</h2>
                 <canvas id="chartjs-pie" ></canvas>

                 </div>
             
                              <div class="col-md-4">
                              <div class="card card-info">
                               
               <table id="example1" class="table table-bordered table-responsive">
                           <thead>
                              <tr>
                                 <th>foodname</th>
                                <th>amount</th>
                              </tr>
                           </thead>
                           <tbody>
                           <?php
                                   if(isset($_POST['submit']))
                                   {
                                       if(!empty($_POST['startdate']) &&  empty($_POST['enddate']))
                                       {
                                          $start=$_POST['startdate'];
                                        
                                          $sql ='SELECT amount,foodid,count(foodreportid) as foodtotal,foodname FROM food right join foodreport on foodreport.foodreportid =food.foodid WHERE date(foodreport.createdAt)= '."'$start'". ' group by foodid';
                                          if($sqlResult = mysqli_query($con,$sql))
                                          {
                                             if(mysqli_num_rows($sqlResult)>0)
                                             {
                                                while($row = mysqli_fetch_assoc($sqlResult))
                                                {
                                                            array_push($foodnames,$row['foodname']);
                                                             array_push($foodamount,$row['amount']);
                                                            array_push($foodtotal,$row['foodtotal']);
                                                    echo "<tr>";
                                                    echo '<td scope="row">'. $row['foodname'].'</td>';
                                                    $perEachFood =$row['amount'] * $row['foodtotal'];
                                                    echo '<td scope="row">'.$perEachFood.'</td>';
                                                    $totalAmount += $perEachFood;
                                                  
                                                    echo "</tr>";
                  
                                                }
                                             }
                                            
                                          }
                                       }
                                       else if(!empty($_POST['startdate']) &&  !empty($_POST['enddate']))
                                       {
                                          $start=$_POST['startdate'];
                                        
                                          $end=$_POST['enddate'];
                                          $sql ='SELECT amount,foodid,count(foodreportid) as foodtotal,foodname FROM food right join foodreport on foodreport.foodreportid =food.foodid WHERE date(foodreport.createdAt) BETWEEN '."'$start'".' and '."'$end'".' group by foodid';
                                          if($sqlResult = mysqli_query($con,$sql))
                                          {
                                             if(mysqli_num_rows($sqlResult)>0)
                                             {
                                                while($row = mysqli_fetch_assoc($sqlResult))
                                                {
                                                            array_push($foodnames,$row['foodname']);
                                                             array_push($foodamount,$row['amount']);
                                                            array_push($foodtotal,$row['foodtotal']);
                                                    echo "<tr>";
                                                    echo '<td scope="row">'. $row['foodname'].'</td>';
                                                    $perEachFood =$row['amount'] * $row['foodtotal'];
                                                    echo '<td scope="row">'.$perEachFood.'</td>';
                                                    $totalAmount += $perEachFood;
                                                  
                                                    echo "</tr>";
                  
                                                }
                                             }
                                            
                                          }
                                       }
                                       else if(empty($_POST['startdate']) &&  empty($_POST['enddate']))
                                       {
    
                                             echo " please choose date";
                                           
                                        }
                                  
                                   }
                                   else
                                   {
                                    $sql ='SELECT amount,foodid,count(foodreportid) as foodtotal,foodname FROM food right join foodreport on foodreport.foodreportid =food.foodid WHERE date(foodreport.createdAt)= '."'$now'". ' group by foodid';
                                    if($sqlResult = mysqli_query($con,$sql))
                                    {
                                       if(mysqli_num_rows($sqlResult)>0)
                                       {
                                          while($row = mysqli_fetch_assoc($sqlResult))
                                          {
                                                      array_push($foodnames,$row['foodname']);
                                                       array_push($foodamount,$row['amount']);
                                                      array_push($foodtotal,$row['foodtotal']);
                                              echo "<tr>";
                                              echo '<td scope="row">'. $row['foodname'].'</td>';
                                              $perEachFood =$row['amount'] * $row['foodtotal'];
                                              echo '<td scope="row">'.$perEachFood.'</td>';
                                              $totalAmount += $perEachFood;
                                            
                                              echo "</tr>";
            
                                          }
                                       }
                                      
                                    }
                                   }

                              ?>
                           </tbody>
                        </table>
               </div>
               </div>
               </div>
            </div>
         </section>
      </div>
   </div>
   <div id="add" class="modal animated rubberBand delete-modal" role="dialog">
         <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
               <div class="modal-body text-center">
                  <form  id ="employeeM" method ="post" action ="<?=$_SERVER['PHP_SELF'];?>">
                     <div class="card-body">
                        <div class="row">
                           <div class="col-md-12">
                              <div class="card-header">
                                 <span class="fa fa-user"> Generate Report</span>
                              </div>
                              <div class="row">
                                 <!-- <div class="row"> -->
                                    <div class="col-md-6">
                                       <div class="form-group">
                                          <label>start / required date</label>
                                          <input type="date" class="form-control"  name ="startdate" placeholder="FIrst Name">
                                       </div>
                                    </div>
                                 <div class="col-md-6">
                                    <div class="form-group">
                                       <label>End date</label>
                                       <input type="date"  name ="enddate" class="form-control" placeholder="Middle Name">
                                    </div>
                                 </div>
                                 


                                 <!-- </div> -->
                                
                               
                                                              </div>
                           </div>
                        </div>
                     </div>
                     <!-- /.card-body -->
                     <div class="card-footer">
                        <a href="#" class="btn btn-danger" data-dismiss="modal">Close</a>
                        <input type="submit"  name ="submit" class="btn btn-primary" value ="save">
                     </div>
                  </form>
               </div>
            </div>
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
    <?php
}
else{
    echo '<div class="row">
   <div class="col-md-6">
   <h3 class ="text-center"> request not granted </h3></div>
   </div>';
}
?>
</body>

</html>