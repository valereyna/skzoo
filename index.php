<?php
require_once 'dataLoader.php';

$visualContentsByProductId = loadVisualContents();
$products = loadProducts($visualContentsByProductId);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>SKZOO</title>
    <link rel="icon" type="image/x-icon" href="images/compasslogo.png" />
    <link rel="stylesheet" href="css/style1.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" crossorigin="anonymous" />
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
</head>
<body>
    <!-- Mobile Screen -->
    <input type="checkbox" id="menu" />
    <!-- End Mobile Screen -->
    <header class="section-p1">
        <!-- Mobile Screen -->
        <label for="menu">
            <div></div>
            <div></div>
            <div></div>
        </label>
        <!-- End Mobile Screen -->

        <div class="nav">
            <a href="#">Home</a>
            <a href="#">About</a>
            <a href="shop.html">Shop</a>
            <a href="#" class="mobile-cart"><i class="fa-solid fa-cart-shopping"></i></a>
        </div>

        <div class="logo">
            <a href="index.php">
                <img src="images/logo.png" alt="" />
            </a>
        </div>

        <div class="nav-icons">
            <div class="search-container">
                
                <button class="search-btn">
                    <i class="fa-solid fa-magnifying-glass search-icon"></i>
                </button>
                <input type="text" class="search-input" placeholder="Search products here...">
            </div>
            <a href="#"><i class="fa-solid fa-cart-shopping"></i></a>
            <a href="#"><i class="fa-regular fa-user"></i></a>
        </div>
    </header>

    <!-- Hero Section -->
    <section class="hero">
        <div class="slideshow">
            <div class="mySlides fade">
                <div class="numbertext">1 / 4</div>
                <img src="images/hero1.jpeg" style="width:100%" />
            </div>

            <div class="mySlides fade">
                <div class="numbertext">2 / 4</div>
                <img src="images/hero2.jpeg" style="width:100%" />
            </div>

            <div class="mySlides fade">
                <div class="numbertext">3 / 4</div>
                <img src="images/hero3.jpeg" style="width:100%" />
            </div>

            <div class="mySlides fade">
                <div class="numbertext">4 / 4</div>
                <img src="images/hero4.jpeg" style="width:100%" />
            </div>

            <!-- Next and Previous Buttons-->
            <a class="prev" onclick="plusSlides(-1)">&#10094</a>
            <a class="next" onclick="plusSlides(1)">&#10095</a>
        </div>
        <br />
        <div style="text-align: center;">
            <span class="dot" onclick="currentSlide(1)"></span>
            <span class="dot" onclick="currentSlide(2)"></span>
            <span class="dot" onclick="currentSlide(3)"></span>
            <span class="dot" onclick="currentSlide(4)"></span>
        </div>
    </section>

    <!-- Featured Products Section -->
    <section id="featured" class="section-p1">
        <h3>Featured Products</h3>
        <div class="pro-container">
            <?php foreach ($products as $product): ?>
            <div class="pro" onclick="window.location.href='productdetails.php?id=<?= htmlspecialchars($product->getId()) ?>';" style="cursor:pointer;">
                <?php
                    $vc = $product->getVisualContent();
                    if ($vc) {
                        echo $vc->getHTML();
                    } else {
                        echo "<img src='images/default.jpg' alt='No image' />";
                    }
                ?>
                <div class="des">
                    <span><?= htmlspecialchars($product->getKeyword()) ?></span>
                    <h5><?= htmlspecialchars($product->getName()) ?></h5>
                    <div class="star">
                        <?php
                        $rating = (int) round($product->getAverageRating());
                        for ($i = 0; $i < 5; $i++) {
                            if ($i < $rating) {
                                echo '<i class="fa fa-star"></i>';
                            } else {
                                echo '<i class="fa fa-star-o"></i>';
                            }
                        }
                        ?>
                    </div>
                    <h4>$<?= htmlspecialchars($product->getPrice()) ?></h4>
                </div>
                <a href="#"><i class="fa-solid fa-cart-plus cart"></i></a>
            </div>
            <?php endforeach; ?>
        </div>
    </section>

    <!-- New Arrivals Section -->
    <!-- You can add similar PHP code here if needed -->

    <!-- Newsletters Section -->
    <section id="newsletter" class="section-p1">
        <div class="newstext">
            <h4>Sign Up For Newsletters</h4>
            <p>Get e-mail updates about our latest products and <span>special offers.</span></p>
        </div>
        <div class="form">
            <input type="text" placeholder="Your email address" />
            <button class="signup">Sign Up</button>
        </div>
    </section>

    <!--Footer Section -->
    <footer class="section-p1">
        <div class="col">
            <img class="footer-logo" src="images/logo.png" />
            <h4>Contact</h4>
            <p><strong>Address: </strong>205, Gangdong-daero, Gangdong-gu, Seoul, Republic of Korea</p>
            <p><strong>Phone: </strong>+82-2-2225-8100</p>
            <p><strong>E-mail: </strong>skzoo@jype.com</p>
            <div class="follow">
                <h4>Follow Us</h4>
                <div class="icon">
                    <i class="fa-brands fa-facebook-f"></i>
                    <i class="fa-brands fa-twitter"></i>
                    <i class="fa-brands fa-instagram"></i>
                    <i class="fa-brands fa-youtube"></i>
                </div>
            </div>
        </div>

        <div class="col">
            <h4>About</h4>
            <a href="#">About Us</a>
            <a href="#">Delivery Information</a>
            <a href="#">Privacy Policy</a>
            <a href="#">Terms & Condition</a>
            <a href="#">Contact Us</a>
        </div>

        <div class="col">
            <h4>My Account</h4>
            <a href="#">Sign In</a>
            <a href="#">View Cart</a>
            <a href="#">Wishlist</a>
            <a href="#">Track My Order</a>
            <a href="#">Help</a>
        </div>

        <div class="col install">
            <h4>Install App</h4>
            <p>Get it on App Store or Google Play</p>
            <div class="row">
                <i class="fa-brands fa-app-store-ios"></i>
                <i class="fa-brands fa-google-play"></i>
            </div>
            <p>Secured Payment Gateways</p>
            <div class="row">
                <i class="fa-brands fa-cc-visa"></i>
                <i class="fa-brands fa-cc-mastercard"></i>
                <i class="fa-brands fa-cc-paypal"></i>
                <i class="fa-brands fa-apple-pay"></i>
            </div>
        </div>

        <div class="copyright">
            <p> © 2025 SKZOO. Stray Kids. JYP Entertainment. All Rights Reserved</p>
        </div>
    </footer>
    <script src="script.js"></script>
</body>
</html>
