<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <title>EL HAMD STORE</title>
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
	        	<li class="nav-item active"><a href="index.php" class="nav-link">Home</a></li>
	        	<li class="nav-item"><a href="about.php" class="nav-link">About</a></li>
	        	<li class="nav-item"><a href="product.php" class="nav-link">Product</a></li>
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
    
    <section class="home-slider owl-carousel js-fullheight">
      <div class="slider-item js-fullheight" style="background-image: url(images/image1.jpg);">
      	<div class="overlay"></div>
        <div class="container">
          <div class="row slider-text js-fullheight justify-content-center align-items-center" data-scrollax-parent="true">

            <div class="col-md-12 col-sm-12 text-center ftco-animate">
            	<span class="subheading">El Hamd Store</span>
              <h1 class="mb-4">Sanitary Ware</h1>
            </div>

          </div>
        </div>
      </div>

      <div class="slider-item js-fullheight" style="background-image: url(images/image2.jpg);">
      	<div class="overlay"></div>
        <div class="container">
          <div class="row slider-text js-fullheight justify-content-center align-items-center" data-scrollax-parent="true">

            <div class="col-md-12 col-sm-12 text-center ftco-animate">
            	<span class="subheading">El Hamd Store</span>
              <h1 class="mb-4">Bathroom Accessories</h1> 
            </div>

          </div>
        </div>
      </div>

      <div class="slider-item js-fullheight" style="background-image: url(images/image3.jpg);">
      	<div class="overlay"></div>
        <div class="container">
          <div class="row slider-text justify-content-center align-items-center" data-scrollax-parent="true">

            <div class="col-md-12 col-sm-12 text-center ftco-animate">
            	<span class="subheading">El Hamd Store</span>
              <h1 class="mb-4">Kitchen Accessories</h1>
            </div>

          </div>
        </div>
      </div>
    </section>

    <section class="ftco-section ftco-no-pt ftco-no-pb">
    	<div class="container-fluid">
    		<div class="row">
    			<div class="col-md-12">
    				<div class="featured">
    					<div class="row">
    						<div class="col-md-3">
    							<div class="featured-menus ftco-animate">
			              <div class="menu-img img" style="background-image: url(images/toilet.jpg);"></div>
			              <div class="text text-center">
                      <h3>Toilets</h3>
                    			              </div>
			            </div>
    						</div>
    						<div class="col-md-3">
    							<div class="featured-menus ftco-animate">
			              <div class="menu-img img" style="background-image: url(images/basins.jpg);"></div>
			              <div class="text text-center">
		                  <h3>Basins</h3>
			              </div>
			            </div>
    						</div>
    						<div class="col-md-3">
    							<div class="featured-menus ftco-animate">
			              <div class="menu-img img" style="background-image: url(images/tap.jpg);"></div>
			              <div class="text text-center">
		                  <h3>Taps</h3>
			              </div>
			            </div>
    						</div>
    						<div class="col-md-3">
    							<div class="featured-menus ftco-animate">
			              <div class="menu-img img" style="background-image: url(images/bathtub.jpg);"></div>
			              <div class="text text-center">
		                  <h3>Bathtubs</h3>
			              </div>
			            </div>
    						</div>
    					</div>
    				</div>
    			</div>
    		</div>
    	</div>
    </section>
	

		<section class="ftco-section ftco-wrap-about">
			<div class="container">
				<div class="row">
					<div class="col-md-7 d-flex">
						<div class="img img-1 mr-md-2" style="background-image: url(images/image4.jpg);"></div>
						<div class="img img-2 ml-md-2" style="background-image: url(images/image5.jpg);"></div>
					</div>
					<div class="col-md-5 wrap-about pt-5 pt-md-5 pb-md-3 ftco-animate">
	          <div class="heading-section mb-4 my-5 my-md-0">
	          	<span class="subheading">About</span> 
	            <h2 class="mb-4">El Hamd Store</h2>
	          </div>
	          <p style = "color:black"> <b>Selling Sanitary Ware For Kitchen & Bathroom , We Feature Guality Raw And Prices.</b></p>
						<pc class="time">
							<span> <p> <b style = "color:#c8a97e">Address :</b> <b style = "color:black"> 52 , Bekbashi El-Essawy Miami </b> </p></span>
							<span><a href="#">03 5402153</a></span>
						</p>
					</div>
				</div>
			</div>
    </section>
    
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
	            	<a href="#" class="thumb-menu img" style="background-image: url(images/1.jpg);">
	            	</a>
	            	<a href="#" class="thumb-menu img" style="background-image: url(images/2.jpg);">
	            	</a>
	            	<a href="#" class="thumb-menu img" style="background-image: url(images/3.jpg);">
	            	</a>
	            </div>
	            <div class="thumb d-flex">
	            	<a href="#" class="thumb-menu img" style="background-image: url(images/4.jpg);">
	            	</a>
	            	<a href="#" class="thumb-menu img" style="background-image: url(images/5.jpg);">
	            	</a>
	            	<a href="#" class="thumb-menu img" style="background-image: url(images/6.jpg);">
	            	</a>
	            </div>
            </div>
          </div>
          <div class="col-md-6 col-lg-3">
            <div class="ftco-footer-widget mb-4">
            	<h2 class="ftco-heading-2">Newsletter</h2>
            	<p>You can communicate with us to book a particular product on social media.</p>
              <form action="./handle/hemail.php" method="get" class="subscribe-form">
           
              <div class="form-group">
              <?php
                if (isset($errors))
                {
                  foreach($errors as $key)
                  {
                    echo "<h6><mark> $key</mark></h6>";
                    echo"<br>";
                  }
                }
                ?> 
                  <input type="text"  name="email"class="form-control mb-2 text-center" placeholder="Enter email address">
                  <input type="submit" name="submit" value="Subscribe" class="form-control submit px-3">
                </div>
              </form>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-12 text-center">

            <p><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
  Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="icon-heart" aria-hidden="true"></i> By <a target="_blank">TEAM II</a>
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