<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Online Quran Store</title>

<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
<link rel="stylesheet" href="style.css">
</head>

<body>

<header class="header">

    <!-- LOGO -->
    <a href="index.php" class="logo">
        Online <span>Quran</span> Store
    </a>

    <!-- NAVBAR -->
    <nav class="navbar">
        <a href="#home">Home</a>
        <a href="#features">Features</a>
        <a href="#products">Qurans</a>
        <a href="#review">Reviews</a>
        <a href="#contact">Contact</a>
    </nav>

    <!-- RIGHT SIDE AREA -->
    <div class="header-right">

        <?php if(isset($_SESSION['user_id'])){ ?>
            <span class="user-name">
                <i class="fa fa-user"></i> <?= $_SESSION['user_name']; ?>
            </span>
            <a href="logout.php" class="btn-login">Logout</a>
        <?php } else { ?>
            <a href="login.php" class="btn-login">Login</a>
            <a href="register.php" class="btn-register">Register</a>
        <?php } ?>

        <a href="cart.php" class="cart-icon">
            <i class="fas fa-shopping-cart"></i>
        </a>

    </div>

</header>

<!-- rest of your page SAME rahega --> 

<!-- ================= HOME ================= -->  
<section class="home" id="home">  
    <div class="content">  
        <h3>Holy Quran</h3>  
        <span>Color-Coded • Tajweed • Translation</span>  
        <p>Learn, read and order authentic Qurans with tajweed rules and translations.</p>  
        <a href="#products" class="btn">Shop Now</a>  
    </div>  
</section>  

<!-- ================= ICON FEATURES ================= -->  
<section class="icons-container" id="features">  

    <div class="icons">  
        <i class="fas fa-truck"></i>  
        <div class="info">  
            <h3>Free Delivery</h3>  
            <span>On all Quran orders</span>  
        </div>  
    </div>  

    <div class="icons">  
        <i class="fas fa-rotate-left"></i>  
        <div class="info">  
            <h3>Easy Returns</h3>  
            <span>7 days guarantee</span>  
        </div>  
    </div>  

    <div class="icons">  
       <i class="fas fa-shield-halved"></i>  
        <div class="info">  
            <h3>Authentic Prints</h3>  
            <span>Verified by scholars</span>  
        </div>  
    </div>  

    <div class="icons">  
        <i class="fas fa-lock"></i>  
        <div class="info">  
            <h3>Secure Payment</h3>  
            <span>100% safe</span>  
        </div>  
    </div>  

</section>  

<!-- ================= PRODUCTS ================= -->  
<section class="products" id="products">  

<h1 class="heading"> Our <span>Qurans</span> </h1>  

<div class="box-container">  

<?php  
include("config.php");  
$query = "SELECT * FROM qurans";  
$result = mysqli_query($conn, $query);  
while ($row = mysqli_fetch_assoc($result)) {  
?>  

<div class="box">  

    <span class="discount">-<?php echo $row['discount']; ?>%</span>  

    <div class="image">  
        <img src="admin/uploads/<?php echo $row['image']; ?>">  

        <div class="icons">  
            <a href="#" class="fas fa-heart"></a>  
            <a href="cart_add.php?id=<?php echo $row['id']; ?>" class="cart-btn">Add to Cart</a>  
            <a href="#" class="fas fa-share"></a>  
        </div>  
    </div>  

    <div class="content">  
        <h3><?php echo $row['title']; ?></h3>  
        <div class="price">
            Rs. <?php echo $row['price']; ?>  
            <span>Rs. <?php echo $row['old_price']; ?></span>  
        </div>  
    </div>  

</div>  

<?php } ?>  

</div>  
</section>  

<!-- ================= REVIEW ================= -->  
<section class="review" id="review">  
<h1 class="heading"> Student <span>Reviews</span> </h1>  
<div class="box-container">  
<div class="box">  
<div class="stars">  
<i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i>  
</div>  
<p>Very clear printing and helpful for learning tajweed.</p>  
<div class="user">  
<img src="images/pic-1.png">  
<div class="user-info"><h3>Ayesha</h3><span>Quran Student</span></div>  
</div>  
<span class="fas fa-quote-right"></span>  
</div>  
</div>  
</section>  

<!-- ================= CONTACT ================= -->  
<section class="contact" id="contact">  
<h1 class="heading"><span>Contact</span> Us</h1>  
<div class="row">  
<form>  
<input type="text" placeholder="Your Name" class="box">  
<input type="email" placeholder="Your Email" class="box">  
<input type="number" placeholder="Phone Number" class="box">  
<textarea placeholder="Message" class="box"></textarea>  
<input type="submit" value="Send Message" class="btn">  
</form>  
<div class="image"><img src="images/contact-img.svg"></div>  
</div>  
</section>  

<!-- ================= FOOTER ================= -->  
<section class="footer">  
<div class="box-container">  
<div class="box">  
<h3>Quick Links</h3>  
<a href="#home">Home</a>  
<a href="#products">Qurans</a>  
<a href="#review">Reviews</a>  
<a href="#contact">Contact</a>  
</div>  
<div class="box">  
<h3>Contact Info</h3>  
<a href="#">+92 300 1234567</a>  
<a href="#">quranstore@gmail.com</a>  
<a href="#">Pakistan</a>  
<img src="images/payment.png">  
</div>  
</div>  
<a href="admin/index.php">Admin panel</a>  
</section>  
<script src="script.js"></script>  
</body>  
</html>