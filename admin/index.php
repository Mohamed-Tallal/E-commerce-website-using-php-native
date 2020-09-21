<?php
include '../sql.php';
$eco_user = @$_POST['eco_user'];
$eco_pass = @$_POST['eco_pass'];

if(isset($_POST['login'])){
  if(empty($eco_user)){
      echo '<script> alert(" Enter Your Name ") </script>';
  }
  elseif(empty($eco_pass)){
    echo '<script> alert(" Enter Your Password ") </script>';
  }
  else{
      $get_ad = " SELECT * FROM admin_ecofinal WHERE eco_user = '$eco_user'  
      AND eco_pass ='$eco_pass'";
      $run_ad = mysqli_query($connect,$get_ad);
      if(mysqli_num_rows($run_ad)== 1){
        $row_ad = mysqli_fetch_array($run_ad);
        $ec_o_user = $row_ad['eco_user'];
        setcookie('ec_o_user',$ec_o_user ,time()+60*60*24);
        setcookie('loginad',1 ,time()+60*60*24);
        header("location:index.php");
      }
  }
}



?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>LOG IN</title>
    <style>
    

    </style>
  </head>
  <body>
<div class="login-box" style="margin: 150px 0px 0px 35% ;">
  <h1>Login</h1>
  <form action="index.php" method="POST">
  <div class="textbox">
    
    <input type="text" name="eco_user" placeholder="Username" style="width: 50%;
    padding: 7px;
    display: block;
    margin: 10px 0px ;">
  </div>

  <div class="textbox">
    <input type="password" name="eco_pass" placeholder="Password" style="width: 50%;
    padding: 7px;
    display: block;
    margin: 10px 0px ;">
  </div>

  <input type="submit" name="login" style="
   margin: 10px 0px;
    width: 150px;
    height: 30px;
    padding: 5px 15px;
    background: #51a9bc;
    border-color: #217aad;
    cursor: pointer;
    color: aliceblue;" value="Sign in">
  </form>
</div>
  </body>
</html>
