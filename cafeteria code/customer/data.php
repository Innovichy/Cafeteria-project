<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <title>Payment-System</title>
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
                     <a href="profile.html" class="nav-link">
                        <i class="nav-icon fa fa-user"></i>
                        <p>
                           My Profile
                        </p>
                     </a>
                  </li>
               </ul>
            </nav>
         </div>
      </aside>
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
                           <?php $data ='
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
                           <h2 class="h1 mb-4">Php 550.00</h2>
                        </div>
                        </div>';
                         $data2 ='<div style="height: 22vh;     background-color: blanchedalmond;
                         " class="text-center ">
                                                         <h3 class=" mb-3">  no card information </h3>
                                                        <h4 class="mb-3"> once you  click to register | card will be your personal responsibility </h4>
                                                    <div>
                                                      <button @click="openmodel" style="background-color: green; color:white; font-size:20px"> click to register card</button>
                                                     </div>
                                                         </div>';
                                    $data123 =true;
                                                         if($data123)
                                                         {
                                                            echo $data;
                                                         }
                                                         else{
                                                            echo $data2;
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
   <script src="../asset/jquery/jquery.min.js"></script>
   <script src="../asset/js/adminlte.js"></script>
</body>

</html>