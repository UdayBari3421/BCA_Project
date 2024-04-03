<?php
    include('admin/config/dbcon.php');
?>

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Uday Gift Shop</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="assets/img/favicon.ico" rel="icon">
    <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
        rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Rubik&display=swap" rel="stylesheet">
    <!-- Vendor CSS Files -->
    <!-- Font Awesome -->
    <link rel="stylesheet" href="assets/plugins/fontawesome-free/css/all.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <link href="assets/vendor/animate.css/animate.min.css" rel="stylesheet">
    <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
    <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
    <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">


    <!-- Template Main CSS File -->
    <link href="assets/css/style.css" rel="stylesheet">
    
</head>

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">
        <div class="container containercpy d-flex align-items-center">

            <h1 class="logo me-auto"><a href="index.html">UGS</a></h1>
            <!-- Uncomment below if you prefer to use an image logo -->
            <!-- <a href="index.html" class="logo me-auto"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->
            <?php 
                $count=0;
                if(isset($_SESSION['cart']))
                {
                    $count = count($_SESSION['cart']);
                }
            ?>
            <nav id="navbar" class="main-header navbar navbar-expand navbar-white navbar-light align-items-center">
                <ul class="navbar-nav">
                    <li style="padding-left:25px;"><a href="index.php" class="nav-item d-none d-sm-inline-block"><i class="fa fas fs-6 fa-home">_</i> Home </a></li>

                    <li style="padding-left:25px;"><a href="contact.php" class="nav-link"><i class="fa fa-solid fa-phone">_</i>Contact</a></li>
                    <li style="padding-left:25px;"><a href="cart.php" class="nav-link"><i class="fas fa-shopping-cart fs-6">Cart (<?= $count; ?>) </i></a></li>
                    <li style="padding-left:25px;"><a href="products-view.php" class="nav-link"><i class="fa fs-6 fa-gift">_</i> Products </a></li>
                    <li class="dropdown">
                        <a href="#" class="getstarted">
                            <span>
                                <?php 
                                  if(isset($_SESSION['auth']))
                                  {
                                    echo $_SESSION['auth_user']['user_name'];
                                  }
                                  else
                                  {
                                    header('location: admin/login.php');
                                  }
                                ?>
                            </span>
                            <i class="bi bi-chevron-down"></i>
                        </a>
                        <ul>
                            <form action="admin/logincode.php" method="POST">
                                <button type="submit" name="userlogout_btn" class="btn btn-sm p-0">
                                    <li><a>Logout</a></li>
                                </button>
                            </form>
                        </ul>
                    </li>
                </ul>
                <i class="bi bi-list mobile-nav-toggle"></i>
            </nav><!-- .navbar -->

        </div>