<?php
use LDAP\Result;
require_once("./functions/functions.php");
session_start();
$connction=connectDB();
$sql1="SELECT * FROM `product_list` WHERE Category='Toilete'";
$sql2="SELECT * FROM `product_list` WHERE Category='Shower'";
$sql3="SELECT * FROM `product_list` WHERE Category='Tap'";
$result1 =mysqli_query($connction,$sql1);
$result2 =mysqli_query($connction,$sql2);
$result3 =mysqli_query($connction,$sql3);

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <title>El Hamd Store</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Great+Vibes&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="css/open-iconic-bootstrap.min.css">
    <link rel="stylesheet" href="css/animate.css">
    
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/owl.theme.default.min.css">
    <link rel="stylesheet" href="css/magnific-popup.css">

    <link rel="stylesheet" href="css/aos.css">

    <link rel="stylesheet" href="css/ionicons.min.css">

    <link rel="stylesheet" href="css/bootstrap-datepicker.css">
    <link rel="stylesheet" href="css/jquery.timepicker.css">

    
    <link rel="stylesheet" href="css/flaticon.css">
    <link rel="stylesheet" href="css/icomoon.css">
    <link rel="stylesheet" href="css/style.css">
  </head>
  <body>
    <div class="py-1 bg-black top">
    	<div class="container">
    		<div class="row no-gutters d-flex align-items-start align-items-center px-md-0">
	    		<div class="col-lg-12 d-block">
		    		<div class="row d-flex">
		    			<div class="col-md pr-4 d-flex topper align-items-center">
					    	<div class="icon mr-2 d-flex justify-content-center align-items-center"><span class="icon-phone2"></span></div>
						    <span class="text">03 5402153</span>
					    </div>
					    <div class="col-md pr-4 d-flex topper align-items-center">
					    	<div class="icon mr-2 d-flex justify-content-center align-items-center"><span class="icon-paper-plane"></span></div>
						    <span class="text">###@email.com</span>
					    </div>
					    <div class="col-md-5 pr-4 d-flex topper align-items-center text-lg-right justify-content-end">
						    <p class="mb-0 register-link"><span>Open hours:</span> <span>Monday - Sunday</span> <span>8:00AM - 11:00PM</span></p>
					    </div>
				    </div>
			    </div>
		    </div>
		  </div>
    </div>
	  <nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
	    <div class="container">
	      <a class="navbar-brand" href="index.php">El Hamd Store</a>
	      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
	        <span class="oi oi-menu"></span> Product
	      </button>

	      <div class="collapse navbar-collapse" id="ftco-nav">
	        <ul class="navbar-nav ml-auto">
	        	<li class="nav-item"><a href="index.php" class="nav-link">Home</a></li>
	        	<li class="nav-item"><a href="about.php" class="nav-link">About</a></li>
	        	<li class="nav-item active"><a href="product.php" class="nav-link">Product</a></li>
	          <li class="nav-item"><a href="contact.php" class="nav-link">Contact</a></li>
			  <li class="nav-item"><a href="./cart/Cart.php" class="nav-link">Cart</a></li>
            <?php
            if(isset($_SESSION["id"]))
{
  echo "<li class='nav-item'><a href='./logout.php' class='nav-link'>Log out</a></li>";
}
else
{
  echo "<li class='nav-item'><a href='./login/login.php'class='nav-link'>Log in</a></li>
  <li class='nav-item'><a href='signup.php' class='nav-link'>Sign up</a></li>";
}
                ?>
	        </ul>
	      </div>
	    </div>
	  </nav>
    <!-- END nav -->
    
    <section class="hero-wrap hero-wrap-2" style="background-image: url('images/image8.jpg');" data-stellar-background-ratio="0.5">
      <div class="overlay"></div>
      <div class="container">
        <div class="row no-gutters slider-text align-items-end justify-content-center">
          <div class="col-md-9 ftco-animate text-center mb-4">
            <h1 class="mb-2 bread">Product</h1>
            <p class="breadcrumbs"><span class="mr-2"><a href="index.php">Home <i class="ion-ios-arrow-forward"></i></a></span> <span>Product <i class="ion-ios-arrow-forward"></i></span></p>
          </div>
        </div>
      </div>
    </section>


		<section class="ftco-section">
    	<div class="container">
        <div class="ftco-search">
					<div class="row">
            <div class="col-md-12 nav-link-wrap">
	            <div class="nav nav-pills d-flex text-center" id="v-pills-tab" role="tablist" aria-orientation="vertical">
	              <a class="nav-link ftco-animate active" id="v-pills-1-tab" data-toggle="pill" href="#v-pills-1" role="tab" aria-controls="v-pills-1" aria-selected="true">Toilets</a>

	              <a class="nav-link ftco-animate" id="v-pills-2-tab" data-toggle="pill" href="#v-pills-2" role="tab" aria-controls="v-pills-2" aria-selected="false">Taps</a>

	              <a class="nav-link ftco-animate" id="v-pills-3-tab" data-toggle="pill" href="#v-pills-3" role="tab" aria-controls="v-pills-3" aria-selected="false">Showers</a>



	            </div>
	          </div>
	          <div class="col-md-12 tab-wrap">
	            
	            <div class="tab-content" id="v-pills-tabContent">

	              <div class="tab-pane fade show active" id="v-pills-1" role="tabpanel" aria-labelledby="day-1-tab">
	              	<div class="row no-gutters d-flex align-items-stretch">

					  <?php
                       while($Toilet=mysqli_fetch_assoc($result1))
					   {
						   $id= $Toilet["Product_ID"];
						   
							   $code=$Toilet["Product_code"];
							   $price=$Toilet["price"];
							   $image=$Toilet["Image"];
							   $name1=query($connction,"SELECT `product Name` FROM `inventory` WHERE id = $code");
							   $name=$name1["0"];
					 echo"<div class='col-md-12 col-lg-6 d-flex align-self-stretch'>
					 <div class='menus d-sm-flex ftco-animate align-items-stretch'>
				   <div class='menu-img img' style='background-image: url(./Admin/uploads/$image);'></div>
				   <div class='text d-flex align-items-center'>
									 <div>
						   <div class='d-flex'>
							 <div class='one-half'>
							   <h3>$name</h3>
							 </div>
							 <div class='one-forth'>
							   <span class='price'>$price LE</span>
							 </div>
						   </div>
						   <p><a href='./handle/addtocart.php?id=$id' class='btn btn-primary'>Add to cart</a></p>
					   </div>
				   </div>
				 </div>
				 </div>
				 ";
						   
					    } ?>
								
								
							<!-- endtoliet -->
					        </div> 
						</div>

	              <div class="tab-pane fade" id="v-pills-2" role="tabpanel" aria-labelledby="v-pills-day-2-tab">
	              	<div class="row no-gutters d-flex align-items-stretch">
					        
					  <?php
                       while($Tap=mysqli_fetch_assoc($result3))
					   {
						       $Tapid=$Tap["Product_ID"];
							   $Tapcode=$Tap["Product_code"];
							   $Tapprice=$Tap["price"];
							   $Tapimage=$Tap["Image"];
							   
							   $name=query($connction,"SELECT `product Name` FROM `inventory` WHERE id = $Tapcode");
							   $Tapname=$name["0"];
					 echo"<div class='col-md-12 col-lg-6 d-flex align-self-stretch'>
					 <div class='menus d-sm-flex ftco-animate align-items-stretch'>
				   <div class='menu-img img' style='background-image: url(./Admin/uploads/$Tapimage);'></div>
				   <div class='text d-flex align-items-center'>
									 <div>
									 
						   <div class='d-flex'>
						   
							 <div class='one-half'>
							   <h3>$Tapname</h3>
							 </div>
							 <div class='one-forth'>
							   <span class='price'>$Tapprice LE</span>
							 </div>
						   </div>
						   <p><a href='./handle/addtocart.php?id=$Tapid' class='btn btn-primary'>Add to cart</a></p>
					   </div>
				   </div>
				 </div>
				 </div>
				 ";
						   
					    } ?>
					        	
								
					        </div>
	              </div>

	              <div class="tab-pane fade" id="v-pills-3" role="tabpanel" aria-labelledby="v-pills-day-3-tab">
	              	<div class="row no-gutters d-flex align-items-stretch">
					  <?php
                       while($shower=mysqli_fetch_assoc($result2))
					   {
						       $showerid=$shower["Product_ID"];
							   $showercode=$shower["Product_code"];
							   $showerprice=$shower["price"];
							   $showerimage=$shower["Image"];
							   $name=query($connction,"SELECT `product Name` FROM `inventory` WHERE id = $showercode");
							   $showername=$name["0"];
					 echo"<div class='col-md-12 col-lg-6 d-flex align-self-stretch'>
					 <div class='menus d-sm-flex ftco-animate align-items-stretch'>
				   <div class='menu-img img' style='background-image: url(./Admin/uploads/$showerimage);'></div>
				   <div class='text d-flex align-items-center'>
									 <div>
						   <div class='d-flex'>
							 <div class='one-half'>
							   <h3>$showername</h3>
							 </div>
							 <div class='one-forth'>
							   <span class='price'>$showerprice LE</span>
							 </div>
						   </div>
						   <p><a href='./handle/addtocart.php?id=$showerid' class='btn btn-primary'>Add to cart</a></p>
					   </div>
				   </div>
				 </div>
				 </div>
				 ";
						   
					    } ?>
					        
					        
					        	
					        
	              </div>

	              
	              </div>
	            </div>
	          </div>

<!-- end -->


	        </div>
        </div>
    	</div>
    </section>
		
    <footer class="ftco-footer ftco-bg-dark ftco-section">
      <div class="container">
        <div class="row mb-5">
          <div class="col-md-6 col-lg-3">
            <div class="ftco-footer-widget mb-4">
              <h2 class="ftco-heading-2">El Hamd Store</h2>
              <p>You can communicate with us to book a particular product on social media.</p>
              <ul class="ftco-footer-social list-unstyled float-md-left float-lft mt-3">
                <li class="ftco-animate"><a href="#"><span class="icon-twitter"></span></a></li>
                <li class="ftco-animate"><a href="#"><span class="icon-facebook"></span></a></li>
                <li class="ftco-animate"><a href="#"><span class="icon-instagram"></span></a></li>
              </ul>
            </div>
          </div>
          <div class="col-md-6 col-lg-3">
            <div class="ftco-footer-widget mb-4">
              <h2 class="ftco-heading-2">Open Hours</h2>
              <ul class="list-unstyled open-hours">
                <li class="d-flex"><span>Monday</span><span>9:00 - 24:00</span></li>
                <li class="d-flex"><span>Tuesday</span><span>9:00 - 24:00</span></li>
                <li class="d-flex"><span>Wednesday</span><span>9:00 - 24:00</span></li>
                <li class="d-flex"><span>Thursday</span><span>9:00 - 24:00</span></li>
                <li class="d-flex"><span>Friday</span><span>9:00 - 24:00</span></li>
                <li class="d-flex"><span>Saturday</span><span>9:00 - 24:00</span></li>
                <li class="d-flex"><span>Sunday</span><span> 9:00 - 24:00</span></li>
              </ul>
            </div>
          </div>
          <div class="col-md-6 col-lg-3">
             <div class="ftco-footer-widget mb-4">
              <h2 class="ftco-heading-2">Instagram</h2>
              <div class="thumb d-sm-flex">
	            	<a href="#" class="thumb-menu img" style="background-image: url(images/3.jpg);">
	            	</a>
	            	<a href="#" class="thumb-menu img" style="background-image: url(images/5.jpg);">
	            	</a>
	            	<a href="#" class="thumb-menu img" style="background-image: url(images/9.jpg);">
	            	</a>
	            </div>
	            <div class="thumb d-flex">
	            	<a href="#" class="thumb-menu img" style="background-image: url(images/4.jpg);">
	            	</a>
	            	<a href="#" class="thumb-menu img" style="background-image: url(images/8.jpg);">
	            	</a>
	            	<a href="#" class="thumb-menu img" style="background-image: url(images/2.jpg);">
	            	</a>
	            </div>
            </div>
          </div>
          <div class="col-md-6 col-lg-3">
            <div class="ftco-footer-widget mb-4">
            	<h2 class="ftco-heading-2">Newsletter</h2>
            	<p>You can communicate with us to book a particular product on social media.</p>
              <form action="#" class="subscribe-form">
                <div class="form-group">
                  <input type="text" class="form-control mb-2 text-center" placeholder="Enter email address">
                  <input type="submit" value="Subscribe" class="form-control submit px-3">
                </div>
              </form>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-12 text-center">

            <p><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
  Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="icon-heart" aria-hidden="true"></i> By <a target="_blank">Team II</a>
  <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></p>
          </div>
        </div>
      </div>
    </footer>
  

  <!-- loader -->
  <div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00"/></svg></div>


  <script src="js/jquery.min.js"></script>
  <script src="js/jquery-migrate-3.0.1.min.js"></script>
  <script src="js/popper.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/jquery.easing.1.3.js"></script>
  <script src="js/jquery.waypoints.min.js"></script>
  <script src="js/jquery.stellar.min.js"></script>
  <script src="js/owl.carousel.min.js"></script>
  <script src="js/jquery.magnific-popup.min.js"></script>
  <script src="js/aos.js"></script>
  <script src="js/jquery.animateNumber.min.js"></script>
  <script src="js/bootstrap-datepicker.js"></script>
  <script src="js/jquery.timepicker.min.js"></script>
  <script src="js/scrollax.min.js"></script>
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false"></script>
  <script src="js/google-map.js"></script>
  <script src="js/main.js"></script>
    
  </body>
</html>