
<?php
session_start();
?>

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
<?php


if(isset($_SESSION['NormalOwneremail']))
{

  include_once('includes/navbar.php');
  include_once('includes/aside.php');
  include_once('../../include/connection.php');
  $cardcheck;

?>

<body class="hold-transition sidebar-mini layout-fixed">
   <div class="wrapper">
    
    
      
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
                        class="fa fa-user-pan-food"></i> Add customer</a>
                        <!-- adding other method of register  -->
                     <a class="btn btn-sm" href="#" data-toggle="modal"
                        data-target="#add2" style="border: 1px solid #ddd;"><i
                        class="fa fa-user-pan-food"></i> Add customer</a>
                   
                     </div>
                     <br>
                     <div class="row">
                        <div class="col-md-12">
                  <table class="table" id="example1" class="table table-bordered">
                     <thead>
                        <tr>
                           <th>number</th>
                           <th>FistName</th>
                           <th>MiddleName</th>
                           <th>LastName</th>
                           <th>Cardnumber</th>
                           <th>Created At</th>
                        </tr>
                     </thead>
                     <tbody>
                     <?php
                     $counter =1;
                              $query = " select * ,dayname(createdAt) as day from customer";
                              if($sql = mysqli_query($con,$query))
                              {
                                 if(mysqli_num_rows($sql)>0)
                                       {

                                          while($data = mysqli_fetch_assoc($sql))  
                                          {
                                             echo "<tr>";
                                             // echo "<td>".$counter."</td>"; 
                                              echo "<td>".$counter++."</td>";
                                              echo "<td>".ucfirst($data['FirstName'])."</td>"; 
                                              echo "<td>".ucfirst($data['MiddleName'])."</td>"; 
                                              echo "<td>".ucfirst($data['lastName'])."</td>"; 
                                              echo "<td>".$data['cardNumber']."</td>"; 
                                              echo "<td>".$data['day'] ." " .$data['createdAt']."</td>"; 

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
                  </div>
               </div>
               <!-- /.container-fluid -->
            </section>
            <!-- /.content -->
         </div>
         <!-- /.content-wrapper -->
      </div>
      <!-- ./wrapper -->
   
      <div id="add" class="modal animated rubberBand delete-modal" role="dialog">
         <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
               <div class="modal-body text-center">
                  <form  id ="customerM"> 
                     <div class="card-body">
                        <div class="row">
                           <div class="col-md-12">
                              <div class="card-header">
                                 <span class="fa fa-user">  Customer Information</span>
                              </div>
                              <div class="row">
                                
                                 <div class="col-md-12">
                                    <div class ="row">

                                       <div class="col-md-4">
                                       <div class="form-group">
                                          <label for="fname">First Name</label>
                                          <input type="text"  name="firstname" class="form-control" id="fname" placeholder="First Name">
                                       </div>
                                    </div>
                                       <div class="col-md-4">
                                       <div class="form-group">
                                          <label for ="mname" >Middle Name</label>
                                          <input type="text" name="middlename"  id="mname" class="form-control" placeholder="Middle Name">
                                       </div>
                                    </div>
                                       <div class="col-md-4">
                                       <div class="form-group">
                                          <label for ="lname">Last Name</label>
                                          <input type="text"   name="lastname" id ="lname" class="form-control" placeholder="Last Name">
                                       </div>
                                    </div>
                                    </div>
                                
                                 </div>
                                 <div class="col-md-6">
                                    <div class="form-group">
                                       <label>Contact</label>
                                       <input type="text" name="Contact" id ="contact" class="form-control" placeholder="Contact">
                                    </div>
                                 </div>
                                 <div class="col-md-6">
                                    <div class="form-group">
                                      <label for="">Gender</label>
                                      <select class="form-control" name="gender" id="gender">
                                        <option value ="">select gender</option>
                                        <option value ="male">Male</option>
                                        <option value ="female">Female</option>
                                      </select>
                                    </div>
                                  
                                 </div>
                                 <div class="col-md-6">
                                  <div class="form-group">
                                    <label for="">CardNumber</label>

                                    <?php
                                    $row =Array();
                                     $sql ='SELECT * FROM scanneddata' ;
                                     if($result = mysqli_query($con,$sql))
                                     {
                                        if(mysqli_num_rows($result)>0)
                                        {

                                    $row = mysqli_fetch_assoc($result);
                                        }


                                     }
                                     
                                    if(isset($row['Usercardnumber']))
                                    {
                                         $card =$row['Usercardnumber'];
                                        echo '<input type="text" class="form-control" name="cardnumber" id="cardnumber" value ="'.$card.'" readonly>';
                                    }
                                    else{
                                        echo '<input type="text" class="form-control" name="" id="cardnumber" aria-describedby="helpId" placeholder="" readonly>';

                                    }?>
                                  </div>
                               
                                 </div>
                                 <div class="col-md-6">
                                 <div class="form-group">
                                    <label for="">Password</label>
                                    <?php
                                    if(isset($row['userPassword']))
                                    {
                                        $userpwd =$row['userPassword'];
                                        echo '<input type="password" class="form-control" name="password" id="password" value ="'.$userpwd.'" readonly>';
                                    }
                                    else{
                                        echo '<input type="password" class="form-control" name="" id="password" aria-describedby="helpId" placeholder="" readonly>';

 
                                    }?>
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
      </div>
      <div id="add2" class="modal animated rubberBand delete-modal" role="dialog">
         <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
               <div class="modal-body text-center">
                  <form  id ="customerM"> 
                     <div class="card-body">
                        <div class="row">
                           <div class="col-md-12">
                              <div class="card-header">
                                 <span class="fa fa-user">  Customer Information</span>
                              </div>
                              <div class="row">
                                
                                 <div class="col-md-12">
                                    <div class ="row">

                                       <div class="col-md-4">
                                       <div class="form-group">
                                          <label for="fname">First Name</label>
                                          <input type="text"  name="firstname" class="form-control" id="fname" placeholder="First Name">
                                       </div>
                                    </div>
                                       <div class="col-md-4">
                                       <div class="form-group">
                                          <label for ="mname" >Middle Name</label>
                                          <input type="text" name="middlename"  id="mname" class="form-control" placeholder="Middle Name">
                                       </div>
                                    </div>
                                       <div class="col-md-4">
                                       <div class="form-group">
                                          <label for ="lname">Last Name</label>
                                          <input type="text"   name="lastname" id ="lname" class="form-control" placeholder="Last Name">
                                       </div>
                                    </div>
                                    </div>
                                
                                 </div>
                                 <div class="col-md-6">
                                    <div class="form-group">
                                       <label>Contact</label>
                                       <input type="text" name="Contact" id ="contact" class="form-control" placeholder="Contact">
                                    </div>
                                 </div>
                                 <div class="col-md-6">
                                    <div class="form-group">
                                      <label for="">Gender</label>
                                      <select class="form-control" name="gender" id="gender">
                                        <option value ="">select gender</option>
                                        <option value ="male">Male</option>
                                        <option value ="female">Female</option>
                                      </select>
                                    </div>
                                  
                                 </div>
                                 <div class="col-md-6 m-auto">
                                  <div class="form-group">
                                    <label for="">CardNumber</label>
                                    <select class="form-control" name="cardnumber" id="cardnumber">
                                    <option value ="">select cardnumber</option>
                                    <?php
                                     $sql ='SELECT * FROM card where card_status =0' ;
                                     if($result = mysqli_query($con,$sql))
                                     {
                                        if(mysqli_num_rows($result)>0)
                                        {


                                    $row = mysqli_fetch_assoc($result);
                                     echo $row['cardNumber'];
                                    echo ' <option value ="'.$row['cardNumber'].'">'.$row['cardNumber'].'</option>';
                                 }else{
                                    
                                    echo ' <option value ="" class="bg-danger"> no card number </option>';
                                     $cardcheck =1;

                                        }


                                     }
                                     
                                   
                                   ?>
                                    </select>
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
         $(function () {
           $("#example1").DataTable();
         });

         $("#customerM").submit(function (e) { 
            e.preventDefault();
             if($("#cardnumber").val() =="" )
             {
               alert("  cardnumber Required");
             }
             else if($("#password").val() =="" )
             {
               alert("  Password Required ");
            }
             else if($("#fname").val() =="" )
             {
               alert(" Fill First Name");
             }
             else if($("#mname").val() =="" )
             {
               alert(" Fill Middle Name");
             }
           
             else if($("#lname").val() =="" )
             {
               alert("  Fill Last Name ");
            }
             else if($("#gender").val() =="" )
             {
               alert(" select  gender");
             }
             else if($("#contact").val() !="" )
             {

                var phone = $("#contact").val();
                if(isNaN(phone))
                {
                  alert(" fill number and not character")
                }
                else{
                  if(phone.length !=10)
                {
                  alert(" phone number should have 10 digits")
                }
               }
               
             
               $.ajax({
               type: "post",
               url: "customerInsert.php",
               data: $("#customerM").serialize(),
               // dataType: "json",
               success: function (response) {
                  var data = JSON.parse(response);
                
                   for ( const [key,va] of  Object.entries(data))
                        {
                      
                            if(key  =="error")
                            {
                                console.log((va));
                                swal({
                                       title:va,
                                       icon:"warning"
                                     })
                                 console.log(" data passed here");
                            }
                            else if(key =="success")
                            {
                              swal({
                                       title:va,
                                       icon:"success"
                                     }).then(function(){
                                       <?php
                                      unset( $_SESSION['ScanedCardnumber']);
                                       unset( $_SESSION['userpassword']);
                                       ?>
                                       window.location ="registerCustomer.php";
                                     })
                            }
                
               }
            }
            });
            }
         
            
         });
       
      </script>
   </body>
   <?php
    }
    else{
      header("location:../../index.php");
    }
    ?>
</html>