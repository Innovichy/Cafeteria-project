
<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <title>samart-card-billing-System</title>
   <!-- Font Awesome -->
   <link rel="stylesheet" href="../../asset/fontawesome/css/all.min.css">
   <link rel="stylesheet" href="../../asset/css/adminlte.min.css">
   <link rel="stylesheet" href="../../asset/tables/datatables-bs4/css/dataTables.bootstrap4.min.css">
   <link rel ="stylesheet"  type="text/css" href="https://cdn.datatables.net/buttons/2.2.3/css/buttons.dataTables.min.css">
    <link rel ="stylesheet" type ="text/css" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">
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
   
    $male = $female = $femaleTotal = $maleTotal =0 ;
    $femaleAmount = $maleAmount =0;
    
 
         $foodname ="";
    if(isset($_SESSION['NormalOwneremail']))
    {
     

    ?>
   
      
         <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header">
               <div class="container-fluid">

    
               </div>
            </div>
            <section class="content">
               <div class="container-fluid">
                 
                     <br>
                     <div class="row">
                    
                     <div class="col-md-10 mt-4 m-auto">
                        
               </div>
               </div>
                   
                
                    <div class="row">
                         <div class ="col-md-12 mb-3"> 
                            <div class="col-md-6 m-auto  text-center ">
                              
                                <?php

                                
                                if(isset($_GET['name']))
                                {
                                    echo $_GET['name'] . "  information";
                                    
                                }else{
                                    // echo "poo";
                                }
                                ?>
                               
                            </div>
                            <hr>
                         </div>
                    <table class="table col-md-6 m-auto border-right border-primary stripped" id="customerinfo">
                        <thead>
                            <tr>
                                       <th>female</th>
                                       <th> male</th>
                                       <th> total</th>
                                       
                            </tr>
                        </thead>
                        <tbody>
                              <?php
                           
                             
                              if( isset($_GET['food']))
                              {
                                $food= $_GET['food'];
                               $gender = "select gender  from customer";
                               if($datagender = mysqli_query($con,$gender))
                              {
                                if(mysqli_num_rows($datagender) > 0)
                                { 
                                 while( $rowgender=mysqli_fetch_assoc($datagender))
                                 { 
                                    if($rowgender['gender'] == 'female')
                                    {
                                       $femaleTotal ++;
                                    }else{
                                       $maleTotal ++;
                                    }

                                }
                              }
                           }
                           $sql ='SELECT   foodname, amount,gender FROM food RIGHT JOIN foodreport on food.foodId = foodreport.foodReportId LEFT JOIN customer on customer.cardNumber = foodreport.cardnumber WHERE food.foodId ="'.$food.'"  and  ticket_status=1 ';
                             
                              if($data = mysqli_query($con,$sql))
                              {
                                if(mysqli_num_rows($data) > 0)
                                {
                                    while( $row=mysqli_fetch_assoc($data))
                                    { 
                                        $foodname= $row['foodname'] ;

                                        if($id = $row['gender'] =='female'){
                                            $female ++ ;
                                            $femaleAmount += $row['amount'] ;
                                        }
                                        else{
                                            $male ++ ;
                                            $maleAmount += $row['amount'] ;
                                        }
                                      

                                    }
                                    echo "<tr>";
                                    echo "<td>" .$female.'/'.$femaleTotal. "</td>";
                                    echo "<td> " .$male.'/'.$maleTotal. "</a></td>";
                                     echo "<td> " .$female + $male.'/'.$femaleTotal + $maleTotal. "</a></td>";
                                    // echo "<td>  4/4 </td>";
                                
                                 echo "</tr>";
                                    
                                }
                              }
                                
                              ?>
                                </tbody>
                    </table>
                              <div class ="col-md-6">
                              <canvas id ="useinfo"></canvas>
                              </div>
                              <?php
                            }
                                ?>
                               
                          
                         
                               
                      
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
         <div class="modal-dialog modal-dialog-centered ">
            <div class="modal-content">
               <div class="modal-body text-center">
                  <form  id ="employeeM" method ="post" action ="<?=$_SERVER['PHP_SELF'];?>">
                     <div class="card-body">
                        <div class="row">
                           <div class="col-md-12">

                              <div class="card-header">
                                 <span class="fa fa-user"> Generate balance Report</span>
                              </div>

                              <div class="row">

                            
                              <div class="col-lg-6  col-md-6 m-auto col-sm-12 ">
            <div class="form-group  ">
            <label for="" class="d-block"> Select Year And Month</label>
            <input type="month" name="yearMonth" id="" min="2023-01"  max="2024-01"  width="100%">
            </div>
            </div>
                              </div>
            
                            
                           </div>
                        </div>
                     </div>
                     <!-- /.card-body -->
                     <div class="card-footer">
                        <a href="#" class="btn btn-danger" data-dismiss="modal">Close</a>
                        <input type="submit"  name ="YearMonthsubmit" class="btn btn-primary" value ="save">
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
      <script src="https://code.jquery.com/jquery-3.7.0.js" integrity="sha256-JlqSTELeR4TLqP0OG9dxM7yDPqX1ox/HfgiSLBj8+kM=" crossorigin="anonymous"></script>
<script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.2.3/js/dataTables.buttons.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.2.3/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.2.3/js/buttons.print.min.js"></script>
     
     
      
  <script src="../../asset/js/chart.js"></script>
  <script>
       var customerinfo =$("#customerinfo");
       console.log(customerinfo.html());
       var customerPayment =$("#customerPayment");
    $(function () {
           $("#example1").DataTable(
            {
            dom: 'Bfrtip',
            buttons: [
                'csv', 'excel', "print",
                {
    extend: 'pdf',
    text: 'pdf',
    title: function () { return "name",   customerinfo.html(); },
  }
            ]
        }
           );
         });

    document.addEventListener("DOMContentLoaded", function() {
      // Pie chart
    //    var gender = [<?=json_encode($female);?>,<?=json_encode($male);?>];
       var gender = ["female","male"];
       var amount = [<?=json_encode($femaleAmount );?>,<?=json_encode($maleAmount );?>];
      
      
      
      new Chart(document.getElementById("useinfo"), {
        type: "pie",
        data: {
          labels: gender,
          datasets: [{
            data: amount,
            backgroundColor: [
                window.theme.primary,window.theme.warning,"seagreen",
             
                
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

   
    window.addEventListener("beforeunload",function(event)
    {

       alert(" page is reloading");
       
   });
  function selection(value)
  {
if(value)
{
    alert(value);
}
  }
  </script>
   </body>
   <?php
   // unset($_SESSION['startdate']);
      }
      else
      {
         header("location:../../index.php");

      }
      ?>
</html>
