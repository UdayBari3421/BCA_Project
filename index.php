<?php
    session_start();
    include('main/header.php');
    include('main/hero.php');
    include('admin/config/dbcon.php');
    
?>
<?php
    if(isset($_SESSION['status']))
    {
        $_SESSION['status'];
        unset($_SESSION['status']);
    }
?>

<main id="main">
    <section class="content" id="random_products" style="background:#37a5ce7a;">
        <div class="container-fluid justify-content-center d-flex">
        <?php
                    $sql = "SELECT * FROM `products` ORDER BY RAND() LIMIT 4";
                    $sql_run = mysqli_query($conn, $sql);
                    if(mysqli_num_rows($sql_run) > 0)
                    {
                        foreach($sql_run as $prod_item) 
                        {
                            ?>
                <div class="row m-2 d-inline-block position-relative justify-content-center" style="max-width:100%">
                    <form action="cart-insert.php" method="post">
                        <div class="card" style="height:28rem; padding-top:5px; width: 19rem;">
                            <?= '<img src="admin/uploads/products/'.$prod_item ['image'].'" height="200px" width="18rem" class="card-img-top p-1" alt="Card image cap">'; ?>
                            <div class="card-body">
                                <h5 class="card-title"><a href="#"
                                        style="color : black; font-weight : bold"><?= $prod_item ['name']; ?></a></h5>
                                <h5 class="card-title"><a href="#" class="text-decoration-line-through"
                                        style="color:Red; font-family: Roboto sans-serif; font-weight:bold">₹<?= $prod_item ['offerprice']; ?></a>
                                    <span style="color:Blue; font-family: Roboto sans-serif; font-weight:bold">
                                    ₹<?= $prod_item ['price']; ?></span>
                                </h5>
                                <!-- <p class="card-text"><a href="#" style="color:black;"><?= $prod_item ['long_description']; ?> </a></p> -->
                            </div>
                            <div class="card-footer text-center">
                                <input type="hidden" name="name" value="<?= $prod_item ['name']; ?>">
                                <input type="hidden" name="price" value="<?= $prod_item ['price']; ?>">
                                <input type="number" min='1' max='10' value="1" name="quantity" placeholder="Quantity">
                            </div>
                            <div class="card-footer text-center">
                                <input class="btn btn-warning btn-sm" name="buy_btn" type="submit" value="Buy Now">
                                <input class="btn btn-warning btn-sm" name="add_cart" type="submit" value="Add to Cart">
                            </div>
                        </div>
                    </form>
                </div>
                <?php
                        }
                    }
                ?>
        </div>
    </section>

    <!-- ======= Portfolio Section ======= -->
    <section id="portfolio" class="portfolio">
        <div class="container">

            <div class="row">
                <div class="col-lg-12 d-flex justify-content-center">
                    <ul id="portfolio-flters">
                        <li data-filter="*" class="filter-active">All</li>
                        <li data-filter=".filter-birthday">Birthday</li>
                        <li data-filter=".filter-Anniversary">Anniversary</li>
                        <li data-filter=".filter-flowers">Flowers</li>
                        <li data-filter=".filter-plants">Plants</li>
                        <li data-filter=".filter-chocolates">Chocolates</li>
                    </ul>
                </div>
            </div>
                
            <div class="row portfolio-container">

                <div class="col-lg-4 col-md-6 portfolio-item filter-birthday">
                    <div class="portfolio-wrap">
                        <img src="assets/img/portfolio/GIFTS/Birthday/Happy-Birthday-Blutooth-Speaker.jpg"
                            class="img-fluid" alt="">
                        <div class="portfolio-info">
                            <h4>Birthday Blootooth Speaker</h4>
                            <p>Blootooth Speaker for birthday for girl and boys</p>
                            <div class="portfolio-links">
                                <a href="assets/img/portfolio/GIFTS/Birthday/Happy-Birthday-Blutooth-Speaker.jpg"
                                    data-gallery="portfolioGallery" class="portfolio-lightbox"
                                    title="Birthday Blootooth Speaker"><i class="bx bx-plus"></i></a>
                                <a href="portfolio-details.php?prod_id=6" class="portfolio-details-lightbox"
                                    data-glightbox="type: external" title="Details"><i class="bx bx-link"></i></a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6 portfolio-item filter-Anniversary">
                    <div class="portfolio-wrap">
                        <img src="assets/img/portfolio/GIFTS/Anniversary/Anniversary-Photo-Cushion.jpg"
                            class="img-fluid" alt="">
                        <div class="portfolio-info">
                            <h4>Couple Photo Cushion</h4>
                            <p>Couple Photo Cushion for Love Couple and Valantine</p>
                            <div class="portfolio-links">
                                <a href="assets/img/portfolio/GIFTS/Anniversary/Anniversary-Photo-Cushion.jpg"
                                    data-gallery="portfolioGallery" class="portfolio-lightbox"
                                    title="Couple Photo Cushion"><i class="bx bx-plus"></i></a>
                                <a href="portfolio-details.php?prod_id=7" class="portfolio-details-lightbox"
                                    data-glightbox="type: external" title="Details"><i class="bx bx-link"></i></a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6 portfolio-item filter-flowers">
                    <div class="portfolio-wrap">
                        <img src="assets/img/portfolio/GIFTS/Flowers/Heart-Shpaed-Pink-Red-Roses.jpg" class="img-fluid"
                            alt="">
                        <div class="portfolio-info">
                            <h4>Heart Shape Pink Roses</h4>
                            <p>Heart Shape Light Pink With Dark Pink Roses</p>
                            <div class="portfolio-links">
                                <a href="assets/img/portfolio/GIFTS/Flowers/Heart-Shpaed-Pink-Red-Roses.jpg"
                                    data-gallery="portfolioGallery" class="portfolio-lightbox"
                                    title="Heart Shpaed Pink Red Roses"><i class="bx bx-plus"></i></a>
                                <a href="portfolio-details.php?prod_id=18" class="portfolio-details-lightbox"
                                    data-glightbox="type: external" title="Details"><i class="bx bx-link"></i></a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6 portfolio-item filter-plants">
                    <div class="portfolio-wrap">
                        <img src="assets/img/portfolio/GIFTS/Plants/Indoor-Plant-for-Home-Pot.jpg" class="img-fluid"
                            alt="">
                        <div class="portfolio-info">
                            <h4>Indoor Plant for Home Pot</h4>
                            <p>Indoor Plant for Home Pot</p>
                            <div class="portfolio-links">
                                <a href="assets/img/portfolio/GIFTS/Plants/Indoor-Plant-for-Home-Pot.jpg"
                                    data-gallery="portfolioGallery" class="portfolio-lightbox"
                                    title="Indoor Plant for Home Pot"><i class="bx bx-plus"></i></a>
                                <a href="portfolio-details.php?prod_id=24" class="portfolio-details-lightbox"
                                    data-glightbox="type: external" title="Details"><i class="bx bx-link"></i></a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6 portfolio-item filter-flowers">
                    <div class="portfolio-wrap">
                        <img src="assets/img/portfolio/GIFTS/Flowers/Colossal-Red-Roses-Arranged.jpg" class="img-fluid"
                            alt="">
                        <div class="portfolio-info">
                            <h4>Colossal Red Roses</h4>
                            <p>Colossal Red Roses Arranged For Birthday and Anniversary</p>
                            <div class="portfolio-links">
                                <a href="assets/img/portfolio/GIFTS/Flowers/Colossal-Red-Roses-Arranged.jpg"
                                    data-gallery="portfolioGallery" class="portfolio-lightbox"
                                    title="Colossal Red Roses Arranged"><i class="bx bx-plus"></i></a>
                                <a href="portfolio-details.php?prod_id=17" class="portfolio-details-lightbox"
                                    data-glightbox="type: external" title="Details"><i class="bx bx-link"></i></a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6 portfolio-item filter-birthday">
                    <div class="portfolio-wrap">
                        <img src="assets/img/portfolio/GIFTS/Birthday/Wooden-Pen-Calender-Clock-Stand.jpg"
                            class="img-fluid" alt="">
                        <div class="portfolio-info">
                            <h4>Birthday Glow Lamp</h4>
                            <p>Birthday Glow Lamp For Birthday For Boys And Girls</p>
                            <div class="portfolio-links">
                                <a href="assets/img/portfolio/GIFTS/Birthday/Wooden-Pen-Calender-Clock-Stand.jpg"
                                    data-gallery="portfolioGallery" class="portfolio-lightbox"
                                    title="Birthday Glow Lamp"><i class="bx bx-plus"></i></a>
                                <a href="portfolio-details.php?prod_id=5" class="portfolio-details-lightbox"
                                    data-glightbox="type: external" title="Details"><i class="bx bx-link"></i></a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6 portfolio-item filter-chocolates">
                    <div class="portfolio-wrap">
                        <img src="assets/img/portfolio/GIFTS/Chocolates/Adorable-Teddy-Dark-Chocolate-Delight.jpg"
                            class="img-fluid" alt="">
                        <div class="portfolio-info">
                            <h4>Adorable Teddy Dark Chocolate Delight</h4>
                            <p>Adorable Teddy Dark Chocolate Delight For Fresh Mood</p>
                            <div class="portfolio-links">
                                <a href="assets/img/portfolio/GIFTS/Chocolates/Adorable-Teddy-Dark-Chocolate-Delight.jpg"
                                    data-gallery="portfolioGallery" class="portfolio-lightbox"
                                    title="Adorable Teddy Dark Chocolate Delight"><i class="bx bx-plus"></i></a>
                                <a href="portfolio-details.php?prod_id=13" class="portfolio-details-lightbox"
                                    data-glightbox="type: external" title="Details"><i class="bx bx-link"></i></a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6 portfolio-item filter-Anniversary">
                    <div class="portfolio-wrap">
                        <img src="assets/img/portfolio/GIFTS/Anniversary/Cuple-Anniversary-Led.jpg" class="img-fluid"
                            alt="">
                        <div class="portfolio-info">
                            <h4>Couple LED Photo Frame</h4>
                            <p>Couple Photo LED display photo frame</p>
                            <div class="portfolio-links">
                                <a href="assets/img/portfolio/GIFTS/Anniversary/Cuple-Anniversary-Led.jpg"
                                    data-gallery="portfolioGallery" class="portfolio-lightbox"
                                    title="Couple LED Photo Frame"><i class="bx bx-plus"></i></a>
                                <a href="portfolio-details.php?prod_id=8" class="portfolio-details-lightbox"
                                    data-glightbox="type: external" title="Details"><i class="bx bx-link"></i></a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6 portfolio-item filter-plants">
                    <div class="portfolio-wrap">
                        <img src="assets/img/portfolio/GIFTS/Plants/I-love-You-Money-Plant.jpg" class="img-fluid"
                            alt="">
                        <div class="portfolio-info">
                            <h4>I love You Money Plant</h4>
                            <p>I love You Money Plant For Show Case</p>
                            <div class="portfolio-links">
                                <a href="assets/img/portfolio/GIFTS/Plants/I-love-You-Money-Plant.jpg"
                                    data-gallery="portfolioGallery" class="portfolio-lightbox"
                                    title="I love You Money Plant"><i class="bx bx-plus"></i></a>
                                <a href="portfolio-details.php?prod_id=23" class="portfolio-details-lightbox"
                                    data-glightbox="type: external" title="Details"><i class="bx bx-link"></i></a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6 portfolio-item filter-chocolates">
                    <div class="portfolio-wrap">
                        <img src="assets/img/portfolio/GIFTS/Chocolates/Best-Combo-For-Love.jpg" class="img-fluid"
                            alt="">
                        <div class="portfolio-info">
                            <h4>Best Combo Chocolate</h4>
                            <p>Best Chocolate Combo for love</p>
                            <div class="portfolio-links">
                                <a href="assets/img/portfolio/GIFTS/Chocolates/Best-Combo-For-Love.jpg"
                                    data-gallery="portfolioGallery" class="portfolio-lightbox"
                                    title="Best Combo Chocolate"><i class="bx bx-plus"></i></a>
                                <a href="portfolio-details.php?prod_id=14" class="portfolio-details-lightbox"
                                    data-glightbox="type: external" title="Details"><i class="bx bx-link"></i></a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6 portfolio-item filter-birthday">
                    <div class="portfolio-wrap">
                        <img src="assets/img/portfolio/GIFTS/Birthday/Birthday-Glow-Lamp.jpg" class="img-fluid" alt="">
                        <div class="portfolio-info">
                            <h4>Birthday Glow Lamp</h4>
                            <p>Birthday Glow Lamp For Birthday For Boys And Girls</p>
                            <div class="portfolio-links">
                                <a href="assets/img/portfolio/GIFTS/Birthday/Birthday-Glow-Lamp.jpg"
                                    data-gallery="portfolioGallery" class="portfolio-lightbox"
                                    title="Birthday Glow Lamp"><i class="bx bx-plus"></i></a>
                                <a href="portfolio-details.php?prod_id=1" class="portfolio-details-lightbox"
                                    data-glightbox="type: external" title="Details"><i class="bx bx-link"></i></a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6 portfolio-item filter-Anniversary">
                    <div class="portfolio-wrap">
                        <img src="assets/img/portfolio/GIFTS/Anniversary/Ring.jpg" class="img-fluid" alt="">
                        <div class="portfolio-info">
                            <h4>Engagement Ring</h4>
                            <p>Anniversary, Engagement And Wedding Ring For Couple</p>
                            <div class="portfolio-links">
                                <a href="assets/img/portfolio/GIFTS/Anniversary/Ring.jpg"
                                    data-gallery="portfolioGallery" class="portfolio-lightbox"
                                    title="Engagement Ring"><i class="bx bx-plus"></i></a>
                                <a href="portfolio-details.php?prod_id=9" class="portfolio-details-lightbox"
                                    data-glightbox="type: external" title="Details"><i class="bx bx-link"></i></a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6 portfolio-item filter-flowers">
                    <div class="portfolio-wrap">
                        <img src="assets/img/portfolio/GIFTS/Flowers/Red-Rose-Box.jpg" class="img-fluid" alt="">
                        <div class="portfolio-info">
                            <h4>Red Rose Box</h4>
                            <p>Red Rose Box for couple and birthday wish</p>
                            <div class="portfolio-links">
                                <a href="assets/img/portfolio/GIFTS/Flowers/Red-Rose-Box.jpg"
                                    data-gallery="portfolioGallery" class="portfolio-lightbox" title="Red Rose Box"><i
                                        class="bx bx-plus"></i></a>
                                <a href="portfolio-details.php?prod_id=19" class="portfolio-details-lightbox"
                                    data-glightbox="type: external" title="Details"><i class="bx bx-link"></i></a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6 portfolio-item filter-plants">
                    <div class="portfolio-wrap">
                        <img src="assets/img/portfolio/GIFTS/Plants/Beautiful-Aglaonema.jpg" class="img-fluid" alt="">
                        <div class="portfolio-info">
                            <h4>Beautiful Aglaonema</h4>
                            <p>Aglaonema Colorful & Easy-to-Care</p>
                            <div class="portfolio-links">
                                <a href="assets/img/portfolio/GIFTS/Plants/Beautiful-Aglaonema.jpg"
                                    data-gallery="portfolioGallery" class="portfolio-lightbox"
                                    title="Beautiful Aglaonema"><i class="bx bx-plus"></i></a>
                                <a href="portfolio-details.php?prod_id=22" class="portfolio-details-lightbox"
                                    data-glightbox="type: external" title="Details"><i class="bx bx-link"></i></a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6 portfolio-item filter-chocolates">
                    <div class="portfolio-wrap">
                        <img src="assets/img/portfolio/GIFTS/Chocolates/Dairy-Milk-Chocolate-Basket.jpg"
                            class="img-fluid" alt="">
                        <div class="portfolio-info">
                            <h4>Dairy Milk Chocolate Basket</h4>
                            <p>Dairy Milk Chocolate Basket For Gift and Eat</p>
                            <div class="portfolio-links">
                                <a href="assets/img/portfolio/GIFTS/Chocolates/Dairy-Milk-Chocolate-Basket.jpg"
                                    data-gallery="portfolioGallery" class="portfolio-lightbox"
                                    title="Dairy Milk Chocolate Basket"><i class="bx bx-plus"></i></a>
                                <a href="portfolio-details.php?prod_id=12" class="portfolio-details-lightbox"
                                    data-glightbox="type: external" title="Details"><i class="bx bx-link"></i></a>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>
    </section><!-- End Portfolio Section -->
</main><!-- End #main -->


<?php
   include('main/footer.php');
   include('main/scripts.php'); 
?>