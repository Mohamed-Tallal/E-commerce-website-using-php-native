
<?php include 'files/header.php';?>

<div id="header" >
	<div class="container">
        
        <div class="row">
            <div class="col-md-5">
			</div>
        	<div id="introTxt" class="col-md-7 col-xs-12">
            	<h1>Welcom To Wza Shop </h1>
                <p><a href="#">LEARN MORE</a></p>
            </div>
        </div> <!--  end of row -->
    
    </div> 
</div>
<!--  end of container -->


<div id="products">
	<div class="container">
    	<div class="row text-center">
        	<!------------------ col1 --------------------------->
			
            <?php getpro();?>
	       <?php add_pro(); ?>	
           
            <!--------------------------------------------------->            
            </div>
            <!--------------------------------------------------->
        </div><!-- end of row -->
    </div><!-- end of container -->

<!---------------Row2:Products------------------------->




<?php include 'files/footer.php';?>

