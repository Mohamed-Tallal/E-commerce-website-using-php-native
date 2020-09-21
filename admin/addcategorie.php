<?php
include '../sql.php';
$cat_name =@$_POST['cat_name'];
if (isset($_POST['add'])){
    if(empty($cat_name)){
        echo '<script> alert(" Enter Your Categorie ") </script>';
    }
    else{
        $get_cat = "INSERT INTO category  (cat_name) VALUES ('$cat_name')";
        $run_cat = mysqli_query($connect , $get_cat);
        if(isset($run_cat)){
            header('location:addcategorie.php');
        }else{
            header('location:ok.php');

        }
    }
}
?>
<?php include '../files/header_c.php';?>


    <form action="addcategorie.php" method="post">
    <div class="login-box" style=" 
  width: 280px;
  position: absolute;
  top: 50%;
  left: 50%;
  transform: translate(-50%,-50%);
  color: white;
  
  ">
  <h1 style=" 
  float: left;
  font-size: 40px;
  border-bottom: 6px solid #4caf50;
  margin-bottom: 50px;
  padding: 13px 0;
  color: #000;
  ">Add Product</h1>
  <form action="index.php" method="POST">
  <div class="textbox" style="  width: 100%;
  overflow: hidden;
  font-size: 20px;
  padding: 8px 0;
  margin: 8px 0;
  border-bottom: 1px solid #4caf50;">
    
    <i class="fas fa-cart-plus" style="
  width: 26px;
  color: #000;
  float: left;
  text-align: center;"></i>
    <input type="text" name="cat_name" placeholder="Add your Categorie" style="
  border: none;
  outline: none;
  background: none;
  color: #000;
  font-size: 18px;
  width: 80%;
  float: left;
  margin: 0 10px;">
  </div>

  <input type="submit" name="add"  value="Add" style="
  width: 100%;
  background: none;
  border: 2px solid #4caf50;
  color: #000;
  padding: 5px;
  font-size: 18px;
  cursor: pointer;
  margin: 12px 0;">
  </form>
</div>  
  </form>
  
<?php  include '../files/footer_c.php';?>
