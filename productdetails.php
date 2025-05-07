<?php
    require_once 'productLoader.php';
    // Get product ID from GET parameter
    if (!isset($_GET['id'])) {
        echo "Product ID not specified.";
        exit;
    }
    $productId = $_GET['id'];

    $product = getProductById($productId);
    if (!$product) {
        echo "Product not found.";
        exit;
    }
?>
<!DOCTYPE html>
    <html lang="en">
        <head>
            <meta charset="UTF-8" />
            <meta name="viewport" content="width=device-width, initial-scale=1" />
            <title><?= htmlspecialchars($product->getName()) ?> - SKZOO</title>
            <link rel="icon" type="image/x-icon" href="images/compasslogo.png" />
            <link rel="stylesheet" href="css/productdetails.css"/>
            <link rel="stylesheet" href="css/style1.css"/>
            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" crossorigin="anonymous" />
        </head>

        <body id="productdetails">
            <!-- Mobile Screen -->
            <input type="checkbox" id="menu">
            <!-- End Mobile Screen -->

            <!-- Header Section-->
            <header class="section-p1">
                <!-- Mobile Screen -->
                <label for="menu">
                    <div></div>
                    <div></div>
                    <div></div>
                </label>
                <!-- End Mobile Screen -->

                <div class="nav">
                    <a href="index.php">Home</a>
                    <a href="#">About</a>
                    <a href="shop.html">Shop</a>
                    <a href="#" class="mobile-cart"><i class="fa-solid fa-cart-shopping"></i></a>
                </div>

                <div class="logo">
                    <a href="index.php">
                        <img src="images/logo.png" alt="">
                    </a>
                </div>
                
                <div class="nav-icons">
                    <a href="#"><i class="fa-solid fa-magnifying-glass"></i></a>
                    <a href="#"><i class="fa-solid fa-cart-shopping"></i></a>
                    <a href="#"><i class="fa-regular fa-user"></i></a>
                </div>
            </header>

            <!-- Product Details -->
            <?php
            require_once 'dataLoader.php';
            $visualContentsByProductId = loadVisualContents();
            $visualContentsForProduct = isset($visualContentsByProductId[$productId]) ? $visualContentsByProductId[$productId] : [];
            ?>
            <section id="prodetails" class="section-p1" >
                <div class="single-pro-image" >
                    <img src="images/<?= htmlspecialchars($product->getVisualContent() ? $product->getVisualContent()->getShortName() : 'default.jpg') ?>" id="MainImg" class="main-img">
                    <div class="small-img-wrapper">
                        <button class="arrow left-arrow">&#10094;</button>
                        <div class="small-img-group" id="smallImgGroup">
                            <?php
                            foreach ($visualContentsForProduct as $vc) {
                                $imgEscaped = htmlspecialchars($vc->getShortName());
                                echo '<div class="small-img-col">';
                                echo '<img src="images/' . $imgEscaped . '" class="small-img">';
                                echo '</div>';
                            }
                            ?>
                        </div>
                        <button class="arrow right-arrow">&#10095;</button>
                    </div>
                </div>
                
                <div class="single-pro-details" >
                    <h6>Shop / <?= htmlspecialchars($product->getKeyword()) ?></h6>
                    <h4><?= htmlspecialchars($product->getName()) ?></h4>
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
                    <h2>$<?= htmlspecialchars($product->getPrice()) ?></h2>
                    <select>
                            <option>Select Version</option>
                            <option>WolfChan</option>
                            <option>Leebit</option>
                            <option>Dwaekki</option>
                            <option>Jiniret</option>
                            <option>Han Quokka</option>
                            <option>Bokkari</option>
                            <option>Puppym</option>
                            <option>Fox I.N</option>
                    </select>
                    <input type="number" value="1">
                    <button class="n">Add to Cart</button>
                    <h4>Product Details</h4>
                    <p><?= nl2br(htmlspecialchars($product->getDescription())) ?></p>
                </div>
            </section>

            <!-- Newsletters Section -->
            <section id="newsletter" class="section-p1">
                <div class="newstext">
                    <h4>Sign Up For Newsletters</h4>
                    <p>Get e-mail updates about our latest products and <span>special offers.</span></p>
                </div>
                <div class="form">
                    <input type="text" placeholder="Your email address">
                    <button class="signup">Sign Up</button>
                </div>
            </section>

            <!-- Footer Section -->
            <footer class="section-p1">
                <div class="col">
                    <img class="footer-logo" src="images/logo.png">
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