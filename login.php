<?php include 'files/header.php';?>
<?php 
$cust_name = @$_POST['cust_name'];
$cust_pass = @$_POST['cust_pass'];

if(isset($_POST['login'])){
  if(empty($cust_name) || empty($cust_pass)){
    echo '<script> alert(" Enter Your Information   ") </script>';
  }
  else{
    $log_cust = "SELECT * FROM  customer WHERE 
    cust_name = '$cust_name' AND cust_pass ='$cust_pass' 
    ";
    $run_log_cust=mysqli_query($connect , $log_cust);
    if(mysqli_num_rows($run_log_cust) > 0){
      $row_cust = mysqli_fetch_array($run_log_cust);
      $row_name = $row_cust['cust_name'];
      $row_pass = $row_cust['cust_pass'];
      if($cust_name != $row_name && $cust_pass != $row_pass['cust_pass']){
        echo '<script> alert(" Enter The Correct Information ") </script>';
      }
      else{
        setcookie('cust_name' , $cust_name ,time()+60*60*24);
        setcookie('login_cust' ,1 ,time()+60*60*24);
        echo '<script> alert(" welcom to your page  ") </script>';
        echo '<meta http-equiv="refresh" content="0.1  url=chekout.php">';
      }
      
    }
    else {
      echo '<script> alert(" Enter The Correct Information ") </script>';
    }
    
  }
}
?>
<div class="login-box" style="margin-left: 30% ;">
  <h1>Login</h1>
  <form action="login.php" method="POST">
  <div class="textbox" style="margin:15px 0px">
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
    margin: 10px 0px; ">
  </div>
 
  <input type="submit" name="login" value="Log in" 
  style=" margin: 10px 0px;
    width: 150px;
    height: 30px;
    padding: 5px 15px;
    background: #51a9bc;
    border-color: #217aad;
    cursor: pointer;
    color: aliceblue; ">
    <p
  style=" margin: 10px 0px;
    padding: 5px 15px;
    border-color: #217aad;
    color :cadetblue">
   Do you Not have account ? <a href="signup.php"> Sign UP</a>
    </p>
  </form>
</div>

<?php include 'files/footer.php';?>