<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <title>Smart-card-billing-System</title>
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
<div id="serveId" class="modal animated rubberBand delete-modal" role="dialog">
         <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
               <form id ="serveorder">
               <div class="modal-body text-center">
                  <h3>Are you sure want to serve order?</h3>
                  <div class="m-t-20"> 
                     <a href="#" class="btn btn-white" data-dismiss="modal">Close</a>
                     <button type="submit" class="btn btn-success" >serve order</button>
                  </div>
                  </form>
               </div>
            </div>
         </div>
      </div>
<body class="hold-transition sidebar-mini layout-fixed">
   <div class="wrapper">
    
      <?php
   
    
    if( isset($_SESSION['NormalOwnerEmail']))
    {
      include_once('includes/navbar.php');
      include_once('includes/aside.php');
      include_once('../../include/connection.php');
  
   
    ?>
      
         <!-- Content Wrapper. Contains page content -->
         <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header">
               <div class="container-fluid">
                  <div class="row mb-2">
                  
               </div>
            </div>
            <section class="content">
               <div class="container-fluid">
                  <div class="card card-info">
                     <div class="card-header" style="background-color:rgb(8,59,102);">

                     <a class="btn btn-sm" href="#" data-toggle="modal"
                        data-target="#add" style="border: 1px solid #ddd;"><i
                        class="fa fa-user-pan-food"></i> check order</a>
                   
                     </div>
                     <br>
                     <div class="row">
                        <div class="col-md-12">
                  <table class="table" id="example1" class="table table-bordered">
                     <thead>
                        <tr>
                           <th>Number</th>
                           <th>Details</th>
                           <th>Ticket</th>
                           
                           <th>Card Number</th>
                           <th>Transcation Time</th>
                           <th>Status</th>
                           <th>Action</th>
                        </tr>
                     </thead>
                     <tbody>
                     <?php
                     $counter =1;
                     $query =" ";
                    //  $query = " select * ,dayname(createdAt) as day from foodreport";
                        if(isset($_POST['datesubmit']))
                        {
 // date(created_at) ="'.$now.'" '
             $date =  $_POST['date'];
             $day =date('l',strtotime($date ));
             echo "<div class ='text-center'>
                        Day : $date $day 
             </div>";
  $query =' SELECT  id,amount,foodname, ticket,  cardnumber,ticket_status, dayname(foodreport.createdAt)  as day,time(foodreport.createdAt)  as createdAt FROM  foodreport    LEFT JOIN food  on food.foodId = foodreport.foodReportId where date(foodreport.createdAt) = "'.$date.'" ';

                        }
                        else{
                            date_default_timezone_set("Africa/Nairobi");
                            $now  = date("Y-m-d");
                             $day =date('l',strtotime($now ));

                             $query = '
                             SELECT  id,amount,foodname, ticket,  cardnumber,ticket_status, dayname(foodreport.createdAt)  as day,time(foodreport.createdAt)  as createdAt FROM  foodreport    LEFT JOIN food  on food.foodId = foodreport.foodReportId where date(foodreport.createdAt) = "'.$now.'" ';
                            
                            echo "<div class ='text-center'>
                            Today : $now   $day
                            </div>";
                        }
                              if($sql = mysqli_query($con,$query))
                              {
                                 if(mysqli_num_rows($sql)>0)
                                       {

                                          while($data = mysqli_fetch_assoc($sql))  
                                          {
                                            $foodid = $data['id'];
                                             echo "<tr>";
                                             // echo "<td>".$counter."</td>"; 
                                              echo "<td>".$counter++."</td>";
                                              echo "<td>".ucfirst($data['foodname'])."</td>"; 
                                              echo "<td>".ucfirst($data['ticket'])."</td>"; 
                                              echo "<td>".$data['cardnumber']."</td>"; 
                                              echo "<td>".substr($data['createdAt'],0,8)."</td>"; 
                                              if($data['ticket_status'])
                                              {
                                                  echo "<td>".strtoupper('served')."</td>"; 
                                                  echo "<td> </td>"; 
                                           
                                              }
                                            else{
                                                  echo "<td>".strtoupper("not served ")."</td>"; 
                                                 ?>
                                                  <td> <button class="btn btn-sm btn-success" 
                                                  onclick="serve(<?=$foodid;?>,'<?=$data['ticket'];?>')"> serve</button> </td>
                                                 <?php
                                             }
                                            
                                         

                                            ?>
                                           
                                          </tr>
                                          <?php
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
               <!-- /.container-fluid -->
            </section>
            <!-- /.content -->
         </div>
         <!-- /.content-wrapper -->
      </div>
      <!-- ./wrapper -->
      <div id="add" class="modal animated rubberBand delete-modal" role="dialog">
         <div class="modal-dialog modal-dialog-centered ">
            <div class="modal-content">
               <div class="modal-body text-center">
                  <form  id ="employeeM" method ="post" action ="<?=$_SERVER['PHP_SELF'];?>">
                     <div class="card-body">
                        <div class="row">
                           <div class="col-md-12">

                              <div class="card-header">
                                 <span class="fa fa-user"> Generate balance Report</span>
                              </div>

                              <div class="row">

                            
                              <div class="col-lg-6  col-md-6 m-auto col-sm-12 ">
            <div class="form-group  ">
            <label for="" class="d-block"> Select date</label>
            <input type="date" name="date"   width="100%">
            </div>
            </div>
                              </div>
            
                            
                           </div>
                        </div>
                     </div>
                     <!-- /.card-body -->
                     <div class="card-footer">
                        <a href="#" class="btn btn-danger" data-dismiss="modal">Close</a>
                        <input type="submit"  name ="datesubmit" class="btn btn-primary" value ="save">
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
      <!-- DataTables  & Plugins -->
      <script src="../../asset/tables/datatables/jquery.dataTables.min.js"></script>
      <script src="../../asset/tables/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
      <script src="../../asset/tables/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
      <script src="../../asset/tables/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
      <script src="../sweetAlert.js"></script>

      <script>
         $(function () {
           $("#example1").DataTable();
         });

        
         function serve(value,ticket)
         {
               $("#serveId").modal("show");
           
               $("#serveorder").submit(function (e) { 
                  e.preventDefault();
                  $.ajax({
                     type: "post",
                     url: "serveorder.php",
                     data: "data=" +value +"&data2=" +ticket,
                     // dataType: "dataType",
                     success: function (response) {
                        swal({
                            title:response,
                            icon:"success"
                         }).then(function(){
                           window.location ="userinfo.php";
                         })
                     }
                  });
               });
            }
      </script>
   </body>
   <?php
    }
    else{
      header("location:../../index.php");
    }
    ?>

</html>