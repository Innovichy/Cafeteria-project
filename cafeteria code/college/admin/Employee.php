
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
       include_once('includes/nav.php');
    include_once('includes/aside.php');
    include_once('../../include/connection.php');
//     if(isset($_SESSION['OwnerEmail']))
// {


//     ?>
      
         <!-- Content Wrapper. Contains page content -->
         <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header">
               <div class="container-fluid">
                  <div class="row mb-2">
                     <div class="col-sm-6">
                        <h1 class="m-0"><span class="fa fa-user"></span> Employee</h1>
                     </div>
                     <!-- /.col -->
                     <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                           <li class="breadcrumb-item"><a href="#">Home</a></li>
                           <li class="breadcrumb-item active">Employee</li>
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
                     <div class="col-md-12 col-lg-12 col-sm-12">
                        <table id="example1" class="table table-bordered table-responsive">
                           <thead>
                              <tr>
                                 <th>Full Name</th>
                                 <th>Contact</th>
                                
                                 <th>Email</th>
                                 <th>Account</th>
                                 <th>Action</th>
                              </tr>
                           </thead>
                           <tbody>
                           <?php
                              $sql ="SELECT * FROM `cafereriaowner` where usertype=1";
                              if($sqlResult = mysqli_query($con,$sql))
                              {
                                 if(mysqli_num_rows($sqlResult)>0)
                                 {
                                    while($row = mysqli_fetch_assoc($sqlResult))
                                    {
                                       echo "<tr>";
                                     echo  '<td>'.$row['FirstName']." ".$row['SecondName']." ".$row['Lastname'].'</td>';
                                     echo  '<td>'.$row['Phonenumber'].'</td>';
                                     echo  '<td>'.$row['email'].'</td>';
                               
                                     echo  '<td>active</td>';
                                     echo '  <td class="text-center">
                                   
                                        <a class="btn btn-sm btn-danger" href="#" data-toggle="modal"
                                           data-target="#delete"><i
                                           class="fa fa-trash"></i> Delete</a>
                        
                                  </td>';
                                       echo "</tr>";
                                    }
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
      <!-- ./wrapper -->
      <div id="delete" class="modal animated rubberBand delete-modal" role="dialog">
         <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
               <div class="modal-body text-center">
                  <h3>Are you sure want to delete this Employee?</h3>
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
                                 <span class="fa fa-user"> Employee Information</span>
                              </div>
                              <div class="row">
                                 
                                 <div class="col-md-6">
                                    <div class="form-group">
                                       <label>Contact</label>
                                       <input type="text" class="form-control" placeholder="Contact">
                                    </div>
                                 </div>
                                 <div class="col-md-6">
                                    <div class="form-group">
                                       <label>Email</label>
                                       <input type="text" class="form-control" placeholder="Email">
                                    </div>
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
                  <form  id ="employeeM">
                     <div class="card-body">
                        <div class="row">
                           <div class="col-md-12">
                              <div class="card-header">
                                 <span class="fa fa-user"> Employee Information</span>
                              </div>
                              <div class="row">
                                 <!-- <div class="row"> -->
                                    <div class="col-md-4">
                                       <div class="form-group">
                                          <label>FIrst Name</label>
                                          <input type="text" class="form-control"  name ="firstname" placeholder="FIrst Name">
                                       </div>
                                    </div>
                                 <div class="col-md-4">
                                    <div class="form-group">
                                       <label>Middle Name</label>
                                       <input type="text"  name ="middlename" class="form-control" placeholder="Middle Name">
                                    </div>
                                 </div>
                                 <div class="col-md-4">
                                    <div class="form-group">
                                       <label>Last Name</label>
                                       <input type="text" name ="lastname"  class="form-control" placeholder="Last Name">
                                    </div>
                                 </div>


                                 <!-- </div> -->
                                 
                                 <div class="col-md-6">
                                    <div class="form-group">
                                       <label>Contact</label>
                                       <input type="text" class="form-control" name ="contact"  placeholder="Contact">
                                    </div>
                                 </div>
                                 <div class="col-md-6">
                                    <div class="form-group">
                                       <label>Email</label>
                                       <input type="text" class="form-control" name ="email"  placeholder="Email">
                                    </div>
                                 </div>
                                 <div class="col-md-6">
                                    <div class="form-group">
                                      <label for="gender">Gender</label>
                                      <select class="form-control" name=" gender" id="gender">
                                        <option value =''> select</option>
                                        <option  value ='male'>Male</option>
                                        <option  value ='female' >Female</option>
                                      </select>
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


         $("#employeeM").submit( function (e){
               e.preventDefault();
                    console.log( $("#employeeM").serialize());


                   $.ajax({
                     type: "post",
                     url: "employedetails.php",
                     data:  $("#employeeM").serialize(),
                     success: function (response) {
                        console.log(response);
                     }
                    });
                  });
      </script>
 
   </body>

</html>