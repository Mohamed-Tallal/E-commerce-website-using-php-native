<?php  include 'files/header.php'?>
<?php session_start() ;?>
<style>
#abtn{
  color: #000;
}
#abtn:hover{
  text-decoration:none;
}
@media (max-width: 767px){
#tablephone{
  width: 500px;
   overflow: scroll;
}
#htabel{
  padding:15px;
  width:300px
}

}


</style>
<form action="cart.php" method="post">

<div class="container">
<div id="tablephone">
<table class="table">
  <thead>
    <tr>
      <th id="htabel" scope="col">Remove Product</th>
      <th id="htabel" scope="col">Product Name</th>
      <th id="htabel" scope="col">Product Image</th>
      <th id="htabel" scope="col">Quantity</th>
      <th id="htabel" scope="col">Price</th>
    </tr>
  </thead>
  <tbody>
<?php
global $connect;
$total = 0; 
$valueof =0;   
    $ip = getIp();
    $get_tprice = "SELECT * FROM cart WHERE  cart_ip = '$ip'" ;
    $run_tprice = mysqli_query($connect,$get_tprice);
    while($row_price = mysqli_fetch_array($run_tprice)){
        
        $id_cart = $row_price['cart_id'];
        $get_tpro = "SELECT * FROM product WHERE  pro_id = '$id_cart'" ;
        $run_tpro = mysqli_query($connect,$get_tpro);
        
        while($get_pro_product = mysqli_fetch_array($run_tpro)){
            $price_array = array($get_pro_product['pro_price']);
            $value = array_sum($price_array);
?>  
<tr>
<th scope="row" style="padding-top:50px">
    <div >
        <input type="checkbox" name="remove[]" value="<?php echo $get_pro_product['pro_id']?>">
    </div>
    </th>
    <td style="padding-top:50px">
        <div>
        <?php echo $get_pro_product['pro_name']?>
        </div> 
 
    </td>
    <td>
         <img src="admin/images/<?php echo $get_pro_product['pro_img']?> " width='150px'>
 
    </td>
    <?php 
    $total = $value;
    if(isset($_POST['update_cart'])){
        $quantty = $_POST['cart_qua'];
        $add_quantty = " UPDATE cart set cart_qua = '$quantty' WHERE  pro_id = '$id_cart'  ";
        $run_add = mysqli_query($connect,$add_quantty);
        $_SESSION['cart_qua'] = $quantty;
        $total -=$value;
        $value *= $quantty;
        $total += $value;
        
    }
    ?>
    
    <td style="padding-top:50px"><input class="form-control mr-sm-2" type="number" name="cart_qua" placeholder="Quantty"></td>
    <td style="padding-top:50px">  $ <?php echo $get_pro_product['pro_price'] ?></td>
    </tr>
        <?php }}?>
    <tr>
      <th id="htabel">
         <input type="submit" value="Update your Basket " name="update_cart">
      </th>  
      <th id="htabel">
      <a href="index.php" id="abtn"> <button> Complete shopping </a></button>
      </th>   
      <th id="htabel">
        <?php 
        if($log_cookie == 1){
          
            echo' <button><a href="chekout.php" id="abtn">End shopping </a></button>';
            
        }
        else{
          echo' <button><a href="login.php" id="abtn">End shopping </a></button>';
        
        }
        ?> 
        </th> 
          <th id="htabel">  
            <div id="htabel" >  Total Price : $ <?php echo $total?></div>
          </th> 
          <th id="htabel">  
          </th> 
      </tr>
      </tbody>
</table>
</div>
</form>
<?php 
function remove(){
global $connect;
$ip = getIp();
if(isset($_POST['update_cart'])){
       foreach($_POST['remove'] as $id_remove ){
        $delet = "DELETE from cart where cart_id = '$id_remove'  AND cart_ip = '$ip' ";
        $run_remove = mysqli_query($connect ,$delet);
?>
<meta http-equiv="refresh" content="0.1  url=cart.php">
    <?php } } } echo @$co =remove(); ?>

    </div>
</div>
<?php  include 'files/footer.php'?>