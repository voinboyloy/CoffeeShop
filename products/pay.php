<?php require "../includes/header.php"; ?>
<?php require "../config/config.php"; ?>
<?php

if(!isset($_SERVER['HTTP_REFERER'])){
    // redirect them to your desired location
    header('location: http://localhost/CoffeeShop');
    exit;
}

if(!isset($_SESSION['user_id'])) {
    header("location: ".APPURL."");
    exit;
}

?>
<section class="home-slider owl-carousel">
    <div class="slider-item" style="background-image: url(<?php echo APPURL; ?>/images/bg_3.jpg);" data-stellar-background-ratio="0.5">
        <div class="overlay"></div>
        <div class="container">
            <div class="row slider-text justify-content-center align-items-center">
                <div class="col-md-7 col-sm-12 text-center ftco-animate">
                    <h1 class="mb-3 mt-5 bread">Confirm Order</h1>
                    <p class="breadcrumbs">
                        <span class="mr-2"><a href="<?php echo APPURL; ?>">Home</a></span>
                        <span>Confirm Order</span>
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>

<div class="container text-center" style="margin-top: 50px; margin-bottom: 100px;">
    <h2>Total Price: $<?php echo $_SESSION['total_price']; ?></h2>
    <a href="delete-cart.php" class="btn btn-primary mt-4">Confirm Order</a>
</div>

<?php require "../includes/footer.php"; ?>
