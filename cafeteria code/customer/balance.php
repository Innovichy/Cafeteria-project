
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
   <title>samart-card-billing-System<</title>
      <!-- Font Awesome -->
   <link rel="stylesheet" href="../asset/fontawesome/css/all.min.css">
   <link rel="stylesheet" href="../asset/css/adminlte.min.css">
   <link rel="stylesheet" href="../asset/tables/datatables-bs4/css/dataTables.bootstrap4.min.css">
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
   include_once("common/navbar.php");
   include_once("common/sidebar.php");
    ?>
      
         <!-- Content Wrapper. Contains page content -->
         <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header">
               <div class="container-fluid">
                  <div class="row mb-2">
                     <div class="col-sm-6">
                        <h1 class="m-0"><span class="fa fa-money-bill"></span> Balance</h1>
                     </div>
                     <!-- /.col -->
                     <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                           <li class="breadcrumb-item"><a href="#">Home</a></li>
                           <li class="breadcrumb-item active">Balance</li>
                        </ol>
                     </div>
                  </div>
               </div>
            </div>
            <section class="content">
               <div class="container-fluid">
               <div class="col-md-12">
               <div class="card card-info  mt-2">

 
<table id="example1" class="table table-bordered">
   <thead>
      <tr>
        
         <th>Fare Payment</th>
         <th>Date</th>
         <th>Balance</th>
         <th>Remarks</th>
      </tr>
   </thead>
               <?php 
                      
  if($val =mysqli_query($con,"select  card_status from customer where cardNumber = $data123")) 
  {
                            $row = mysqli_fetch_assoc($val);
                           if($row['card_status'] ==1)
                           {
                           ?>
                    
      <tbody>
         <?php
            if($sql = mysqli_query($con,"SELECT  balance,created_at,balanceRemain FROM `balance` WHERE   Bcardnumber = $data123 ORDER by created_at desc LIMIT 5"))
            {
               if(mysqli_num_rows($sql)>0) 
               {
                  while($row =mysqli_fetch_assoc($sql))
                  {
                     ?>
                    <tr>
           <td><?=$row['balance'];?></td>
           <td><?=$row['created_at'];?></td>
           <td><?=$row['balanceRemain'];?></td>
           <?php 
           if($row['balanceRemain'] > 0)
           {

             echo  " <td>current balance</td>";
           }
           else{

              echo  "<td class ='bg-danger'>balance finished</td>";
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
               <?php
                            }
                           
                           } 
                         ?>
                         
                  
               </div>
            </section>
         </div>
      </div>
      <div id="delete" class="modal animated rubberBand delete-modal" role="dialog">
         <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
               <div class="modal-body text-center">
                  <img src="../asset/img/sent.png" alt="" width="50" height="46">
                  <h3>Are you sure want to delete this Balance?</h3>
                  <div class="m-t-20"> 
                     <a href="#" class="btn btn-white" data-dismiss="modal">Close</a>
                     <button type="submit" class="btn btn-danger">Delete</button>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <div id="edit" class="modal animated rubberBand delete-modal" role="dialog">
         <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
               <div class="modal-body text-center">
                  <form>
                     <div class="card-body">
                        <div class="row">
                           <div class="col-md-12">
                              <div class="card-header">
                                 <span class="fa fa-user"> Balance Information</span>
                              </div>
                              <div class="row">
                                 <div class="col-md-4">
                                    <div class="form-group">
                                       <label>Customer Name</label>
                                       <input type="text" class="form-control" placeholder="Customer Name">
                                    </div>
                                 </div>
                                 <div class="col-md-4">
                                    <div class="form-group">
                                       <label>Reload</label>
                                       <input type="text" class="form-control" placeholder="Reload">
                                    </div>
                                 </div>
                                 <div class="col-md-4">
                                    <div class="form-group">
                                       <label>Fair</label>
                                       <input type="text" class="form-control" placeholder="Fair">
                                    </div>
                                 </div>
                                 <div class="col-md-4">
                                    <div class="form-group">
                                       <label>Date</label>
                                       <input type="date" class="form-control">
                                    </div>
                                 </div>
                                 <div class="col-md-4">
                                    <div class="form-group">
                                       <label>Balance</label>
                                       <input type="text" class="form-control" placeholder="Balance">
                                    </div>
                                 </div>
                                 <div class="col-md-4">
                                    <div class="form-group">
                                       <label>Remarks</label>
                                       <input type="text" class="form-control" placeholder="Remarks">
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                     <!-- /.card-body -->
                     <div class="card-footer">
                        <a href="#" class="btn btn-danger" data-dismiss="modal">Close</a>
                        <button type="submit" class="btn btn-primary">Save</button>
                     </div>
                  </form>
               </div>
            </div>
         </div>
      </div>
      <div id="add" class="modal animated rubberBand delete-modal" role="dialog">
         <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
               <div class="modal-body text-center">
                  <form>
                     <div class="card-body">
                        <div class="row">
                           <div class="col-md-12">
                              <div class="card-header">
                                 <span class="fa fa-user"> Balance Information</span>
                              </div>
                              <div class="row">
                                 <div class="col-md-4">
                                    <div class="form-group">
                                       <label>Customer Name</label>
                                       <input type="text" class="form-control" placeholder="Customer Name">
                                    </div>
                                 </div>
                                 <div class="col-md-4">
                                    <div class="form-group">
                                       <label>Reload</label>
                                       <input type="text" class="form-control" placeholder="Reload">
                                    </div>
                                 </div>
                                 <div class="col-md-4">
                                    <div class="form-group">
                                       <label>Fair</label>
                                       <input type="text" class="form-control" placeholder="Fair">
                                    </div>
                                 </div>
                                 <div class="col-md-4">
                                    <div class="form-group">
                                       <label>Date</label>
                                       <input type="date" class="form-control">
                                    </div>
                                 </div>
                                 <div class="col-md-4">
                                    <div class="form-group">
                                       <label>Balance</label>
                                       <input type="text" class="form-control" placeholder="Balance">
                                    </div>
                                 </div>
                                 <div class="col-md-4">
                                    <div class="form-group">
                                       <label>Remarks</label>
                                       <input type="text" class="form-control" placeholder="Remarks">
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                     <!-- /.card-body -->
                     <div class="card-footer">
                        <a href="#" class="btn btn-danger" data-dismiss="modal">Close</a>
                        <button type="submit" class="btn btn-primary">Save</button>
                     </div>
                  </form>
               </div>
            </div>
         </div>
      </div>
      <!-- jQuery -->
      <script src="../asset/jquery/jquery.min.js"></script>
      <script src="../asset/js/bootstrap.bundle.min.js"></script>
      <script src="../asset/js/adminlte.js"></script>
      <!-- DataTables  & Plugins -->
      <script src="../asset/tables/datatables/jquery.dataTables.min.js"></script>
      <script src="../asset/tables/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
      <script src="../asset/tables/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
      <script src="../asset/tables/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
      <script>
         $(function () {
           $("#example1").DataTable();
         });
      </script>
   </body>
</html>