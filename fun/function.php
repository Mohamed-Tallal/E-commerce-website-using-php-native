 <?php

$connect = mysqli_connect("localhost","root","","ecofinal");


function getIp(){
    $ip =$_SERVER['REMOTE_ADDR'];
    if(!empty($_SERVER['HTTP_CLIENT_IP']))
    {
        $ip=$_SERVER['HTTP_CLIENT_IP'];
    }
    elseif(!empty($_SERVER['HTTP_X_FORWARDED_FOR'])){
        $ip=$_SERVER['HTTP_X_FORWARDED_FOR'];

    }
    else {
        $ip = $_SERVER['REMOTE_ADDR'];
    }
        return $ip;
}


function cart(){
    global $connect;
    $ip =getIp();
if(isset($_GET['cart'])){
    $pro_id =(int)($_GET['cart']); 
    $get="SELECT * FROM  cart Where cart_ip='$ip' AND cart_id='$pro_id'";
    $run_show = mysqli_query($connect,$get);
    if(mysqli_num_rows($run_show) >0)
    {
        echo '';
    }
    else
    {
        $insert  = "INSERT INTO cart (cart_id,cart_ip) VALUES ('$pro_id','$ip') ";
        $run_ins = mysqli_query($connect,$insert);
    }
    }
}

// tootal product 

function total_pro(){
    global $connect;
    if(isset($_GET['cart'])){
        $ip = getIp();
        $get_tprice = "SELECT * FROM cart WHERE  cart_ip = '$ip'" ;
        $run_tprice = mysqli_query($connect,$get_tprice);
        $total_product = mysqli_num_rows($run_tprice);
    }
    else{
        $ip = getIp();
        $get_tprice = "SELECT * FROM cart WHERE  cart_ip = '$ip'" ;
        $run_tprice = mysqli_query($connect,$get_tprice);
        $total_product = mysqli_num_rows($run_tprice); 
    }
    echo $total_product;
}
// tootal product 

function total_price(){
    global $connect;
    $total = 0;    
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
                $total +=$value; 
                if(isset($_POST['update_cart'])){
                    $quantty = $_POST['cart_qua'];
                    $add_quantty = " UPDATE cart set cart_qua = '$quantty' WHERE  pro_id = '$id_cart'  ";
                    $run_add = mysqli_query($connect,$add_quantty);
                    $_SESSION['cart_qua'] = $quantty;
                    $total -=$value;
                    $value *= $quantty;
                    $total += $value;
                }
            }
        }
  echo $total;
}

// Add Categorie to nave bare 

function add_cat(){
    global $connect;
    $get_cat = "SELECT * FROM category";
    $run_cat = mysqli_query($connect,$get_cat);
    while($row_cat = mysqli_fetch_array($run_cat))
    {
        echo '<li>';
        echo '<a href="index.php?pro='.$row_cat['cat_id'].'">'.$row_cat['cat_name'].'</a>';
        echo '</li>';
    }
}
    
// Add Product to your main 
function add_pro(){
global $connect;
if(!isset($_GET['pro'])){
$get_pro = "SELECT * FROM product" ;
$run_pro = mysqli_query($connect,$get_pro);
while($row_pro = mysqli_fetch_array($run_pro))
{  
    echo    '<div class="col-xs-12 col-md-4" style="margin: 30px 0px 10px 0px; ">';
    echo    '<img alt="The Waz Product" class="img-responsive product_img" src="admin/images/'.$row_pro['pro_img'].'" width="300" height="1500">';
    echo    '<h3 class="title">'.$row_pro['pro_name'].'</h3>';
    echo    '<a href="prodcut.php?showpro='.$row_pro['pro_id'].'">  <p class="info">  Show Waz Product </p></a>';
    echo    '<a href="index.php?cart='.$row_pro['pro_id'].'">  <p class="link"> Add to shopping basket</p>   </a>';
    echo    '</div>';

}
}
}
/// Get Product from categorie 

function getpro()
{
    global $connect;
    if(isset($_GET['pro'])){
        $getpro = (int)$_GET['pro'];
        $get_pro = "SELECT * FROM product WHERE pro_cat = '$getpro'";
        $run_pro = mysqli_query($connect,$get_pro);
        if(mysqli_num_rows($run_pro) > 0)
        {
            while($row = mysqli_fetch_array($run_pro) ){
               
                echo    '<div class="col-xs-12 col-md-4">';
                echo    '<img alt="The Waz Product" class=" img-responsive product_img" src="admin/images/'.$row['pro_img'].'" width="360">';
                echo    '<h3 class="title">'.$row['pro_name'].'</h3>';
                echo    '<a href="prodcut.php?showpro='.$row['pro_id'].'">  <p class="info">Show Waz Product </p></a>';
                echo    '<a href="index.php?cart='.$row['pro_id'].'">  <p class="link"> Add to shopping basket</p>   </a>';
                echo    '</div>';
                
        }
        
    }
    else{
        echo 'This product is not avaliable';
    }
}
}
//// search about the product 

function search()
{
    global $connect;
    if(isset($_GET['search'])){
        $pro_search =$_GET['pro_search'];
        $get_search ="SELECT * FROM product WHERE pro_key like '%$pro_search%' ";
        $run_search = mysqli_query($connect,$get_search);
        if(mysqli_num_rows($run_search) > 0)
        {
            while($row_search = mysqli_fetch_array($run_search)){
                echo    '<div class="col-xs-12 col-md-4">';
                echo    '<img alt="The Waz Product" class="img-responsive product_img" src="admin/images/'.$row_search['pro_img'].'" width="360">';
                echo    '<h3 class="title">'.$row_search['pro_name'].'</h3>';
                echo    '<a href="prodcut.php?showpro='.$row_search['pro_id'].'">  <p class="link"> Show Waz Product</p>   </a>';
                echo    '<a href="index.php?cart='.$row_search['pro_id'].'">  <p class="info">Add to shopping basket </p></a>';
                echo    '</div>';
  
            } 
        }
           else {
            echo '<div> error not found </div>';
        }
    }
}




?>