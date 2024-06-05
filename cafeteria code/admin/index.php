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
                                 if($sql = mysqli_query($con,"SELECT  COUNT(*) as number FROM cafereriaowner where usertype =0"))
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
                                 if($sql = mysqli_query($con,"SELECT  COUNT(*) as number FROM `billingowner` where usertype =1"))
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
                  <div class="col-xl-12 col-md-12 col-12">
                     <div class="card">
                     <a href ="location.php">
                        <div class="card-body ">
                           <div class="d-flex justify-content-between p-md-1">
                              
                              <div class="d-flex flex-row">
                                 <div class="align-self-center">
                                    <i class="fa fa-home text-color fa-3x me-4"></i>
                                 </div>
                                 <div>
                                    <h4 class="txt">smartcard billing  Centers</h4>
                                    <p class="mb-4 txt">Number of smartcard billing  Centers</p>
                                 </div>
                              </div>
                              <div class="align-self-center">
                              <?php
                                 if($sql = mysqli_query($con,"SELECT  COUNT(*) as number FROM college"))
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
                              </a>
                     </div>
                  </div>
               </div>
            </div>
         </section>
      </div>
   </div>
   <!-- jQuery -->
   <script src="../asset/jquery/jquery.min.js"></script>
   <script src="../asset/js/adminlte.js"></script>
</body>

</html>