<?php
// Start session
session_start();

// Check if user_id session is set
if (!isset($_SESSION['user_id'])) {
    // If user_id session is not set, redirect to login page
    header("Location: login.php");
    exit();
}

// Jika sesi aktif, Anda dapat menggunakan $_SESSION['user_id'] untuk query data pengguna
$user_id = $_SESSION['user_id'];

// Misalnya, gunakan $user_id untuk mendapatkan data pengguna dari database
include "koneksi.php";
$query = "SELECT * FROM tb_user WHERE user_id = '$user_id'";
$result = mysqli_query($conn, $query);
$user_data = mysqli_fetch_array($result);

// Cek apakah data pengguna ditemukan
if (!$user_data) {
    echo "Data pengguna tidak ditemukan.";
    exit();
}
?>

<!DOCTYPE html>
<html lang="zxx">
<head>
	<!-- Meta Tag -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name='copyright' content=''>
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<!-- Title Tag  -->
    <title>GigSeats</title>
	<!-- Favicon -->
	<link rel="icon" type="image/png" href="images/logogs.png">
	<!-- Web Font -->
	<link href="https://fonts.googleapis.com/css?family=Poppins:200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i&display=swap" rel="stylesheet">
	<!-- StyleSheet -->
	<!-- Bootstrap -->
		<!-- Bootstrap -->
        <link rel="stylesheet" href="css/bootstrap.css">
	<!-- Magnific Popup -->
    <link rel="stylesheet" href="css/magnific-popup.min.css">
	<!-- Font Awesome -->
    <link rel="stylesheet" href="css/font-awesome.css">
	<!-- Fancybox -->
	<link rel="stylesheet" href="css/jquery.fancybox.min.css">
	<!-- Themify Icons -->
    <link rel="stylesheet" href="css/themify-icons.css">
	<!-- Nice Select CSS -->
    <link rel="stylesheet" href="css/niceselect.css">
	<!-- Animate CSS -->
    <link rel="stylesheet" href="css/animate.css">
	<!-- Flex Slider CSS -->
    <link rel="stylesheet" href="css/flex-slider.min.css">
	<!-- Owl Carousel -->
    <link rel="stylesheet" href="css/owl-carousel.css">
	<!-- Slicknav -->
    <link rel="stylesheet" href="css/slicknav.min.css">
	
	<!-- Eshop StyleSheet -->
	<link rel="stylesheet" href="css/reset.css">
	<link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="css/responsive.css">

</head>
<body class="js">
	<!-- Preloader -->
	<div class="preloader">
		<div class="preloader-inner">
			<div class="preloader-icon">
				<span></span>
				<span></span>
			</div>
		</div>
	</div>
	<!-- End Preloader -->
	<!-- Header -->
	<header class="header shop">
		
		<div class="middle-inner">
			<div class="container">
				<div class="row">
					<div class="col-lg-2 col-md-2 col-12">
						<!-- Logo -->
						<div class="logo">
							<a href="index.html"><img src="images/gigs.png" alt="logo"></a>
						</div>
						<!--/ End Logo -->
						<!-- Search Form -->
						<div class="search-top">
							<div class="top-search"><a href="#0"><i class="ti-search"></i></a></div>
							<!-- Search Form -->
							<div class="search-top">
								<form class="search-form">
									<input type="text" placeholder="Search here..." name="search">
									<button value="search" type="submit"><i class="ti-search"></i></button>
								</form>
							</div>
							<!--/ End Search Form -->
						</div>
						<!--/ End Search Form -->
						<div class="mobile-nav"></div>
					</div>
					<div class="col-lg-8 col-md-7 col-12">
						<div class="search-bar-top">
							<div class="search-bar">
								
								<form>
									<input name="search" placeholder="Search Event Here!" type="search">
									<button class="btnn"><i class="ti-search"></i></button>
								</form>
							</div>
						</div>
					</div>
					<div class="col-lg-2 col-md-3 col-12">
						<div class="right-bar">
							<!-- Search Form -->
							<div class="sinlge-bar">
								<a href="wishlist.php" class="single-icon"><i class="fa fa-heart-o" aria-hidden="true"></i></a>
							</div>
							<div class="sinlge-bar">
								<a href="login.php" class="single-icon"><i class="fa fa-user-circle-o" aria-hidden="true"></i></a>
							</div>
							<div class="sinlge-bar shopping">
								<a href="pesanan.html" class="single-icon"><i class="ti-bag"></i> <span class="total-count">2</span></a>
							</div>	
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- Header Inner -->
		<div class="header-inner">
			<div class="container">
				<div class="cat-nav-head">
					<div class="row">
						<div class="col-lg-3">
							<div class="all-category">
								
								<ul class="main-category">																	
							</div>
						</div>
						<div class="col-lg-9 col-12">
							<div class="menu-area">
								<!-- Main Menu -->
								<nav class="navbar navbar-expand-lg">
									<div class="navbar-collapse">	
										<div class="nav-inner">	
										<ul class="nav main-menu menu navbar-nav">
													<li class="active"><a href="index.php?page=home">Home</a></li>
													<li><a href="index.php?page=event ">Event</a></li>												
													<li><a href="index.php?page=create_event">Create Event</a></li>
													<li><a href="index.php?page=contact">Contact Us</a></li>
												</ul>
										</div>
									</div>
								</nav>
								<!--/ End Main Menu -->	
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!--/ End Header Inner -->
	</header>
	<!--/ End Header -->
	<!-- Start Midium Banner  -->
	<section class="midium-banner">
		<div class="container">
			<div class="row">
				<!-- Single Banner  -->
				<div class="col-lg-6 col-md-6 col-12 mt-4">
					<div class="single-banner">
						<img src="images/bruno.jpg" alt="#">
						<div class="content">
							<p></p>
							<h3> <br><span> </span></h3>
							<a href="#">See Ticket</a>
						</div>
					</div>
				</div>
				<!-- /End Single Banner  -->
				<!-- Single Banner  -->
				<div class="col-lg-6 col-md-6 col-12 mt-4">
					<div class="single-banner">
						<img src="images/personil avengeld.jpg" alt="#">
						<div class="content">
							<p></p>
							<h3> <br><span> </span></h3>
							<a href="#">See Ticket</a>
						</div>
					</div>
				</div>
				<!-- /End Single Banner  -->
			</div>
		</div>
	</section>
	<!-- End Midium Banner -->
	
	<!-- Start Most Popular -->
	
	<!-- Start Shop Services Area -->
	<section class="shop-services section home">
		<div class="container">
			<div class="row">
				<div class="col-lg-3 col-md-6 col-12">
					<!-- Start Single Service -->
					<div class="single-service">
						<i class="ti-rocket"></i>
						<h4>easy to access</h4>
						<p>access in an instant</p>
					</div>
					<!-- End Single Service -->
				</div>
				<div class="col-lg-3 col-md-6 col-12">
					<!-- Start Single Service -->
					<div class="single-service">
						<i class="ti-reload"></i>
						<h4>Fast Process</h4>
						<p>process in an instant</p>
					</div>
					<!-- End Single Service -->
				</div>
				<div class="col-lg-3 col-md-6 col-12">
					<!-- Start Single Service -->
					<div class="single-service">
						<i class="ti-lock"></i>
						<h4>Sucure Payment</h4>
						<p>100% secure payment</p>
					</div>
					<!-- End Single Service -->
				</div>
				<div class="col-lg-3 col-md-6 col-12">
					<!-- Start Single Service -->
					<div class="single-service">
						<i class="ti-tag"></i>
						<h4>Best Peice</h4>
						<p>Guaranteed price</p>
					</div>
					<!-- End Single Service -->
				</div>
			</div>
		</div>
	</section>
	<!-- End Shop Services Area -->
    <?php
// Koneksi database
$host = "localhost";
$dbname = "db_gigseats";
$username = "root";
$password = "";

$conn = new mysqli($host, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

$sql = "SELECT event_id, event_name, event_poster, ticket_price FROM tb_event"; 
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo '<div class="col-xl-3 col-lg-3 col-md-4 col-sm-6 col-12 mb-4">';
        echo '    <div class="single-product">';
        echo '        <div class="product-img">';
        echo '            <a href="product-details.html">';
        echo '                <img class="default-img" src="uploads/' . htmlspecialchars($row['event_poster']) . '" alt="' . htmlspecialchars($row['event_name']) . '">';
        echo '                <img class="hover-img" src="uploads/' . htmlspecialchars($row['event_poster']) . '" alt="' . htmlspecialchars($row['event_name']) . '">';
        echo '            </a>';
        echo '            <div class="button-head">';
        echo '                <div class="product-action">';
        echo '                    <a title="Detail" href="#"><i class="ti-eye"></i><span>Detail</span></a>';
        
        // Form untuk menambahkan ke wishlist
        echo '                    <form action="add_to_wishlist.php" method="POST" style="display:inline;">'; // style inline untuk menghindari form yang berantakan
        echo '                        <input type="hidden" name="user_id" value="' . htmlspecialchars($user_id) . '">'; // ganti $user_id sesuai kebutuhan
        echo '                        <input type="hidden" name="event_id" value="' . htmlspecialchars($row['event_id']) . '">';
        echo '                        <button type="submit" title="Wishlist"><i class="ti-heart"></i><span>Add to Wishlist</span></button>';
        echo '                    </form>';
        
        echo '                </div>';
        echo '                <div class="product-action-2">';
        echo '                    <a title="Add to cart" href="#">Get The Ticket</a>';
        echo '                </div>';
        echo '            </div>';
        echo '        </div>';
        echo '        <div class="product-content">';
        echo '            <h3><a href="product-details.html">' . htmlspecialchars($row['event_name']) . '</a></h3>';
        echo '            <div class="product-price">';
        echo '                <span>IDR ' . htmlspecialchars($row['ticket_price']) . '</span>';
        echo '            </div>';
        echo '        </div>';
        echo '    </div>';
        echo '</div>';
    }
} else {
    echo "Tidak ada acara ditemukan.";
}

$conn->close();
?>


	<!-- Start Most Popular -->
	<div class="product-area most-popular section">
        <div class="container">
            <div class="row">
				<div class="col-12">
					<div class="section-title">
						<h2>New Event</h2>
					</div>
				</div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="owl-carousel popular-slider">
						<!-- Start Single Product -->
<div class="single-product">
    <div class="product-img">
        <a href="product-details.html">
            <img class="default-img" src="images/pop.jpeg" alt="#">
            <img class="hover-img" src="images/pop.jpeg" alt="#">
            <span class="new">New</span>
        </a>
        <div class="button-head">
            <div class="product-action">
                <a title="Detail" href="#"><i class="ti-eye"></i><span>Detail</span></a>
                <a title="Wishlist" href="#" onclick="addToWishlist('Pop Punk Fest', 'IDR 75K', 'images/pop.jpeg')">
                    <i class="ti-heart"></i><span>Add to Wishlist</span>
                </a>										
            </div>
            <div class="product-action-2">
                <a title="Add to cart" href="#">Get The Ticket</a>
            </div>
        </div>
    </div>
    <div class="product-content">
        <h3><a href="product-details.html">Pop Punk Fest</a></h3>
        <div class="product-price">
            <span>IDR 75K</span>
        </div>
    </div>
</div>
<!-- End Single Product -->

						<!-- Start Single Product -->
						<div class="single-product">
                            <div class="product-img">
                                <a href="product-details.html">
                                    <img class="default-img" src="images/rc1.png" alt="#">
                                    <img class="hover-img" src="images/rc1.png" alt="#">
									<span class="new">New</span>
                                </a>
								<div class="button-head">
									<div class="product-action">
										<a title="Detail" href="detail1.html"><i class=" ti-eye" ></i><span>Detail</span></a>
										<a title="Wishlist" href="#" onclick="addToWishlist('Goodnes Rockstar', 'IDR 100K', 'images/rc1.png')">
											<i class="ti-heart"></i><span>Add to Wishlist</span>
									</div>
									<div class="product-action-2">
										<a title="Add to cart" href="#">Get The Ticket</a>
									</div>
								</div>
                            </div>
                            <div class="product-content">
                                <h3><a href="product-details.html">Goodnes Rockstar</a></h3>
                                <div class="product-price">
                                    <span>IDR 100k</span>
                                </div>
                            </div>
                        </div>
						<!-- End Single Product -->
						<!-- Start Single Product -->
						<div class="single-product">
                            <div class="product-img">
                                <a href="product-details.html">
                                    <img class="default-img" src="images/rythm new.jpg" alt="#">
                                    <img class="hover-img" src="images/rythm new.jpg" alt="#">
									<span class="new">New</span>
									
                                </a>
								<div class="button-head">
									<div class="product-action">
										<a  title="Detail" href="#"><i class=" ti-eye"></i><span>Detail</span></a>
										<a title="Wishlist" href="#"><i class=" ti-heart "></i><span>Add to Wishlist</span></a>
									</div>
									<div class="product-action-2">
										<a title="Add to cart" href="#">Get The Ticket</a>
									</div>
								</div>
                            </div>
                            <div class="product-content">
                                <h3><a href="product-details.html">Poppin Rhythm</a></h3>
                                <div class="product-price">
                                    <span>IDR 80k</span>
                                </div>
                            </div>
                        </div>
						<!-- End Single Product -->
						<!-- Start Single Product -->
						<div class="single-product">
                            <div class="product-img">
                                <a href="product-details.html">
                                    <img class="default-img" src="images/pestapora new.jpg" alt="#">
                                    <img class="hover-img" src="images/pestapora new.jpg" alt="#">
									<span class="new">New</span>
								</a>
								<div class="button-head">
									<div class="product-action">
										<a  title="Detail" href="#"><i class=" ti-eye"></i><span>Detail</span></a>
										<a title="Wishlist" href="#"><i class=" ti-heart "></i><span>Add to Wishlist</span></a>
									</div>
									<div class="product-action-2">
										<a title="Add to cart" href="#">Get The Ticket</a>
									</div>
								</div>
                            </div>
                            <div class="product-content">
                                <h3><a href="product-details.html">Pestapora Fest</a></h3>
                                <div class="product-price">
                                    <span>IDR 50k</span>
                                </div>
                            </div>
                        </div>
						<!-- End Single Product -->
						 <!-- Start Single Product -->
						<div class="single-product">
                            <div class="product-img">
                                <a href="product-details.html">
                                    <img class="default-img" src="images/namoy.jpg" alt="#">
                                    <img class="hover-img" src="images/namoy.jpg" alt="#">
									<span class="new">New</span>
									
                                </a>
								<div class="button-head">
									<div class="product-action">
										<a  title="Detail" href="#"><i class=" ti-eye"></i><span>Detail</span></a>
										<a title="Wishlist" href="#"><i class=" ti-heart "></i><span>Add to Wishlist</span></a>
									</div>
									<div class="product-action-2">
										<a title="Add to cart" href="#">Get The Ticket</a>
									</div>
								</div>
                            </div>
                            <div class="product-content">
                                <h3><a href="product-details.html">Namoy Budaya</a></h3>
                                <div class="product-price">
                                    <span>IDR 75k</span>
                                </div>
                            </div>
                        </div>
						<!-- End Single Product -->
                    </div>
                </div>
            </div>
        </div>
    </div>
	<!-- End Most Popular Area -->
	
	
	<!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span class="ti-close" aria-hidden="true"></span></button>
                    </div>
                    <div class="modal-body">
                        <div class="row no-gutters">
                            <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12">
                                <!-- Product Slider -->
									<div class="product-gallery">
										<div class="quickview-slider-active">
											<div class="single-slider">
												<img src="https://via.placeholder.com/569x528" alt="#">
											</div>
											<div class="single-slider">
												<img src="https://via.placeholder.com/569x528" alt="#">
											</div>
											<div class="single-slider">
												<img src="https://via.placeholder.com/569x528" alt="#">
											</div>
											<div class="single-slider">
												<img src="https://via.placeholder.com/569x528" alt="#">
											</div>
										</div>
									</div>
								<!-- End Product slider -->
                            </div>
                            <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12">
                                <div class="quickview-content">
                                    <h2>Flared Shift Dress</h2>
                                    <div class="quickview-ratting-review">
                                        <div class="quickview-ratting-wrap">
                                            <div class="quickview-ratting">
                                                <i class="yellow fa fa-star"></i>
                                                <i class="yellow fa fa-star"></i>
                                                <i class="yellow fa fa-star"></i>
                                                <i class="yellow fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                            </div>
                                            <a href="#"> (1 customer review)</a>
                                        </div>
                                        <div class="quickview-stock">
                                            <span><i class="fa fa-check-circle-o"></i> in stock</span>
                                        </div>
                                    </div>
                                    <h3>$29.00</h3>
                                    <div class="quickview-peragraph">
                                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Mollitia iste laborum ad impedit pariatur esse optio tempora sint ullam autem deleniti nam in quos qui nemo ipsum numquam.</p>
                                    </div>
									<div class="size">
										<div class="row">
											<div class="col-lg-6 col-12">
												<h5 class="title">Size</h5>
												<select>
													<option selected="selected">s</option>
													<option>m</option>
													<option>l</option>
													<option>xl</option>
												</select>
											</div>
											<div class="col-lg-6 col-12">
												<h5 class="title">Color</h5>
												<select>
													<option selected="selected">orange</option>
													<option>purple</option>
													<option>black</option>
													<option>pink</option>
												</select>
											</div>
										</div>
									</div>
                                    <div class="quantity">
										<!-- Input Order -->
										<div class="input-group">
											<div class="button minus">
												<button type="button" class="btn btn-primary btn-number" disabled="disabled" data-type="minus" data-field="quant[1]">
													<i class="ti-minus"></i>
												</button>
											</div>
											<input type="text" name="quant[1]" class="input-number"  data-min="1" data-max="1000" value="1">
											<div class="button plus">
												<button type="button" class="btn btn-primary btn-number" data-type="plus" data-field="quant[1]">
													<i class="ti-plus"></i>
												</button>
											</div>
										</div>
										<!--/ End Input Order -->
									</div>
									<div class="add-to-cart">
										<a href="#" class="btn">Add to cart</a>
										<a href="#" class="btn min"><i class="ti-heart"></i></a>
										<a href="#" class="btn min"><i class="fa fa-compress"></i></a>
									</div>
                                    <div class="default-social">
										<h4 class="share-now">Share:</h4>
                                        <ul>
                                            <li><a class="facebook" href="#"><i class="fa fa-facebook"></i></a></li>
                                            <li><a class="twitter" href="#"><i class="fa fa-twitter"></i></a></li>
                                            <li><a class="youtube" href="#"><i class="fa fa-pinterest-p"></i></a></li>
                                            <li><a class="dribbble" href="#"><i class="fa fa-google-plus"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </div>
    <!-- Modal end -->
	
	<!-- Start Footer Area -->
	<footer class="footer">
		<!-- Footer Top -->
		<div class="footer-top section">
			<div class="container">
				<div class="row">
					<div class="col-lg-5 col-md-6 col-12">
						<!-- Single Widget -->
						<div class="single-footer about">
							
							<p class="text">Find and buy tickets to your favorite events easily here! Get exclusive offers and the latest event updates directly in your inbox. Join us for an unforgettable event experience!</p>
							<p class="call">Got Question? Call us 24/7<span><a href="contact.php">+6289510457258</a></span></p>
						</div>
						<!-- End Single Widget -->
					</div>
					<div class="col-lg-2 col-md-6 col-12">
						<!-- Single Widget -->
						<div class="single-footer links">
							<h4>Information</h4>
							<ul>
								<li><a href="#">About Us</a></li>
								<li><a href="#">Faq</a></li>
								<li><a href="#">Terms & Conditions</a></li>
								<li><a href="#">Contact Us</a></li>
								<li><a href="#">Help</a></li>
							</ul>
						</div>
						<!-- End Single Widget -->
					</div>
					<div class="col-lg-2 col-md-6 col-12">
						<!-- Single Widget -->
						<div class="single-footer links">
							<h4>Customer Service</h4>
							<ul>
								<li><a href="#">Payment Methods</a></li>
								<li><a href="#">Money-back</a></li>
								<li><a href="#">Returns</a></li>
								<li><a href="#">Shipping</a></li>
								<li><a href="#">Privacy Policy</a></li>
							</ul>
						</div>
						<!-- End Single Widget -->
					</div>
					<div class="col-lg-3 col-md-6 col-12">
						<!-- Single Widget -->
						<div class="single-footer social">
							<h4>Get In Tuch</h4>
							<!-- Single Widget -->
							<div class="contact">
								<ul>
									<li>Jl.Penamas Tirta 3</li>
									<li>Kota Malang</li>
									<li>gigseat@gmail.com</li>
									<li>+032 3456 7890</li>
								</ul>
							</div>
							<!-- End Single Widget -->
							<ul>
								<li><a href="#"><i class="ti-facebook"></i></a></li>
								<li><a href="#"><i class="ti-twitter"></i></a></li>
								<li><a href="#"><i class="ti-flickr"></i></a></li>
								<li><a href="#"><i class="ti-instagram"></i></a></li>
							</ul>
						</div>
						<!-- End Single Widget -->
					</div>
				</div>
			</div>
		</div>
		<!-- End Footer Top -->
		<div class="copyright">
			<div class="container">
				<div class="inner">
					<div class="row">
						<div class="col-lg-6 col-12">
							<div class="left">
								<p>Copyright © 2024 <a href="" target="_blank">GigSeats</a>  -  All Rights Reserved.</p>
							</div>
						</div>
						
					</div>
				</div>
			</div>
		</div>
	</footer>
	<!-- /End Footer Area -->
	<!-- Jquery -->
  
    <script src="js/jquery.min.js"></script>
    <script src="js/jquery-migrate-3.0.0.js"></script>
	<script src="js/jquery-ui.min.js"></script>
	<!-- Popper JS -->
	<script src="js/popper.min.js"></script>
	<!-- Bootstrap JS -->
	<script src="js/bootstrap.min.js"></script>
	<!-- Color JS -->
	<script src="js/colors.js"></script>
	<!-- Slicknav JS -->
	<script src="js/slicknav.min.js"></script>
	<!-- Owl Carousel JS -->
	<script src="js/owl-carousel.js"></script>
	<!-- Magnific Popup JS -->
	<script src="js/magnific-popup.js"></script>
	<!-- Fancybox JS -->
	<script src="js/facnybox.min.js"></script>
	<!-- Waypoints JS -->
	<script src="js/waypoints.min.js"></script>
	<!-- Countdown JS -->
	<script src="js/finalcountdown.min.js"></script>
	<!-- Nice Select JS -->
	<script src="js/nicesellect.js"></script>
	<!-- Ytplayer JS -->
	<script src="js/ytplayer.min.js"></script>
	<!-- Flex Slider JS -->
	<script src="js/flex-slider.js"></script>
	<!-- ScrollUp JS -->
	<script src="js/scrollup.js"></script>
	<!-- Onepage Nav JS -->
	<script src="js/onepage-nav.min.js"></script>
	<!-- Easing JS -->
	<script src="js/easing.js"></script>
	<!-- Active JS -->
	<script src="js/active.js"></script>
	<script>
		function addToWishlist(eventName, eventPrice) {
			let wishlist = JSON.parse(localStorage.getItem('wishlist')) || [];
			wishlist.push({ name: eventName, price: eventPrice });
			localStorage.setItem('wishlist', JSON.stringify(wishlist));
			alert(eventName + " telah ditambahkan ke wishlist!");
		}
		</script>	
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
$.ajax({
    type: 'POST',
    url: 'add_to_wishlist.php', // Pastikan ini benar
    data: { user_id: userId, event_id: eventId },
    success: function(response) {
        console.log("Response dari server:", response); // Tambahkan ini untuk debug
        var res = JSON.parse(response);
        if (res.status === "success") {
            alert("Acara telah ditambahkan ke wishlist!");
        } else {
            alert("Terjadi kesalahan: " + res.message);
        }
    },
    error: function(jqXHR, textStatus, errorThrown) {
        console.log("Error Status:", textStatus); // Tambahkan ini untuk debug
        console.log("Error Thrown:", errorThrown); // Tambahkan ini untuk debug
        alert("Kesalahan dalam menghubungi server.");
    }
});

</script>

			
</body>
</html>