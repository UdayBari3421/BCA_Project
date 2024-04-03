<?php
session_start();
    include('admin/config/dbcon.php');
    include('main/header.php');

?>
<link href="assets/css/defined1.css" rel="stylesheet">
<section class="content" id="cart">
    <main id="main">
        <section class="section">
            <div class="col-md-12 d-flex justify-content-center">
                <div class="col-lg-8">
                    <form action="order-save.php" method="POST" class="fm justify-content-center">
                        <h2 class="text-center"><span> CHECKOUT</span> DETAILS</h2>
                        <hr>
                        <div class="form-row row">
                            <div class="col-md-12">
                                <table class="table text-white font-weight-bold table-striped table-hover text-center">
                                    <thead>
                                        <th>Order No</th>
                                        <th>Product Name</th>
                                        <th>Product Price</th>
                                        <th>Quantity</th>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $ptotal = 0;
                                        $index = rand(1,1000);
                                        $total = 0;
                                        if (isset($_SESSION['cart'])) 
                                        {
                                            foreach ($_SESSION['cart'] as $key => $value) {
                                                $ptotal = $value['product_price'] * $value['product_quantity'];
                                                $total += $value['product_price'] * $value['product_quantity'];
                                                ?>
                                        <tr>
                                            <td style="color:white; font-weight:bolder;">#OD<?= $index ?></td>
                                            <td style="color:white; font-weight:bolder;"><?= $value['product_name']; ?>
                                            </td>
                                            <td style="color:white; font-weight:bolder;">
                                                ₹<?= $value['product_price'];  ?></td>
                                            <td style="color:white; font-weight:bolder;">
                                                <?= $value['product_quantity'];  ?></td>
                                        </tr>
                                        <?php
                                            }
                                        }
                                    ?>
                                    </tbody>
                                </table>
                                <table class="table text-white table-striped table-hover text-center">
                                    <thead>
                                        <th style="color:white;">Grand Total : ₹<?= $total;?></th>
                                        <input type="hidden" name="total" value="₹<?= $total;?>">
                                        <input type="hidden" name="order_id" value="<?= $index;?>">
                                    </thead>
                                </table>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-12">
                                <label>Email</label>
                                <input type="email" name="email" value="<?= $_SESSION['auth_user']['user_email'];?>"
                                    class="form-control" id="inputEmail4" placeholder="Email">
                            </div>
                            <div class="form-group col-md-12">
                                <label>Name</label>
                                <input type="text" name="name" value="<?= $_SESSION['auth_user']['user_name'];?>"
                                    class="form-control" placeholder="Enter Your Name">
                            </div>
                            <div class="form-group col-md-12">
                                <label>Phone</label>
                                <input type="number" name="phone" value="<?= $_SESSION['auth_user']['user_phone'];?>" class="form-control" placeholder="Enter Your Mobile No">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-12">
                                <label>Address</label>
                                <input type="text" name="user_address" value="<?= $_SESSION['auth_user']['user_address'];?>" class="form-control" placeholder="Address">
                            </div>
                        </div>
                        <div class="form-row row">
                            <div class="form-group col-md-6">
                                <label>City</label>
                                <input type="text" name="user_city" value="<?= $_SESSION['auth_user']['user_city'];?>" class="form-control" placeholder="Enter Your City">
                            </div>
                            <div class="form-group col-md-6">
                                <label>Pincode</label>
                                <input type="text" name="user_pincode" value="<?= $_SESSION['auth_user']['user_pincode'];?>" class="form-control" placeholder="Enter Your Pincode">
                            </div>
                        </div>

                        <div class="row m-5 justify-content-center">
                            <div class="col-md-4 text-center">
                                <button type="submit" name="contact_btn" class="btn btn-success">Place Order</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </section>
    </main>
</section>

<?php
    include('main/scripts.php');
?>