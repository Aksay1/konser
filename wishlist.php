<?php
session_start();
// Koneksi database
include 'koneksi.php';
if (!isset($_SESSION['user_id'])) {
    // If user_id session is not set, redirect to login page
    header("Location: login.php");
    exit();
}

// Ambil user_id dari session atau sumber lain
$user_id = $_SESSION['user_id'];

// Ambil data wishlist untuk user_id tertentu
$sql = "SELECT w.event_id, e.event_name, e.event_poster, e.ticket_price 
        FROM wishlist w 
        JOIN tb_event e ON w.event_id = e.event_id 
        WHERE w.user_id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $user_id);
$stmt->execute();
$result = $stmt->get_result();

$wishlistItems = [];

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $wishlistItems[] = $row; // Simpan setiap item ke dalam array
    }
}

$stmt->close();
$conn->close();
?>

<!DOCTYPE html>
<html lang="zxx">
<head>
    <!-- Meta Tag -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>GigSeats</title>
    <link rel="icon" type="image/png" href="images/logogs.png">
    <link href="https://fonts.googleapis.com/css?family=Poppins:200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/magnific-popup.min.css">
    <link rel="stylesheet" href="css/font-awesome.css">
    <link rel="stylesheet" href="css/jquery.fancybox.min.css">
    <link rel="stylesheet" href="css/themify-icons.css">
    <link rel="stylesheet" href="css/niceselect.css">
    <link rel="stylesheet" href="css/animate.css">
    <link rel="stylesheet" href="css/flex-slider.min.css">
    <link rel="stylesheet" href="css/owl-carousel.css">
    <link rel="stylesheet" href="css/slicknav.min.css">
    <link rel="stylesheet" href="css/reset.css">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="css/responsive.css">
    <style>
    /* Add this style inside the <head> tag or your external CSS file */
    
    /* Flexbox to arrange items horizontally */
    #wishlistItems {
        display: flex;
        flex-wrap: wrap;
        gap: 20px; /* Space between items */
        justify-content: flex-start; /* Align items to the left */
    }

    #wishlistItems li {
        list-style-type: none;
        width: 300px; /* Adjust the width of each item */
        background-color: #fff;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        border-radius: 8px;
        overflow: hidden;
        text-align: center;
        padding: 15px;
    }

    #wishlistItems img {
        width: 100%;
        height: auto;
        border-bottom: 2px solid #eee;
        margin-bottom: 10px;
    }

    #wishlistItems .content {
        padding: 10px;
    }

    #wishlistItems .title {
        font-size: 18px;
        font-weight: bold;
        color: #333;
        margin-bottom: 10px;
        display: block;
    }

    #wishlistItems .date {
        font-size: 14px;
        color: #888;
        margin-bottom: 10px;
    }

    #wishlistItems .more-btn {
        display: inline-block;
        background-color: #ff5733;
        color: white;
        padding: 8px 16px;
        border-radius: 4px;
        text-decoration: none;
        margin-top: 10px;
    }

    #wishlistItems .unwishlist-btn {
        background-color: #e74c3c;
        color: white;
        border: none;
        padding: 8px 16px;
        border-radius: 4px;
        margin-top: 10px;
        cursor: pointer;
    }

    #wishlistItems .unwishlist-btn:hover {
        background-color: #c0392b;
    }
</style>

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

    <!-- Header -->
    <header class="header shop">
        <div class="middle-inner">
            <div class="container">
                <div class="row">
                    <div class="col-lg-2 col-md-2 col-12">
                        <div class="logo">
                            <a href="index.html"><img src="images/gigs.png" alt="logo"></a>
                        </div>
                    </div>
                    <div class="col-lg-8 col-md-7 col-12">
                        <div class="search-bar-top">
                            <div class="search-bar">
                                <form>
                                    <input name="search" placeholder="Search Products Here....." type="search">
                                    <button class="btnn"><i class="ti-search"></i></button>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-2 col-md-3 col-12">
                        <div class="right-bar">
                            <div class="sinlge-bar">
                                <a href="#" class="single-icon"><i class="fa fa-heart-o" aria-hidden="true"></i></a>
                            </div>
                            <div class="sinlge-bar">
                                <a href="#" class="single-icon"><i class="fa fa-user-circle-o" aria-hidden="true"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
    
    <!-- Breadcrumbs -->
    <div class="breadcrumbs">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="bread-inner">
                        <ul class="bread-list">
                            <li><a href="index.html">Home<i class="ti-arrow-right"></i></a></li>
                            <li class="active"><a href="wishlist.html">Wishlist Event</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Start Shop Blog  -->
    <section class="shop-blog section">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="section-title">
                    <h2>Wishlist Anda</h2>
                </div>
            </div>
        </div>
        <div class="row">
            <ul class="list-unstyled">
                <?php if (!empty($wishlistItems)): ?>
                    <?php foreach ($wishlistItems as $item): ?>
                        <li class="wishlist-item">
                            <div class="row">
                                <div class="col-md-4">
                                    <img src="uploads/<?php echo htmlspecialchars($item['event_poster']); ?>" alt="<?php echo htmlspecialchars($item['event_name']); ?>" class="img-fluid">
                                    <div class="col-md-8">
                                        <h5><?php echo htmlspecialchars($item['event_name']); ?></h5>
                                        <p>Harga: IDR <?php echo htmlspecialchars($item['ticket_price']); ?></p>
                                        <form action="remove_wishlist.php" method="POST" style="display:inline;">
                                            <input type="hidden" name="event_id" value="<?php echo htmlspecialchars($item['event_id']); ?>">
                                            <button type="submit" class="btn btn-danger">Hapus dari Wishlist</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </li>
                    <?php endforeach; ?>
                <?php else: ?>
                    <li>Tidak ada item dalam wishlist Anda.</li>
                <?php endif; ?>
            </ul>
        </div>
    </div>
</section>


    <!-- Start Footer Area -->
    <footer class="footer">
        <div class="footer-top section">
            <div class="container">
                <div class="row">
                    <div class="col-lg-5 col-md-6 col-12">
                        <div class="single-footer about">
                            <p class="text">Find and buy tickets to your favorite events easily here! Get exclusive offers and the latest event updates directly in your inbox. Join us for an unforgettable event experience!</p>
                            <p class="call">Got Question? Call us 24/7<span><a href="contact.php">+6289510457258</a></span></p>
                        </div>
                    </div>
                    <div class="col-lg-2 col-md-6 col-12">
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
                    </div>
                    <div class="col-lg-2 col-md-6 col-12">
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
                    </div>
                    <div class="col-lg-3 col-md-6 col-12">
                        <div class="single-footer social">
                            <h4>Get In Touch</h4>
                            <div class="contact">
                                <ul>
                                    <li>Jl.Penamas Tirta 3</li>
                                    <li>Kota Malang</li>
                                    <li>gigseat@gmail.com</li>
                                    <li>+032 3456 7890</li>
                                </ul>
                            </div>
                            <ul>
                                <li><a href="#"><i class="ti-facebook"></i></a></li>
                                <li><a href="#"><i class="ti-twitter"></i></a></li>
                                <li><a href="#"><i class="ti-flickr"></i></a></li>
                                <li><a href="#"><i class="ti-instagram"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
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

    <!-- Jquery -->
    <script src="js/jquery.min.js"></script>
    <script src="js/jquery-migrate-3.0.0.js"></script>
    <script src="js/jquery-ui.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/colors.js"></script>
    <script src="js/slicknav.min.js"></script>
    <script src="js/owl-carousel.js"></script>
    <script src="js/magnific-popup.js"></script>
    <script src="js/facnybox.min.js"></script>
    <script src="js/waypoints.min.js"></script>
    <script src="js/finalcountdown.min.js"></script>
    <script src="js/nicesellect.js"></script>
    <script src="js/ytplayer.min.js"></script>
    <script src="js/flex-slider.js"></script>
    <script src="js/scrollup.js"></script>
    <script src="js/onepage-nav.min.js"></script>
    <script src="js/easing.js"></script>
    <script src="js/active.js"></script>

    <script>
        window.onload = function() {
            let wishlist = JSON.parse(localStorage.getItem('wishlist')) || [];
            let wishlistItems = document.getElementById('wishlistItems');

            function updateWishlistDisplay() {
                wishlistItems.innerHTML = ''; // Clear previous items

                wishlist.forEach((item, index) => {
                    let listItem = document.createElement('li');
                    listItem.className = 'shop-single-blog';
                    listItem.innerHTML = `
                        <img src="${item.image}" alt="Event Image" style="width: 100%; height: auto;">
                        <div class="content">
                            <p class="date">${item.date}</p>
                            <a href="#" class="title">${item.name}</a>
                            <a href="#" class="more-btn">Get Tickets Here!!</a>
                            <button class="unwishlist-btn" onclick="removeFromWishlist(${index})">Unwishlist</button>
                        </div>
                    `;
                    wishlistItems.appendChild(listItem);
                });

                if (wishlist.length === 0) {
                    wishlistItems.innerHTML = '<li>Wishlist Anda kosong.</li>';
                }
            }

            function removeFromWishlist(index) {
                wishlist.splice(index, 1); // Remove the item from the wishlist array
                localStorage.setItem('wishlist', JSON.stringify(wishlist)); // Update localStorage
                updateWishlistDisplay(); // Refresh the displayed list
            }

            updateWishlistDisplay(); // Initial display of wishlist items
        };
    </script>
</body>
</html>
