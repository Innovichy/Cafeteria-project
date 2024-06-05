
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

<body class="hold-transition sidebar-mini layout-fixed">
   <div class="wrapper">
    
      <?php
    include_once('includes/navbar.php');
    include_once('includes/aside.php');
    include_once('../../include/connection.php');

    
  
   
    ?>
      <div id="add" class="modal animated rubberBand delete-modal" role="dialog">
         <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
               <div class="modal-body text-center">
                  <form  id ="employeeM" method ="post" action ="<?=$_SERVER['PHP_SELF'];?>">
                     <div class="card-body">
                        <div class="row">
                           <div class="col-md-12">

                              <div class="card-header">
                                 <span class="fa fa-user"> Generate customer usage Report</span>
                              </div>

                              <div class="row">

                              <div class="col-md-6  m-auto">

                              <div class="form-group">
                                <label for="">Phone number</label>
                                 <input type="text" class="form-control" name="number" >
                              </div>

                              </div>
                           
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
                        class="fa fa-book"></i> Generate Report</a>
                   
                     </div>

                     <br>
                   
                <div>
                     
                     <div class ="row">

                        <div class ="col-md-6 ">
                        <h5>  Customer Account Statement</h5>
                        <img src="../../asset/img/CSBSlogo.png" alt="csfeteria smartcard biling system" height="100" width ="200">
                        </div>
                        <div class="col-md-6">
                        <p> 
                            <span><b>Statement Date: </b></span>
                            <span>___________________</span>
                        </p>
                        <p> <span><b>Statement Period: </b></span>
                            <span>___________________</span>
                            </p>
                        <p> <span><b>Cafeteria Name:</b></span> 
                            <span>___________________</span>
                        </p>
                        </div>

                    </div>
                    <hr class="border border-dark">
                    <!-- end of row 1 -->
                     <div class="row">
                        <div class="col-md-6">


                  <table class="  col-lg-8 col-md-8 col-sm-12" border>
                    <tr>
                       <td>Account Number</td>
                       <td>_________</td>
                      
                    </tr>
                    <tr>
                       <td>Account Name </td>
                       <td>__________</td>
                     
                    </tr>
                    <tr>
                       <td>Contact</td>
                       <td>__________</td>
                       
                    </tr>
                 </table>
                     </div>
                        <div class="col-md-6">


                        <div class=" col-lg-8 col-md-8 col-sm-12 table" border>
                    <tr class="tr">
                       <td>Available Balance</td>
                       <td>_____________</td>
                     
                    </tr>
                    <tr>
                       <td>Total depost </td>
                       <td>__________</td>
                      
                    </tr>
                  
    </div>  
                 </div>
                 
                 </div>
                     </div>
                     <!-- end of row2 -->
                     
                  </div>
               </div>

            </section>
          
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
        
      </script>
   </body>
 
    
</html>