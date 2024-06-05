<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <title>QR-Code-Fare-Payment-System</title>
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
      <nav class="main-header navbar navbar-expand navbar-light elevation-1" style="background-color: rgb(8,59,102);">
         <!-- Left navbar links -->
         <ul class="navbar-nav">
            <li class="nav-item">
               <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
            </li>
         </ul>
         <ul class="navbar-nav ml-auto">
            <li class="nav-item">
               <a class="nav-link" href="#" role="button">
                  <img src="../asset/img/avatar.png" class="img-circle " alt="User Image" width="30">
               </a>
            </li>
            <li class="nav-item">
               <a class="nav-link" data-widget="fullscreen" href="#" role="button">
                  <i class="fas fa-expand-arrows-alt"></i>
               </a>
            </li>
            <li class="nav-item">
               <a class="nav-link" data-widget="fullscreen" href="../index.php">
                  <i class="fas fa-sign-out-alt"></i>
               </a>
            </li>
         </ul>
      </nav>
      <aside class="main-sidebar sidebar-light-primary ">
         <!-- Brand Logo -->
         <a href="index.html" class="brand-link animated swing">
            <img src="../asset/img/logo.png" alt="DSMS Logo" width="200">
         </a>
         <div class="sidebar">
            <nav class="mt-2">
               <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                  data-accordion="false">
                  <li class="nav-item">
                     <a href="index.html" class="nav-link">
                        <i class="nav-icon fa fa-tachometer-alt"></i>
                        <p>
                           Dashboard
                        </p>
                     </a>
                  </li>
                  <li class="nav-item">
                     <a href="drivers.html" class="nav-link">
                        <i class="nav-icon fa fa-user"></i>
                        <p>
                           Drivers
                        </p>
                     </a>
                  </li>
                  <li class="nav-item">
                     <a href="passenger.html" class="nav-link">
                        <i class="nav-icon fa fa-users"></i>
                        <p>
                           Passengers
                        </p>
                     </a>
                  </li>
                  <li class="nav-item">
                     <a href="balance.html" class="nav-link">
                        <i class="nav-icon fa fa-money-bill"></i>
                        <p>
                           Balance
                        </p>
                     </a>
                  </li>
                  <li class="nav-item">
                     <a href="reload-center.html" class="nav-link">
                        <i class="nav-icon fa fa-home"></i>
                        <p>
                           Reload Center
                        </p>
                     </a>
                  </li>
                  <li class="nav-item">
                     <a href="vehicles.html" class="nav-link">
                        <i class="nav-icon fa fa-car"></i>
                        <p>
                           Vehicles
                        </p>
                     </a>
                  </li>
                  <li class="nav-item">
                     <a href="fares.html" class="nav-link">
                        <i class="nav-icon fa fa-dollar-sign"></i>
                        <p>
                           Fares
                        </p>
                     </a>
                  </li>
                  <li class="nav-item">
                     <a href="fare-report.html" class="nav-link">
                        <i class="nav-icon fa fa-chart-pie"></i>
                        <p>
                           Fare Report
                        </p>
                     </a>
                  </li>
               </ul>
            </nav>
         </div>
      </aside>
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
                  <div class="card card-info">
                     <div class="card-header" style="background-color:rgb(8,59,102);">

                     <a class="btn btn-sm" href="#" data-toggle="modal"
                        data-target="#add" style="border: 1px solid #ddd;"><i
                        class="fa fa-user-plus"></i> Add</a>
                     </div>
                     <br>
                     <div class="col-md-12">
                        <table id="example1" class="table table-bordered">
                           <thead>
                              <tr>
                                 <th>Customer Name</th>
                                 <th>Reload</th>
                                 <th>Fare Payment</th>
                                 <th>Date</th>
                                 <th>Balance</th>
                                 <th>Remarks</th>
                                 <th>Action</th>
                              </tr>
                           </thead>
                           <tbody>
                              <tr>
                                 <td>John Doe</td>
                                 <td><span class="badge bg-warning">500.00</span></td>
                                 <td>25.00</td>
                                 <td>08-04-2021</td>
                                 <td><span class="badge bg-success">475.00</span></td>
                                 <td>remarks</td>
                                 <td class="text-center">
                                    <a class="btn btn-sm btn-success" href="#" data-toggle="modal"
                                       data-target="#edit"><i
                                       class="fa fa-pen"></i> Update</a>
                                       <a class="btn btn-sm btn-danger" href="#" data-toggle="modal"
                                          data-target="#delete"><i
                                          class="fa fa-trash"></i> Delete</a>
                                 </td>
                              </tr>
                              <tr>
                                 <td>Jane Doe</td>
                                 <td><span class="badge bg-warning">1000.00</span></td>
                                 <td>75.00</td>
                                 <td>08-04-2021</td>
                                 <td><span class="badge bg-success">925.00</span></td>
                                 <td>remarks</td>
                                 <td class="text-center">
                                    <a class="btn btn-sm btn-success" href="#" data-toggle="modal"
                                       data-target="#edit"><i
                                       class="fa fa-pen"></i> Update</a>
                                       <a class="btn btn-sm btn-danger" href="#" data-toggle="modal"
                                          data-target="#delete"><i
                                          class="fa fa-trash"></i> Delete</a>
                                 </td>
                              </tr>
                              <tr>
                                 <td>Juan Luna</td>
                                 <td><span class="badge bg-warning">700.00</span></td>
                                 <td>25.00</td>
                                 <td>08-04-2021</td>
                                 <td><span class="badge bg-success">675.00</span></td>
                                 <td>remarks</td>
                                 <td class="text-center">
                                    <a class="btn btn-sm btn-success" href="#" data-toggle="modal"
                                       data-target="#edit"><i
                                       class="fa fa-pen"></i> Update</a>
                                       <a class="btn btn-sm btn-danger" href="#" data-toggle="modal"
                                          data-target="#delete"><i
                                          class="fa fa-trash"></i> Delete</a>
                                 </td>
                              </tr>
                           </tbody>
                        </table>
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