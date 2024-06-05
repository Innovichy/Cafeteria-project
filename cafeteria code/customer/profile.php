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
      .capitalize{
      text-transform:capitalize;
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
                        <h1 class="m-0"><span class="fa fa-user"></span> Profile</h1>
                     </div>
                     <!-- /.col -->
                     <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                           <li class="breadcrumb-item"><a href="#">Home</a></li>
                           <li class="breadcrumb-item active">My Profile</li>
                        </ol>
                     </div>
                     <!-- /.col -->
                  </div>
                  <!-- /.row -->
               </div>
               <!-- /.container-fluid -->
            </div>
            <section class="content">
               <div class="container-fluid">
                  <div class="">
              
              <form>
                <div class="">
                  <div class="row">
                 
                  </div>
                  <div class="col-md-10 m-auto">
                     <div class="">
                        <h5 > Profile Information</h5>
              </div>
              <div class ="col-md-10  m-auto">
             
              <div class="list-group">
             
               <a href="#" class="list-group-item list-group-item-action  d-flex justify-content-between "> 
                     <h5 class="capitalize">full name</h5> <h5 class="capitalize" ><?=$_SESSION['customerFname'] .' '.$_SESSION['customerFname'];?></h5>
               </a>
               <a href="#" class="list-group-item list-group-item-action d-flex justify-content-between">
                  <h5 class="capitalize">email</h5> <h5 class="" ><?=$_SESSION['customerEmail'] ;?></h5>
               </a>
               <a href="#" class="list-group-item list-group-item-action d-flex justify-content-between">
                  <h5 class="capitalize">phone number</h5> <h5 class="" ><?= $_SESSION['customerPhone'];?></h5>
               </a>
               <a href="#" class="list-group-item list-group-item-action d-flex justify-content-between">
                  <h5 class="capitalize">gender</h5> <h5 class="capitalize" ><?=$_SESSION['customerGender'] ;?></h5>
               </a>
               
               
              </div>
            
              
              </div>
              <div>
               
              </div>
                  <div class="row">
                
                
             
               
            </div>
              </div>
                  </div>

                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <a href="#" class="btn btn-primary"> Changes Account password</a>
                </div>
              </form>
            </div>
               </div>
               <!-- /.container-fluid -->
            </section>
            <!-- /.content -->
         </div>
         <!-- /.content-wrapper -->
      </div>
      <!-- ./wrapper -->
      <!-- jQuery -->
      <script src="../asset/jquery/jquery.min.js"></script>
      <script src="../asset/js/adminlte.js"></script>

   </body>
</html>