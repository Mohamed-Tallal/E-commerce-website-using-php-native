<?php 
include 'fun/function.php';
?>
<?php
 $user_cookie = @$_COOKIE['cust_name'] ;
 $log_cookie = @$_COOKIE['login_cust'] ;
 ?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Wza Home Page</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
<link rel="stylesheet" type="text/css" href="css/main.css">

<style>
   @import "https://use.fontawesome.com/releases/v5.5.0/css/all.css";
 
#info_cart{
	color:#8D949B;
	float: right;
}
#info_cart ul{
	list-style: none;
	padding-right: 10px;
	display: inline;
	
}
#info_cart ul li{
	padding: 8px;
	float: left;
}
#nav2{
  margin:30px
}
</style>

<script src="js/jquery-3.1.1.min.js"></script>
<script src="js/bootstrap.js"></script>

</head>

<body>
<!---------------Row1:Header------------------------->
<nav class="navbar navbar-default">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="#"></a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
          <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav navbar-right">
            <li>
                <a href="index.php">Home</a>
            </li>         
            <?php add_cat();?>
          
                        
              </ul>        
          </div>
    
    </div>

<!-- /.container-fluid -->
</nav>
    <!-- /.navbar-collapse -->
     <div class="container" id="nav2">
     <div class="row">
     <div class="form-group col-md-4">
            <?php cart(); ?>
            <!---- <div class="row">--->
                  <form class="form-inline" action="search.php" method="get">
                        <div class="form-row">
                              <div class="form-group col-sd-3">
                                  <input class="form-control mr-sm-2" type="text" name="pro_search" placeholder="Search" >
                              </div>
                              <div class="form-group col-3">
                              </div>
                              <div class="form-group col-sd-2">
                                    <input class="btn btn-outline-success my-2 my-sm-0" type="submit" value="search" name="search">
                              </div>
                        </div>
                  </form>
    </div>              
    <!-- /.navbar-collapse -->
            <div class="form-group col-md-8">

                      <div id="info_cart">
                      <ul>
                     
                      <li>
                      Welcom :  <?php echo $user_cookie;?> ,  Products :  <?php total_pro();?> ,   Price :   <?php total_price();?> $ .
                      </li>        
                      <li>
                            <a href="cart.php">    Go to your cart </a>
                      </li>     
                      </ul>
                      </div>
          </div>
  </div> 
</div>

