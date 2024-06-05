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
    ?>
      
         <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header">
               <div class="container-fluid">
                  <div class="row mb-2">
                     <div class="col-sm-6">
                     <h1 class="m-0"><span class="fa fa-chart-pie"></span> Fare Reports</h1>
                     </div>
                     <!-- /.col -->
                     <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                           <li class="breadcrumb-item"><a href="#">Home</a></li>
                           <li class="breadcrumb-item active">Reports</li>
                        </ol>
                     </div>
                  </div>
               </div>
            </div>
            <section class="content">
               <div class="container-fluid">
                  <div class="card card-info">
                     <br>
                     <div class="row">
                        <div class="col-md-6">
                        <table class="table table-bordered mytable">
                           <thead>
                              <td class="text-center"><strong>Fare</strong></td>
                              <td><strong>Commission</strong></td>
                              <td><strong>Tota</strong></td>
                           </thead>
                           <tbody>
                              <tr>
                                 <td class="text-center"><strong>15</strong></td>
                                 <td>5</td>
                                 <td>20</td>
                              </tr>
                              <tr>
                                 <td class="text-center"><strong>25</strong></td>
                                 <td>7</td>
                                 <td>32</td>
                              </tr>
                              <tr>
                                 <td class="text-center"><strong>35</strong></td>
                                 <td>10</td>
                                 <td>45</td>
                              </tr>
                           </tbody>
                        </table>
                     </div>
                     <div class="col-md-6">
                        <canvas id="chartjs-pie"></canvas>
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
      <!-- jQuery -->
      <script src="../asset/jquery/jquery.min.js"></script>
      <script src="../asset/js/bootstrap.bundle.min.js"></script>
      <script src="../asset/js/adminlte.js"></script>
      <!-- DataTables  & Plugins -->
      <script src="../asset/tables/datatables/jquery.dataTables.min.js"></script>
      <script src="../asset/tables/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
      <script src="../asset/tables/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
      <script src="../asset/tables/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
      
  <script src="../asset/js/chart.js"></script>
  <script>
    document.addEventListener("DOMContentLoaded", function() {
      // Pie chart
      new Chart(document.getElementById("chartjs-pie"), {
        type: "pie",
        data: {
          labels: ["Fare", "Commission", "Total"],
          datasets: [{
            data: [37, 13, 50],
            backgroundColor: [
              window.theme.primary,
              window.theme.warning,
              window.theme.danger,
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