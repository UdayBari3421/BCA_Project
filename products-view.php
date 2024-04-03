<?php
    session_start();
    include('main/header.php');
    include('admin/config/dbcon.php');

?>
<?php
    if(isset($_SESSION['status']))
    {
        echo $_SESSION['status'];
        unset($_SESSION['status']);
    }
?>
<link href="assets/css/defined.css" rel="stylesheet">
<div id="catsec">
    <section class="content m-0">
        <div class="container-fluid justify-content-center d-flex">
            <div class="container pt-3 text-center text-dark rounded-pill bg-light" style="max-width:90em;">
                <h1 class="text-center"> Categories</h1>
                <?php
                $sql = "SELECT * FROM `categories`";
                $sql_run = mysqli_query($conn, $sql);
                if(mysqli_num_rows($sql_run)>0)
                {
                    foreach($sql_run as $prod_item) 
                    {
                        ?>
                <div class="row m-2 d-inline-block position-relative justify-content-center" style="max-width:100%">
                    <div class="card text-center bg-info" style="padding-top:5px; width: 15rem;">
                        <div class="card-body">
                            <h5 class="card-title"><a href="products-view.php?cat_id=<?= $prod_item['id']; ?>"
                                    style="color : black; font-weight : bold"><?= $prod_item ['name']; ?></a></h5>
                            </h5>
                        </div>
                    </div>
                </div>
                <?php
                    }
                }
            ?>
            </div>
        </div>
    </section>

    <main id="main">
        <?php
            if(isset($_GET['cat_id']))
            {
                $cat_id = $_GET['cat_id'];
                $qu1 = "SELECT * FROM `products` WHERE `id`='$cat_id' ";
                $qu1_run = mysqli_query($conn, $qu1);
                if(mysqli_num_rows($qu1_run) > 0)
                {
                    $prodItem = mysqli_fetch_array($qu1_run);
        ?>
        <section id="catproducts" class="content bg-transparent text-body">
            <div class="container-fluid justify-content-center d-flex">
                <div class="container text-center" style="max-width:90em;">
                    <?php
                                $sql = "SELECT * FROM `products` WHERE category_id='$cat_id'";
                                $sql_run = mysqli_query($conn, $sql);
                                if(mysqli_num_rows($sql_run)>0)
                                {
                                    foreach($sql_run as $prod_item) 
                                    {
                            ?>
                    <div class="row m-2 d-inline-block position-relative justify-content-center" style="max-width:100%">
                        <form action="cart-insert.php" method="post">
                            <div class="card" style="height:27rem; padding-top:5px; width: 19rem;">
                                <?= '<img src="admin/uploads/products/'.$prod_item ['image'].'" height="200px" width="18rem" class="card-img-top p-1" alt="Card image cap">'; ?>
                                <div class="card-body">
                                    <h5 class="card-title"><a href="#"
                                            style="color : black; font-weight : bold"><?= $prod_item ['name']; ?></a></h5>
                                    <h5 class="card-title"><a href="#" class="text-decoration-line-through"
                                            style="color:Red; font-family: Roboto sans-serif; font-weight:bold">
                                            ₹<?= $prod_item ['offerprice']; ?></a>
                                        <span style="color:Blue; font-family: Roboto sans-serif; font-weight:bold">
                                            ₹<?= $prod_item ['price']; ?></span>
                                    </h5>
                                    <!-- <p class="card-text"><a href="#" style="color:black;"> </a></p> -->
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
            </div>
        </section>

        <?php       
                }
                else
                {
            
            }
        }
    ?>
</div>
<!-- All Products Section -->
    <section class="content">
        <div class="container-fluid justify-content-center d-flex">
            <div class="container" style="max-width:90em;">
            <h1 class="text-center pt-3 pb-3 mt-0 text-dark rounded-pill bg-light" id="allproductshead"> Our Products</h1>
                <?php
                    $sql = "SELECT * FROM `products`";
                    $sql_run = mysqli_query($conn, $sql);
                    if(mysqli_num_rows($sql_run) > 0)
                    {
                        foreach($sql_run as $prod_item) 
                        {
                            ?>
                <div class="row m-2 d-inline-block position-relative justify-content-center" style="max-width:100%">
                    <form action="cart-insert.php" method="post">
                        <div class="card" style="height:27rem; padding-top:5px; width: 19rem;">
                            <?= '<img src="admin/uploads/products/'.$prod_item ['image'].'" height="200px" width="18rem" class="card-img-top p-1" alt="Card image cap">'; ?>
                            <div class="card-body">
                                <h5 class="card-title"><a href="#"
                                        style="color : black; font-weight : bold"><?= $prod_item ['name']; ?></a></h5>
                                <h5 class="card-title"><a href="#" class="text-decoration-line-through"
                                        style="color:Red; font-family: Roboto sans-serif; font-weight:bold">₹<?= $prod_item ['offerprice']; ?></a>
                                    <span style="color:Blue; font-family: Roboto sans-serif; font-weight:bold">
                                    ₹<?= $prod_item ['price']; ?></span>
                                </h5>
                                <!-- <p class="card-text"><a href="#" style="color:black;"> </a></p> -->
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
        </div>
    </section>
</main>

<?php
    include('main/footer.php');
    include('main/scripts.php');
?>