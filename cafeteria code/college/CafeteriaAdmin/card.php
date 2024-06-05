

<?php
session_start();
?>
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
<?php


if(isset($_SESSION['NormalOwneremail']))
{

  include_once('includes/navbar.php');
  include_once('includes/aside.php');
  include_once('../../include/connection.php');

?>

<body class="hold-transition sidebar-mini layout-fixed">
   <div class="wrapper">
      
   
   
      
         <!-- Content Wrapper. Contains page content -->
         <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header">
               <div class="container-fluid">
                  <div class="row mb-2">
                     <div class="col-sm-6">
                        <h1 class="m-0"><span class="fa fa-credit-card"></span> Cards</h1>
                     </div>
                     <!-- /.col -->
                     <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                           <li class="breadcrumb-item"><a href="#">Home</a></li>
                           <li class="breadcrumb-item active">Cards</li>
                        </ol>
                     </div>
                  </div>
               </div>
            </div>
            <section class="content">
               <div class="container-fluid">
                  <div class="card card-info">
                    
                     <br>
                     <div class="col-md-12">
                        <table id="example1" class="table table-bordered">
                           <thead>
                              <tr>
                              <th>sn</th>
                              <th>card Number</th>
                              <th>created</th>
                              <th>info</th>
                           </tr>
                             
                           </thead>
                           <tbody>
                           <?php
                           $counter =1;
                              $query = " SELECT * ,dayname(createdAt) as day FROM `card`";
                              if($sql = mysqli_query($con,$query))
                              {
                                 if(mysqli_num_rows($sql)>0)
                                       {

                                          while($data = mysqli_fetch_assoc($sql))  
                                          {
                                             echo "<tr>";
                                            echo   "<td width ='10px'>".$counter. "</td>";
                                              echo "<td width ='300px'>".$data['cardNumber']."</td>";
                                             
                                             
                                              echo "<td width ='400px'>".$data['day'] ." " .$data['createdAt']."</td>"; 
                                               if($data['card_status'])
                                               {
                                                echo "<td> taken </td>"; 
                                               }
                                               else{
                                                echo "<td>  <span class='bg-success'>not  taken</span>
                                                 </td>";
                                               }
                                              $counter++;
                                             ?>
                                            
                                          </tr>
                                          <?php
                                          }                        
                                       }
                                       else{
                                          echo " <tr>
                                          <td colspan=4 class ='text-center h5'>data not available</td>
                                          </tr>";
                                       }
                              }
                              ?>
                           
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
      
      

      <!-- jQuery -->
      <script src="../../asset/jquery/jquery.min.js"></script>
      <script src="../../asset/js/bootstrap.bundle.min.js"></script>
      <script src="../../asset/js/adminlte.js"></script>
      <!-- DataTables  & Plugins -->
      <script src="../../asset/tables/datatables/jquery.dataTables.min.js"></script>
      <script src="../../asset/tables/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
      <script src="../../asset/tables/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
      <script src="../../asset/tables/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
      <script>
         $(function () {
           $("#example1").DataTable();
         });


         //  data-toggle="modal"  data-target="#edit"
      </script>
         <?php
      }
      else
      {
         header("location:../../index.php");

      }
      ?>
   </body>
</html>