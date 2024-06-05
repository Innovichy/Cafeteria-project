
<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="utf-8" >
   <meta name="viewport"   content="width=device-width, initial-scale=1">
   <!--  http-equiv='refresh' content=3 -->
   <title>samart-card-billing-System</title>
   <!-- Font Awesome -->
   <link rel="stylesheet" href="asset/fontawesome/css/all.min.css">
   <link rel="stylesheet" href="asset/css/adminlte.min.css">
   <link rel="stylesheet" href="asset/tables/datatables-bs4/css/dataTables.bootstrap4.min.css">
   <link rel ="stylesheet"  type="text/css" href="https://cdn.datatables.net/buttons/2.2.3/css/buttons.dataTables.min.css">
    <link rel ="stylesheet" type ="text/css" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">

</head>

<body class="">
   <div class="wrapper">
     
      <?php
   include_once('include/connection.php');
   
    ?>
   
      
         <div class="">
            <!-- Content Header (Page header) -->
            
            <section class="content">
               <div class="container">
                 
                  
                     <div class="row  mt-5" >
                    
                     <div class="col-md-6 m-auto">

                     <table class="table table-bordered ">
      <thead>
         <tr>
            <th>number</th>
            <th>comment</th>
      
         </tr>
      </thead>
      <tbody>
                     

                     <?php

      $counter =0;
      $comment ="";
   $notserved = "SELECT food.foodId ,foodreport.id, foodname,amount,cardnumber,balance.balance,foodreport.createdAt,ticket FROM food RIGHT JOIN foodreport on food.foodId = foodreport.foodReportId join balance on balance.Ccardnumber = foodreport.cardnumber where ticket_status=0";

 if($data = mysqli_query($con,$notserved))
 { 
            if(mysqli_num_rows($data) > 0)
            {
                    while( $row=mysqli_fetch_assoc($data))
                    {

                         $ticket =$row['ticket'];
                         $createdAt =$row['createdAt'];
                         $foodname =$row['foodname'];
                         $id =$row['id'];
                         $foodId =$row['foodId'];
                         $amount =$row['amount'];
                         $balance =$row['balance'];
                          $cardnumber =$row['cardnumber'];

                    $balanceQuery= " select  Ccardnumber,balance from balance where Ccardnumber= '" . $cardnumber."'";
                  if( $userbalance = mysqli_query($con, $balanceQuery))
            {
                $rowBalance =mysqli_fetch_assoc($userbalance);

                 $mybalance =$rowBalance['balance'];

                        if( mysqli_query($con,' UPDATE `balance` SET `balance`= '.$amount.'+  '.$mybalance.'  WHERE  `Ccardnumber` ="'.$cardnumber.'" '))
                        {

                            $comment ="balance returned and order deleted";

                             $insert ="INSERT INTO `unservedorder`(`id`, `food`, `cardnumber`, `ticket`, `comment`, `orderCreatedAt`) VALUES ($id,'$foodname','$cardnumber','$ticket','$comment','$createdAt')";

                                if(mysqli_query($con,$insert))
                                {
                                if(mysqli_query($con,"delete from foodreport where ticket ='".$ticket ."' and cardnumber ='".$cardnumber ."' "))
                                    {
                                         $comment;  
                                        $counter++;
                                         echo $ticket;
        
                                    }
                                    else{
        
                                        echo  "something is wrong" . mysqli_error($con);
                                    }
                                }else{
                                    echo mysqli_error($con);
                                }




                            

                        }
                        else{
                           
                            echo  "something is wrong";
                        }
                    }
                    }
                    ?>
 
         <tr>
         
            <td><?=$counter;?></td>
            <td><?=$comment;?></td>
          
         </tr>
         
         
         <?php
                
               }
               else{
                  ?>

         <tr>
            <td>0</td>
            <td> no data</td>
         </tr>

<?php

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
    
      <!-- jQuery -->
      <script src="asset/jquery/jquery.min.js"></script>
      <script src="asset/js/bootstrap.bundle.min.js"></script>
      <script src="asset/js/adminlte.js"></script>
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

  
 
  </script>
   </body>

   
    
</html>
