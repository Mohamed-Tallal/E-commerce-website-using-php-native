<?php
$connect = mysqli_connect("localhost","root","","ecofinal");
$pro_name = @$_POST['pro_name'];
$pro_price = @$_POST['pro_price'];
$pro_img = @$_FILES['pro_img']['name'];
$pro_img_tmp = @$_FILES['pro_img']['tmp_name'];
$pro_des = @$_POST['pro_des'];
$pro_key = @$_POST['pro_key'];
$pro_cat =@$_POST['pro_cat'];
move_uploaded_file($pro_img_tmp,"images/$pro_img");

if (isset($_POST['addpro'])){
    if(empty($pro_name) ||empty($pro_cat) ||empty($pro_img) ||empty($pro_des) ||empty($pro_key)||empty($pro_price) ){
        echo '<script> alert(" Enter inforomation about your product ") </script>';
    }
    else{
        $get_pro = "INSERT INTO product  (pro_name , pro_price ,pro_img,pro_des,pro_key,pro_cat) VALUES ('$pro_name' ,'$pro_price' ,'$pro_img','$pro_des','$pro_key','$pro_cat')";
        $run_pro = mysqli_query($connect , $get_pro);
        if(isset($run_pro)){
            header('location:add_prodcut.php');
        }
    }
}
?>
<?php include '../files/header_c.php';?>


    <form action="add_prodcut.php" method="post" enctype="multipart/form-data">
    <div class="login-box" style=" 
  margin-left: 30% ;
  
  ">
  <h1>Add Product</h1>
  <form action="add_prodcut.php" method="POST">
  <div class="textbox">
   
    <input type="text" name="pro_name" placeholder="Add Product Name" style="width: 50%;
    padding: 7px;
    display: block;
    margin: 10px 0px ;">
  </div>
  <div class="textbox">
    
  
    <input type="text" name="pro_price" placeholder="Add your Categorie" style="width: 50%;
    padding: 7px;
    display: block;
    margin: 10px 0px ;">
  </div>
  <div class="textbox">
    
    <input type="file" name="pro_img" placeholder="Add img of product" style="width: 50%;
    padding: 7px;
    display: block;
    margin: 10px 0px ;">
  </div>
  <div class="textbox">

    <input type="text" name="pro_des" placeholder="Add your des  " style="width: 50%;
    padding: 7px;
    display: block;
    margin: 10px 0px ;">
  </div>
  <div class="textbox">
    

    <input type="text" name="pro_key" placeholder="Add your Categorie"style="width: 50%;
    padding: 7px;
    display: block;
    margin: 10px 0px ;">
  </div>
  <div class="textbox" >
  <select name="pro_cat" name="pro_cat">
      <?php
      $get_pro_cat ="SELECT * FROM category ";
      $run_pro_cat = mysqli_query($connect,$get_pro_cat);
      while($row=mysqli_fetch_array($run_pro_cat))
      {
        echo  '<option value="'.$row['cat_id'].'">'.$row['cat_name'].'</option> ';
      }
      ?>
      </select>
  </div>
  <input type="submit" name="addpro"  value="Add" style="
 margin: 10px 0px;
    width: 150px;
    height: 30px;
    padding: 5px 15px;
    background: #51a9bc;
    border-color: #217aad;
    cursor: pointer;
    color: aliceblue;">
  </form>
</div>  
  </form>
  
<?php  include '../files/footer_c.php';?>
