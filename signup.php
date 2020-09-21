<?php include 'files/header.php';?>
<?php 
$ip = getIp();
$cust_name = @$_POST['cust_name'];
$cust_pass = @$_POST['cust_pass'];
$cust_email = @$_POST['cust_email'];
$cust_country = @$_POST['cust_country'];
if(isset($_POST['sign_up'])){
  if(empty($cust_name) || empty($cust_pass)||empty($cust_email)||empty($cust_country)){
    echo '<script> alert(" Enter Your Information about you  ") </script>';
  }
  else{
    $get_cust = "INSERT INTO customer (cust_name , cust_pass , cust_email , cust_country ,cust_ip)
    VALUES ( '$cust_name' , '$cust_pass' , '$cust_email' , '$cust_country','$ip')
    ";
    $run_cust=mysqli_query($connect , $get_cust);
    if(isset($run_cust)){
      echo '<script> alert(" welcom to your page  ") </script>';
    }
    
  }
}



?>

<div class="login-box" style="margin-left: 30%">
  <h1>Sign Up</h1>
  <form action="signup.php" method="POST">
  <div class="textbox">
    <input type="text" name="cust_name" placeholder="Username" 
    style="width: 50%;
    padding: 7px;
    display: block;
    margin: 10px 0px ;">
  </div>

  <div class="textbox">
 
    <input type="password" name="cust_pass" placeholder="Password" 
    style="width: 50%;
    padding: 7px;
    display: block;
    margin: 10px 0px ;">
  </div>
  <div class="textbox">

    <input type="email" name="cust_email" placeholder="Email" 
    style="width: 50%;
    padding: 7px;
    display: block;
    margin: 10px 0px;">
  </div>

  <div class="textbox">

    <input type="text" name="cust_country" placeholder="Country" 
    style="width: 50%;
    padding: 7px;
    display: block;
    margin: 10px 0px ;">
  </div>

  <input type="submit" name="sign_up" class="btn" value="Sign Up" 
  style=" margin: 10px 0px;
    width: 150px;
    height: 30px;
    padding: 5px 15px;
    background: #51a9bc;
    border-color: #217aad;
    cursor: pointer;
    color: aliceblue;">
  </form>
</div>

<?php include 'files/footer.php';?>