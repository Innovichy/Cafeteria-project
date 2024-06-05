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
      <?php
    include_once('includes/aside.php');
    include_once('../include/connection.php');
    ?>
              <!-- Content Wrapper. Contains page content -->
         <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header">
               <div class="container-fluid">
                  <div class="row mb-2">
                     <div class="col-sm-6">
                        <h1 class="m-0"><span class="fa fa-home"></span> card center</h1>
                     </div>
                     <!-- /.col -->
                     <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                           <li class="breadcrumb-item"><a href="#">Home</a></li>
                           <li class="breadcrumb-item active">card center</li>
                        </ol>
                     </div>
                  </div>
               </div>
            </div>
            <section class="content">
               <div class="container-fluid">
                  <div class="card card-info">
                     <div class="card-header" style="background-color:rgb(8,59,102);">

                     <a class="btn btn-sm mr-3" href="#" data-toggle="modal"
                        data-target="#add" style="border: 1px solid #ddd;"><i
                        class="fa fa-user-plus"></i> Add Customer Information</a>
                     <a class="btn btn-sm" href="location.php"  style="border: 1px solid #ddd;"><i
                        class="fa fa-user-plus"></i>  Location</a>
                     </div>
                     <br>
                     <div class="col-md-12">
                        <table id="example1" class="table table-bordered">
                           <thead>
                              <tr>
                                 <th>Center Name</th>
                                 <th>Owner</th>
                                 <th>Address</th>
                                 <th>Account</th>
                                 <th>Action</th>
                              </tr>
                           </thead>
                           <tbody>
                              <tr>
                                 <td>Reloading Center 1</td>
                                 <td>John Doe</td>
                                 <td>Pasig, Manila</td>
                                 <td><span class="badge bg-success">actived</span></td>
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
                                 <td>Reloading Center 2</td>
                                 <td>John Doe</td>
                                 <td>Makati, Manila</td>
                                 <td><span class="badge bg-success">actived</span></td>
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
                                 <td>Reloading Center 3</td>
                                 <td>John Doe</td>
                                 <td>Taguig, Manila</td>
                                 <td><span class="badge bg-success">actived</span></td>
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
                  <h3>Are you sure want to delete this Reload Center?</h3>
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
                                 <span class="fa fa-home"> Reload Center Information</span>
                              </div>
                              <div class="row">
                                 <div class="col-md-6">
                                    <div class="form-group">
                                       <label>Center Name</label>
                                       <input type="text" class="form-control" placeholder="Center Name">
                                    </div>
                                 </div>
                                 <div class="col-md-6">
                                    <div class="form-group">
                                       <label>Owner</label>
                                       <input type="text" class="form-control" placeholder="Owner">
                                    </div>
                                 </div>
                                 <div class="col-md-12">
                                    <div class="form-group">
                                       <label>Address</label>
                                      <textarea class="form-control"></textarea>
                                    </div>
                                 </div>
                                 <div class="col-md-4">
                                    <div class="form-group">
                                       <label>Location</label>
                                       <input type="text" class="form-control" placeholder="Location">
                                    </div>
                                 </div>
                                 <div class="col-md-4">
                                    <div class="form-group">
                                       <label>Username</label>
                                       <input type="text" class="form-control" placeholder="Username">
                                    </div>
                                 </div>
                                 <div class="col-md-4">
                                    <div class="form-group">
                                       <label>Password</label>
                                       <input type="text" class="form-control" placeholder="*********">
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


         function data(value)
               {
                  if(value!= "")
                  {
                  
                     $.ajax({
                        type: "post",
                        url: "college/cafeteria.php",
                        data: "data2="+value,
                        // dataType: "Json",
                        success: function (response) {
                           // console.log(response);
                              if(response!="no data available")
                              {

                                $("#cafeteria").html(response);
                              }
                        }
                     });
                  }
                  
               }
               $("#customerM").submit(function(e)
               {
                  e.preventDefault();
                 console.log( $("#customerM").serialize());
               })

      </script>
   </body>
</html>





