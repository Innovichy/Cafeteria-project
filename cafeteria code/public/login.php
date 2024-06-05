<?php 
session_start();?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/bootstrap.css">
</head>
<style>
  
  /* body{
    background-image:url("images/d1.jpg");
    background-repeat:no-repeat;
  } */
 html {
  box-sizing: border-box;
}

*,
*:before,
*:after {
  box-sizing: inherit;
}
.logmod {
  display: block;
  position: fixed;
  top: 0;
  right: 0;
  bottom: 0;
  left: 0;
  opacity: 1;
  background: rgba(0, 0, 0, 0.2);
  z-index: 1;
}
.logmod__wrapper {
  display: block;
  background: #fff;
  position: relative;
  max-width: 550px;
  border-radius: 4px;
  box-shadow: 0 0 18px rgba(0, 0, 0, 0.2);
  margin: 60px  auto;
}
.logmod__close {
  display: block;
  position: absolute;
  right: 50%;
  text-indent: 100%;
  white-space: nowrap;
  overflow: hidden;
  cursor: pointer;
  top: -72px;
  margin-right: -24px;
  width: 48px;
  height: 48px;
}
.logmod__container {
  overflow: hidden;
  width: 100%;
}

.logmod__tab-wrapper {
  width: 100%;
  height: auto;
  overflow: hidden;
}
.logmod__tab.show {
  opacity: 1;
  height: 100%;
  visibility: visible;
}
.logmod__tabs {
  list-style: none;
  padding: 0;
  margin: 0;
  color: #333;
  height: 72px;
  text-transform: uppercase;
  width: 100%;
  text-align: center;
background-color: #d2d8d8;

}
.logmod__tabs::after {
  clear: both;
  content: "";
  display: table;
}.logmod__tabs li.current a {
  background: #fff;
  color: #333;
}
.logmod__tabs li a {
  width: 50%;
  position: relative;
  float: left;
  
  background: #d2d8d8;
  line-height: 72px;
  height: 72px;
  text-decoration: none;
  color: #809191;
  text-transform: uppercase;
  font-weight: 700;
  font-size: 16px;
  cursor: pointer;
}

.logmod__heading {
  text-align: center;
  padding: 12px 0 12px 0;
}
.logmod__heading-subtitle {
  display: block;
  font-weight: 400;
  font-size: 15px;
  color: #888;
  line-height: 48px;
}
.logmod__form {
  border-top: 1px solid #e5e5e5;
}
.logmod__alter {
  display: block;
  position: relative;
  margin-top: 7px;
}
.logmod__alter::after {
  clear: both;
  content: "";
  display: table;
}
.logmod__alter .connect:last-child {
  border-radius: 0 0 4px 4px;
}

.connect {
  overflow: hidden;
  position: relative;
  display: block;
  width: 100%;
  height: 72px;
  line-height: 72px;
  text-decoration: none;
}
.connect::after {
  clear: both;
  content: "";
  display: table;
}
.connect:focus, .connect:hover, .connect:visited {
  color: #fff;
  text-decoration: none;
}
.connect__icon {
  vertical-align: middle;
  float: left;
  width: 70px;
  text-align: center;
  font-size: 22px;
}
.connect__context {
  vertical-align: middle;
  text-align: center;
}
.connect.facebook {
  background: #3b5998;
  color: #fff;
}
.connect.facebook a {
  color: #fff;
}
.connect.facebook .connect__icon {
  background: #283d68;
}
.connect.googleplus {
  background: #dd4b39;
  color: #fff;
}
.connect.googleplus a {
  color: #fff;
}
.connect.googleplus .connect__icon {
  background: #b52f1f;
}

.logmod__tab{
  
 
}
.error{
  color:red,
  
}

</style>
<body>
  <?php 
  $error = Array();
  $result =0;
  $resultOwnwer1=0;
  $resultOwnwer2=0;
  $resultbilling=0;
  include_once('../include/connection.php');
   if(isset($_POST['signin']))
{


    if( empty($_POST['username'])&& !empty($_POST['password'])){
 
        $error['fill_username'] =" username required";
        $error['fill_password'] =   $error['fill_all'] ="";
      
    }
     elseif(empty($_POST['password']) && !empty($_POST['username'])){
     
        $error['fill_password'] =" password required ";
        $error['fill_username'] = $error['fill_all'] ="";
        $_SESSION['user'] = $_POST['username']; 
        
    }
    
   else if(!empty($_POST['username'] ) && !empty($_POST['password'] ))
   {
 
    
    $user  =$_SESSION['user'] =validation($_POST['username']);
            $pass =validation($_POST['password']);
            
      //  echo $sql1 = "select * from customer where phoneNumber ='$user' and password = '$pass' ";
      //  echo $sql1 = "select * from customer where email ='$user' and password = '$pass' ";
        $sql1 = "select * from customer where email='$user' and password ='$pass' ";
        $sqlbillingowner = "select * from billingowner where email ='$user' and password ='$pass' ";
        $sqlOwnwer1 = "select * from cafereriaowner where email ='$user' and password ='$pass' ";
        $sqlOwnwer2 = "select * from cafereriaowner where Phonenumber ='$user' and password ='$pass' ";
        $result = mysqli_query($con,$sql1);
        $resultOwnwer1 = mysqli_query($con,$sqlOwnwer1);
        $resultOwnwer2 = mysqli_query($con,$sqlOwnwer2);
        $resultbilling = mysqli_query($con,$sqlbillingowner);
     
       
        if($resultOwnwer1)
          { 
            if( mysqli_num_rows($resultOwnwer1)>0 ){
             $row = mysqli_fetch_assoc($resultOwnwer1);
             unset($_SESSION['user']);
         
  
            if($row['usertype']==0)
            {
              header("location:../college/admin");
              
            } 
            else
            {
              $_SESSION['id']= $row['id'];
              $_SESSION['NormalOwnerFname']= $row['FirstName'];
              $_SESSION['NormalOwnerSecond']= $row['SecondName'];
              $_SESSION['NormalOwnerLname']= $row['Lastname'];
              $_SESSION['NormalOwnerEmail']= $row['email'];
              $_SESSION['NormalOwnerPhone']= $row['Phonenumber'];
              $_SESSION['NormalOwneremail']= $row['email'];
              $_SESSION['NormalOwneraddress']= $row['address'];
              $_SESSION['NormalOwnercollege']= $row['college'];
              $_SESSION['NormalOwnercafeteria']= $row['cafeteria'];
              
              header("location:../college/CafeteriaAdmin/");
              
            } 
          }
          else{
            $error['failed_Ownwer'] ="  invalid username or password";
          }
          }
          else  if($resultOwnwer2)
          {
          if( mysqli_num_rows($resultOwnwer2)>0 ){
            //  unset($_SESSION['user']);
            echo " admin page";
            $row = mysqli_fetch_assoc($resultOwnwer2);
            $_SESSION['OwnerFname']= $row['FirstName'];
            $_SESSION['OwnerSecond']= $row['SecondName'];
            $_SESSION['OwnerLname']= $row['LastName'];
            $_SESSION['OwnerEmail']= $row['email'];
            $_SESSION['OwnerPhone']= $row['Phonenumber'];
            $_SESSION['Owneremail']= $row['email'];
            $_SESSION['Owneraddress']= $row['address'];
            $_SESSION['Ownercollege']= $row['college'];
            $_SESSION['Ownercafeteria']= $row['cafeteria'];
  
            if($row['usertype']==0)
            {
              header("location:../college/admin");
              
            } 
            else
            {
              header("location:../college/CafeteriaAdmin/");
              
            } 
          }
          else{
            $error['failed_Ownwer'] ="  invalid username or password";
          }
          }
          elseif($resultbilling)
          {
          if( mysqli_num_rows($resultbilling)>0 ){
            
            $row = mysqli_fetch_assoc($resultbilling );
            $_POST['username'] ="";
            $_SESSION['OwnerFname']= $row['FirstName'];
            $_SESSION['OwnerSecond']= $row['SecondName'];
            $_SESSION['OwnerLname']= $row['LastName'];
            $_SESSION['OwnerEmail']= $row['email'];
            $_SESSION['OwnerPhone']= $row['Phonenumber'];
            $_SESSION['Owneremail']= $row['email'];
            $_SESSION['Owneraddress']= $row['address'];
            $_SESSION['Ownercollege']= $row['college'];
            $_SESSION['Ownercafeteria']= $row['cafeteria'];
  
            if($row['usertype']==0)
            {
              header("location:../admin/");
              
            } 
             
          }
          else{
            $error['failed_Ownwer'] ="  invalid username or password";
          }

          }


}
else {
     
  $error['fill_all'] ="fill all the field";
  $error['fill_password'] ="";
  $error['fill_password'] ="";
 
}


}
function validation($input)
{
 $input = trim($input);
 $input = stripslashes($input);
 $input = htmlspecialchars($input);
 return ($input);


}
?>

    <div class="logmod">
        <div class="logmod__wrapper">
          <div class="logmod__container">
           
            <div class="logmod__tab-wrapper">
            <div class="logmod__tab lgm-1">
              <div class="logmod__tab">
                <div class="logmod__heading">
                  <span class="logmod__heading-subtitle">Enter your email and password <strong>to sign in</strong></span>
                </div> 
                <div class="text-center   text-danger ">
                <?php
                if(isset($error['fill_all']))
                        {
                          echo '<span class="bg-warning d-block w-50 m-auto">'.$error['fill_all'].'</span>';
                        }
                        ?>
                </div>
                <div class="logmod__form ">
                  <form accept-charset="utf-8" action="login.php "  method ="post" id="" class=" w-75 m-auto ">
                  <div class="form-group m-auto" >
                    <label for=""  class="logmod__heading-subtitle">username</label>
                    <?php
                    if(isset($_SESSION['user'] ))
                    {
                       ?>
    <input type="text" class="form-control" name="username" id="" aria-describedby="helpId" value ="<?=$_SESSION['user'];?>">
                      <?php
                    }
                    else{
                      echo '<input type="text" class="form-control" name="username" id="" aria-describedby="helpId" placeholder="">
                      ';
                    }
                    ?>
                  </div>
                  <div class="text-center text-center text-danger">
                  
                  <?php
                  if(isset($error['fill_username']))
                  {
                    echo $error['fill_username'];

                  }
                  ?>
                  </div>
                  <div class="form-group">
                    <label for="" class="logmod__heading-subtitle">password</label>
                    <input type="password"
                      class="form-control" name="password" id="" aria-describedby="helpId" placeholder="">
                    
                  </div>
                  <div class="text-center text-center text-danger">
                  
                  <?php
                  if(isset($error['fill_password']))
                  {
                    echo $error['fill_password'];

                  }
                  ?>
                  </div>
                  <div class ="text-center text-danger">
                        <?php
                        if( $resultOwnwer1 || $resultOwnwer2 || $resultbilling)
                        {
                        if(isset($error['failed_Ownwer']))
                        {
                          echo $error['failed_Ownwer'];
                        }
                      }
                        ?>
                    
                    </div>
                    <div class="simform__actions mb-1">
                      <input type="submit"   name ='signin'value ="sign in"  class="btn btn-primary">
                      <span class="simform__actions-sidetext"><a class="special" role="link" href="#">Forgot your password?<br>Click here</a></span>
                    </div> 
                   
                  </form>
                </div> 
              
             
            </div>
            
            </div>
          </div>
        </div>
      </div>
</body>
<script src="js/jquery-3.4.1.min.js"></script>
<script>


$(document).ready(function () {

    
});


</script>

</html>