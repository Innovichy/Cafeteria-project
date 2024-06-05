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



</style>
<body>
<?php

if(isset($_POST['submit']))
{

  echo "submit";
  echo '$(document).ready(function () {
    swal({
                     title:response,
                     text:"login now",
                     icon:"success"
                  })

  })';
}
  ?>
    <div class="logmod">
        <div class="logmod__wrapper">
          <div class="logmod__container">
           
            <div class="logmod__tab-wrapper">
            <div class="logmod__tab lgm-1">
              <div class="logmod__heading">
                <span class="logmod__heading-subtitle">Enter your personal details <strong>to create an acount</strong></span>
              </div>
              
              <div class="logmod__form">
                <form  id ="formreg" class="   w-75 m-auto ">
                  
                     <div class="row">
                        <div class="form-group col-md-6 ">
                        <label for="fname">FirstName</label>
                        <input type="text"
                          class="form-control" name="fname" id="fname" aria-describedby="helpId" placeholder="">
                      </div>
                      <div class="form-group  col-md-6">
                        <label for="lname">LastName</label>
                        <input type="text" 
                          class="form-control" name="lname" id="lname" aria-describedby="helpId" placeholder="">
                      </div>
                    </div>
                    <div class="form-group">
                      <label for=""></label>
                      <select  id ="gender" class="form-control" name="gender" >
                        <option> choose gender</option>
                        <option value="male">Male</option>
                        <option value="female">Female</option>
                      </select>
                    </div>
                 
                        <div class="form-group  ">
                            <label for="email">email</label>
                            <input type="text"
                              class="form-control" name="email" id="email" aria-describedby="helpId" placeholder="">
                          </div>
                          <div class="form-group">
                            <label for="phone">PhoneNumber</label>
                            <input type="text"
                              class="form-control" name="phone" id="phone" aria-describedby="helpId" placeholder="">
                          </div>
                     
                     <div class="form-group">
                       <label for="pass">password</label>
                       <input type="password" class="form-control" name="pass" id="pass" placeholder="">
                     </div>
                  
                 
                  <div class="justify-content-between">
                    
                      <p class="simform__actions-sidetext">By creating an account you agree to our <a class="special" href="#" target="_blank" role="link">Terms & Privacy</a></p>
                    <input type="submit"  name ="submit" class="btn btn-primary float-right" value ="Create Account">
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
<script src="js/sweetAlert.js"></script>
<script>


$(document).ready(function () {


     $("#formreg").submit(function(e)
     {

e.preventDefault();
 
        if(($("#fname").val()!="") && ($("#gender").val()!="" ) && ($("#lname").val()!="" ) && ($("#lname").val()!="" ) && ($("#email").val()!="" ) && ($("#email").val()!="" ))
        {
          $.ajax({
         type: "post",
         url: "register.php",
         data: $("#formreg").serialize(),
         success: function (response) {
          //  if(response =="successfull regiseter")
          //  {
            swal({
                      title:response,
                      text:"login now",
                      icon:"success"
                   }).then(function() {window.location ="login.php";});
        //  }

           }
          
       });
        }
        else{
    alert("fill all filled");
        }

    
      
     })
    
});


</script>
</html>