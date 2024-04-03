<?php
    include('admin/config/dbcon.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Portfolio Details - Sailor Bootstrap Template</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="assets/img/favicon.png" rel="icon">
    <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
        rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="assets/vendor/animate.css/animate.min.css" rel="stylesheet">
    <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
    <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
    <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="assets/css/style.css" rel="stylesheet">

    <!-- =======================================================
  * Template Name: Sailor - v4.10.0
  * Template URL: https://bootstrapmade.com/sailor-free-bootstrap-theme/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>


    <main id="main">

        <!-- ======= Portfolio Details Section ======= -->
        <section id="portfolio-details" class="portfolio-details">
            <div class="container">

                <div class="row gy-4">
<?php
    if(isset($_GET['prod_id']))
    {
        $product_id = $_GET['prod_id'];
        $query = "SELECT * FROM `products` WHERE `id`='$product_id' ";
        $query_run = mysqli_query($conn, $query);
        if(mysqli_num_rows($query_run) > 0)
        {
            $prodItem = mysqli_fetch_array($query_run);
            ?>
                    <div class="col-lg-8">
                        <?php echo '<img src="admin/uploads/products/'.$prodItem ['image'].'" style="width:80%;" alt="Image Unavailable">'; ?>
                    </div>

                    <div class="col-lg-4">
                        <div class="portfolio-info">
                            <h3><?php echo $prodItem['name'] ?></h3>
                            <?php 
                                $qu = "SELECT * FROM categories LIMIT 1";
                                $qu_run = mysqli_query($conn, $qu);

                                if(mysqli_num_rows($qu_run) > 0)
                                {
                                    foreach($qu_run as $cat)
                                    { 
                                        ?>
                                            <ul>
                                                <li><strong>Category</strong>: <?= $prodItem['category_id']; ?></li>
                                                <li><h5 style="font-family:Arial;"><strong>Price</strong>: ₹<?= $prodItem['price'] ?></h5></li>
                                            </ul>
                                        <?php
                                    }
                                }
                            ?>
                        </div>
                        <div class="portfolio-description">
                            <h2><?= $prodItem['name'] ?></h2>
                            <p>
                            <?= $prodItem['long_description'] ?>
                            </p>
                        </div>
                    </div>

                </div>

            </div>
        </section>
        <!-- End Portfolio Details Section -->

    </main>
    <?php

    }
    else
    {
        echo "No Such Products Found";
    }
}
?>
    <!-- End #main -->

    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>

    <!-- Vendor JS Files -->
    <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
    <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
    <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
    <script src="assets/vendor/waypoints/noframework.waypoints.js"></script>
    <script src="assets/vendor/php-email-form/validate.js"></script>

    <!-- Template Main JS File -->
    <script src="assets/js/main.js"></script>

</body>

</html>
