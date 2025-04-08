

<?php
    require 'config.php';
    if(!empty($_SESSION["id"])){
        $id = $_SESSION["id"];
        $result = mysqli_query($conn, "SELECT * FROM tb_users WHERE id = $id");
        $row = mysqli_fetch_assoc($result);

    }
    else{
        header("Location: login.php");
    }
?>  
   
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Online Shop</title>
    <link rel="stylesheet" href="styles.css">
    <link rel="icon" href="favicon.ico">
</head>
<body>

    <!-- Header Section --> 
    <header class="header">
        <nav>
            <div class="logo">
                <h1>ShopWithUs</h1>
                <h4 style="color: white; font-size: 14px; padding: 10px; ">You are signed in as  <?php echo $row["name"];?></h4>
                
            </div>
            <ul class="nav-links">
                <li><a href="#home">Home</a></li>
                <li><a href="#products">Products</a></li>
                <li><a href="#about">About</a></li>
                <li><a href="#contact">Contact</a></li>
                <li><a href="#cart">Cart</a></li>`
                <li><a href="logout.php">Log Out</a></li>
            </ul>
        </nav>
    </header>

    <!-- Hero Section -->
    <section id="home" class="hero">
        <div class="hero-content">
        <h2>Welcome to ShopWithUs</h2>
            <p>Your one-stop shop for the best products online</p>
            <a href="#products" class="cta-btn">Shop Now</a>
        </div>
    </section>

    <!-- Featured Products Section -->
    <section id="products" class="products">
        <h2>Featured Products</h2>
        <div class="product-cards">
            <div class="product-card">
                <img src="img9.jpg" alt="Product 1">
                <h3>Product Name</h3>
                <p>99.99</p>
                <a href="#" class="add-to-cart">Add to Cart</a>
            </div>
            <div class="product-card">
                <img src="img8.jpg" alt="Product 2">
                <h3>Product Name</h3>
                <p>129.99</p>
                <a href="#" class="add-to-cart">Add to Cart</a>
            </div>
            <div class="product-card">
                <img src="img7.jpg" alt="Product 3">
                <h3>Product Name</h3>
                <p>$79.99</p>
                <a href="#" class="add-to-cart">Add to Cart</a>
            </div>
            <div class="product-card">
                <img src="img6.jpg" alt="Product 1">
                <h3>Product Name</h3>
                <p>99.99</p>
                <a href="#" class="add-to-cart">Add to Cart</a>
            </div>
            <div class="product-card">
                <img src="img5.jpg" alt="Product 2">
                <h3>Product Name</h3>
                <p>129.99</p>
                <a href="#" class="add-to-cart">Add to Cart</a>
            </div>
            <div class="product-card">
                <img src="img4.jpg" alt="Product 3">
                <h3>Product Name</h3>
                <p>$79.99</p>
                <a href="#" class="add-to-cart">Add to Cart</a>
            </div>
            <div class="product-card">
                <img src="img3.jpg" alt="Product 1">
                <h3>Product Name</h3>
                <p>99.99</p>
                <a href="#" class="add-to-cart">Add to Cart</a>
            </div>
            <div class="product-card">
                <img src="img2.jpg" alt="Product 2">
                <h3>Product Name</h3>
                <p>129.99</p>
                <a href="#" class="add-to-cart">Add to Cart</a>
            </div>
            <div class="product-card">
                <img src="img1.jpg" alt="Product 3">
                <h3>Product Name</h3>
                <p>$79.99</p>
                <a href="#" class="add-to-cart">Add to Cart</a>
            </div>
        </div>
    </section>

    <!-- Sale Section -->
    <section class="sale">
        <h2>Seasonal Sale</h2>
        <p>Up to 50% off on selected products! Hurry, don't miss out!</p>
        <a href="#products" class="cta-btn">Shop Sale</a>
    </section>

    <!-- About Section -->
    <section id="about" class="about">
        <h2>About Us</h2>
        <p>We offer high-quality products at affordable prices. We are passionate about providing the best online shopping experience.</p>
        <a href="#contact" class="cta-btn">Learn More</a>
    </section>

    <!-- Contact Section -->
    <section id="contact" class="contact">
        <h2>Contact Us</h2>
        <p>If you have any questions, feel free to reach out to us. We're happy to help!</p>
        <a href="mailto:emiliomurithi4@gmail.com" class="cta-btn">Contact Us</a>
    </section>

    <!-- Footer Section -->
    <footer class="footer">
        <div class="social-media">
            <a href="https://www.facebook.com/profile.php?id=100079760134483"><i class="fab fa-facebook fa-3x"></i></a>
            <a href="https://wa.me/254796031071?text=Hello%20there!%20I%20need%20help%20from%20your%20website." target="_blank"><i class="fab fa-whatsapp fa-3x"></i></a>
            <a href="https://twitter.com"><i class="fab fa-twitter fa-3x"></i></a>
            
        </div>
        <p>&copy; 2025 ShopWithUs | All Rights Reserved</p>
    </footer>

</body>
</html>


