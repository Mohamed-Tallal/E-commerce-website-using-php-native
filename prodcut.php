<?php include 'files/header.php'; ?>
<?php 
global $connect;
$showpro=$_GET['showpro'];
if(isset($showpro)){
$get_show = "SELECT * FROM  product WHERE pro_id = '$showpro'";
$run_show = mysqli_query($connect , $get_show);
$row_show = mysqli_fetch_array($run_show);

?>
<style>
@media (max-width: 767px){

  #imgproduct{
    width:400px
  }
  #phonestyle{
    margin:0px 0px 50px 0px;
  }
}

</style>    
<div class="container">
<div class="row">
  <div class="col-12 col-lg-7">

<!---Start Card ( Log in ) admin page ---->

<div class="card style_card" style="padding:30px; margin-top:50px;font-size:20px; border:1px solid #D0D3D4">
 <div class="card-body">
   
   <div class="card">
      <div class="card-body">
        <h5 class="card-title" style="text-align: center; font-size:18px"><?php echo $row_show['pro_name'] ;?></h5>
   <hr>
        <img id="imgproduct" src="admin/images/<?php echo $row_show['pro_img'] ?>" alt="product img" width="580" height="400px">

   <br>
   <hr>
        <p class="card-text"><?php echo $row_show['pro_des'];?></p>
      </div>
    </div>
      <!---Start admin Log in Form ---->
 
</div>
</div>
<hr>
</div>
     <!---End admin Log in Form ---->
     <div class="col-12 col-lg-1"></div>
        <div class="col-12 col-lg-4" id="phonestyle" style="margin-top:50px;font-size:20px;">
          <div class="card">
            <div class="card-body">
                <ul class="list-group">
                    <li class="list-group-item active">Product Information</li>
                    <li class="list-group-item">Price : <?php echo $row_show['pro_price'] ;?> $</li>
                    <?PHP 
                    $cat = $row_show['pro_cat'] ;
                    $cat_show = "SELECT  cat_name FROM  category WHERE cat_id ='$cat'";
                    $cat_run = mysqli_query($connect , $cat_show);
                  while ($row_chat = mysqli_fetch_array( $cat_run)) {
                      ?>
                      <li class="list-group-item">Categorie : 
                      <?php echo $row_chat['cat_name']; } ?>
                  </li>
                 <!--   <li class="list-group-item">Describe : <?php //echo $row_show['pro_key'] ;?></li> -->
                </ul>
            </div>
            </div>
        </div>
    </div>
</div>
<?php }?>
    <?php include 'files/footer.php'; ?>
