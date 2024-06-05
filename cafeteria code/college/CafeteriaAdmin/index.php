
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
 
 if(isset($_SESSION['NormalOwnerEmail']))
 {
   include_once('includes/navbar.php');
   include_once('includes/aside.php');
   include_once('../../include/connection.php');
   ?>
<body class="hold-transition sidebar-mini layout-fixed">
   <div class="wrapper">
    

 $ellyfood;
    
    $userid =$_SESSION['id'];
    
      
         <!-- Content Wrapper. Contains page content -->
         <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header">
               <div class="container-fluid">
                  <div class="row mb-2">
                     <div class="col-sm-6">
                        <h1 class="m-0"><span class="fa fa-food"></span> Food</h1>
                     </div>
                     <!-- /.col -->
                     <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                           <!-- <li class="breadcrumb-item active">food</li> -->
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
                        data-target="#addfood" style="border: 1px solid #ddd;"><i
                        class="fa fa-user-pan-food"></i> Add Food</a>
                     <a class="btn btn-sm" href="#" data-toggle="modal"
                        data-target="#add" style="border: 1px solid #ddd;"><i
                        class="fa-solid fa-plate-utensil"></i>Create Menu</a>
                     </div>
                     <br>
                     <div class="row">
                     <div class="col-md-6">
                     <div class="col-md-6 ">
                           <h2 class="text-center"> Food Available</h2>
                        </div>
                        <table id="example1" class="table table-bordered">
                           <thead>
                              <tr>
                                 <th>Food</th>
                                 <th>Price</th>
                                 <th>Action</th>
                              </tr>
                           </thead>
                           <tbody>
                              <?php
                                $sql ="select * from food";
                                if($food = mysqli_query($con,$sql))
                                {
                                    if(mysqli_num_rows($food)>0)
                                 {
                                    while($result = mysqli_fetch_assoc($food))
                                    {
                                      ?> 
                                       <tr>
                                 <td><?= ucfirst($result['foodname']);?></td>
                                 <td><?=  ucfirst($result['amount']);?></td>
                            
                                
                                 <td class="text-center">
                                    
                                    <button class="btn btn-sm btn-danger" 
                               
                                    onclick="getdeleteid(<?=$result['foodId'];?>)"
                                      ><i
                                       class="fa fa-trash"></i> Delete</button>
                                 </td>
                              </tr>
                                      <?php
                                    }
                                 }
                                }
                              ?>
                            
                           </tbody>
                        </table>
                     </div>
                     <div class="col-md-6">
                        <div class="row">
                        <div class="col-md-6 ">
                           <h2 class="text-center">Today's Menu</h2>
                        </div>
                        </div>
                     
                        <table id="example1" class="table table-bordered">
                           <thead>
                              <tr>
                                 <th>food</th>
                                 <th>action</th>
                              </tr>
                           </thead>
                           <tbody>
                              <?php
                              $menudeleted ;
                              $menuid ;
                                $sql ="select * from menufood where status =2 ";

                           
                                if($food = mysqli_query($con,$sql))
                                {
                                    if(mysqli_num_rows($food)>0)
                                 {
                                    while($result = mysqli_fetch_assoc($food))
                                    {  
                                        $id = $result['id'];
                                       
                                       
                                          if($food2 = mysqli_query($con,"select * from food "))
                                          {
                                              while($result2 = mysqli_fetch_assoc($food2))
                                              {
                                                if($result2['foodId']==$id)
                                              {
                                                $menudeleted = $id;
                                                $menuid = $result['menuid'];

                                           ?> 
                                           <tr>
                                     <td><?= ucfirst($result2['foodname']);?></td>
                             
                               
                                   
                                    <td class="text-center">
                                    
                                       <button class="btn btn-sm btn-danger" 
                                       onclick="deleted(<?=$menuid;?>)"><i
                                          class="fa fa-trash" ></i> Delete</button>
                                    </td>
                                 </tr>
                                        <?php
                                         }
                                       }
                                       }}

                                 
                                    }
                                    else{
                                       echo "<td colspan =2 class='text-center'> no menu availabce </td>";
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
      <div id="delete" class="modal animated rubberBand delete-modal" role="dialog">
         <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
               <form id ="menudelete">
               <div class="modal-body text-center">
                  <h3>Are you sure want to delete menu?</h3>
                  <div class="m-t-20"> 
                     <a href="#" class="btn btn-white" data-dismiss="modal">Close</a>
                     <button type="submit" class="btn btn-danger" >Delete</button>
                  </div>
                  </form>
               </div>
            </div>
         </div>
      </div>
   <!-- delete food -->
   <div id="fooddelete" class="modal animated rubberBand delete-modal" role="dialog">
         <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
               <form id ="menudelete">
               <div class="modal-body text-center">
                  <h3>Are you sure want to delete food?</h3>
                  <div class="m-t-20"> 
                     <a href="#" class="btn btn-white" data-dismiss="modal">Close</a>
                     <button type="submit" class="btn btn-danger" >Delete</button>
                  </div>
                  </form>
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
                  <form id="menu">
                     <div class="card-body">
                        <div class="row">
                           <div class="col-md-12">
                              <div class="card-header">
                                 <span class="fa fa-user"> food details</span>
                              </div>
                              <div class="row ">
                                 <!-- <div class="row"> -->
                               

                                  <?php
                                 $sql ="select * from food";
                                 if($sqlquery= mysqli_query($con,$sql))
                                 {
                                    if(mysqli_num_rows($sqlquery)>0){
                                       while($rowdata = mysqli_fetch_assoc($sqlquery))
                                       {
                                          ?>
                                         <div class="col-md-6">
                                         <div class="form-check">
                                           <label class="form-check-label">
                                              <input type="checkbox"  id ="check" class="form-check-input" name="<?=$rowdata['foodname'];?>" id="" value="<?=$rowdata['foodId'];?>" >
                                              <?=$rowdata['foodname'];?>
                                             </label>
                                          </div>
                                       </div>
                                       <?php
                                          
                                       }
                                       //  echo '<input type="hidden" name="track" value ='.$userid.'>'; 
                                    }
                                    else{

                                    }

                                 }
                                  ?>
                     
                             </div>
                           </div>
                        </div>
                     </div>
                     <!-- /.card-body -->
                     <div class="card-footer">
                        <a href="#" class="btn btn-danger" data-dismiss="modal">Close</a>
                        <button type="submit" class="btn btn-primary">Create Menu</button>
                     </div>
                  </form>
               </div>
            </div>
         </div>
      </div>
      <!-- update food -->
      <div id="updatefood" class="modal animated rubberBand delete-modal" role="dialog">
         <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
               <div class="modal-body text-center">
               <form id ="updatefood">
                     <div class="card-body">
                        <div class="row">
                           <div class="col-md-12">
                              <div class="card-header">
                                 <span > Food Information</span>
                              </div>

                              <div class="row">

                                 <div class="col-md-6">
                                    <div class="form-group">
                                       <label>Food Name</label>
                                       <input type="text" class="form-control"  id="updateFoodName"  name='foodname' placeholder="food name">
                                    </div>

                                 </div>

                                 <div class="col-md-6">

                                    <div class="form-group">
                                       <label>Price</label>
                                       <input type="text"  name="price"   id="updateFoodPrice"  class="form-control" placeholder="price">
                                    </div>

                                 </div>
                               </div>
                               <div class="col-md-10">
                                 <div class="card-footer">
                        <a href="#" class="btn btn-danger" data-dismiss="modal">Close</a>
                        <button type="submit" class="btn btn-primary" onclick ="updatedfoodinsertion()">Save</button>
                         </div>
                         </div>
                           
                              </div>
                         </div>
                                 
                     </div>

                  </form>
               </div>
            </div>
         </div>
      </div>
      <!--  end of update food model -->
      <div id="addfood" class="modal animated rubberBand delete-modal" role="dialog">
         <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
               <div class="modal-body text-center">
               <form id ="addfoodinsert">
                     <div class="card-body">
                        <div class="row">
                           <div class="col-md-12">
                              <div class="card-header">
                                 <span > Food Information</span>
                              </div>

                              <div class="row">

                                 <div class="col-md-6">
                                    <div class="form-group">
                                       <label>Food Name</label>
                                       <input type="text" class="form-control"  name='foodname'  id ="food"placeholder="food name">
                                    </div>

                                 </div>

                                 <div class="col-md-6">

                                    <div class="form-group">
                                       <label>Price</label>
                                       <input type="text"  name="price"  class="form-control"  id ="price" placeholder="price">
                                    </div>

                                 </div>
                               </div>
                               <div class="col-md-10">
                                 <div class="card-footer">
                        <a href="#" class="btn btn-danger" data-dismiss="modal">Close</a>
                        <button type="submit" class="btn btn-primary">Save</button>
                         </div>
                         </div>
                           
                              </div>
                         </div>
                                 
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
      <script src="../sweetAlert.js"></script>

      <script>
         var foodid ;
         $(function () {
           $("#example1").DataTable();
         });

         $("#addfoodinsert").submit(function (e) { 
            e.preventDefault();
            if($("#food").val() =="" && $("#price").val()=="")
            {
               alert(" fill all fileds");
            }
             else if($("#food").val() =="")
            {
               alert(" fill food name")
            }
             else if($("#price").val()=="")
             {
               alert(" fill food name")
             }
   else{
   $.ajax({
               type: "post",
               url: "foodinsert.php",
               data: $("#addfoodinsert").serialize(),
               // dataType: "json",
               success: function (response) {
                  console.log(" data");
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
                                
                            }
                            else if(key =="success")
                            {
                              swal({
                                       title:va,
                                       icon:"success"
                                     }).then(function(){
                                       window.location ="index.php";
                                     })
                            }
                
               }
            }
            });
}

          
            
         });
         //update food data

         function updatedfoodinsertion()
         {
 alert(foodid);

 $.ajax({
               type: "post",
               url: "saveupdatefood.php",
               data: $("#addfoodinsert").serialize(),
               // dataType: "json",
               success: function (response) {
                  console.log(" data");
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
                                
                            }
                            else if(key =="success")
                            {
                              swal({
                                       title:va,
                                       icon:"success"
                                     }).then(function(){
                                       window.location ="index.php";
                                     })
                            }
                
               }
            }
            });

 


         }
         // $("#updatefood").submit(function (e) { 
         //    e.preventDefault();
         //    $.ajax({
         //       type: "post",
         //       url: "saveupdatefood.php",
         //       data: $("#addfoodinsert").serialize(),
         //       // dataType: "json",
         //       success: function (response) {
         //          console.log(" data");
         //          var data = JSON.parse(response);
                
         //           for ( const [key,va] of  Object.entries(data))
         //                {
                      
         //                    if(key  =="error")
         //                    {
         //                        console.log((va));
         //                        swal({
         //                               title:va,
         //                               icon:"warning"
         //                             })
                                
         //                    }
         //                    else if(key =="success")
         //                    {
         //                      swal({
         //                               title:va,
         //                               icon:"success"
         //                             }).then(function(){
         //                               window.location ="index.php";
         //                             })
         //                    }
                
         //       }
         //    }
         //    });
            
         // });
         //  foood
         $("#menu").submit(function (e) { 
            e.preventDefault();
            if( $("#check").val() == "")
            {
               alert("  no value");
            }
            $.ajax({
               type: "post",
               url: "createmenu.php",
               data: $("#menu").serialize(),
               // dataType: "dataType",
               success: function (response) {
                  console.log(response);
                  swal({
                      title:response,
                     //  text:"login now",
                      icon:"success"
                   }).then(function(){
                           window.location ="index.php";
                         })
               }
            });
            
         });

         function deleted(value)
         {
               $("#delete").modal("show");


               $("#menudelete").submit(function (e) { 
                  e.preventDefault();
                  $.ajax({
                     type: "post",
                     url: "deleteMenu.php",
                     data: "data=" +value,
                     // dataType: "dataType",
                     success: function (response) {
                        swal({
                            title:response,
                            icon:"success"
                         }).then(function(){
                           window.location ="index.php";
                         })
                     }
                  });
               });
         }

 

          function getid(data)
          {
            //  alert(data);
            foodid = data;
           
            $.ajax({
               type: "post",
               url: "updatefood.php",
               data: "thedata=" +data ,
               // dataType: "json",
               success: function (response) {
                 
                  var data = JSON.parse(response);
                
                   for ( const [key,va] of  Object.entries(data))
                        {
                      
                            if(key  =="amount")
                            {
                                $("#updateFoodPrice").val(va) ;

                                 // $("#updateFoodPrice").val()= key;
                            }
                            else if(key =="foodname")
                            {
                              $("#updateFoodName").val(va);
                            }
                
               }
            }
            });
            $("#updatefood").modal("show");
          }


          function getdeleteid(value)
          {
            $("#fooddelete").modal("show");

            $("#fooddelete").submit(function (e) { 
                  e.preventDefault();
                  $.ajax({
                     type: "post",
                     url: "deleteFood.php",
                     data: "data=" +value,
                     // dataType: "dataType",
                     success: function (response) {
                        swal({
                            title:response,
                            icon:"success"
                         }).then(function(){
                           window.location ="index.php";
                         })
                     }
                  });
               });
          }
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