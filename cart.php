<?php
session_start();
include('main/header.php');
include('admin/config/dbcon.php');

?>
<?php
if (isset($_SESSION['status'])) {
    echo $_SESSION['status'];
    unset($_SESSION['status']);
}
?>
<section class="content" id="cart">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 rounded-pill text-center mb-5 bg-dark text-white rounded">
                <h1 class="pt-2 pb-2">MY CART</h1>
            </div>
        </div>
    </div>
    <div class="container-fluid">
        <div class="row justify-content-around">
            <div class="col-sm-12 col-md-6 col-lg-8">
                <table class="table table-striped table-hover text-center">
                    <thead class="bg-danger text-white rounded fs-5">
                        <th>Index</th>
                        <th>Product Name</th>
                        <th>Product Price</th>
                        <th>Quantity</th>
                        <th>Total Price</th>
                        <th>Update</th>
                        <th>Delete</th>
                    </thead>
                    <tbody>
                        <?php
                        $ptotal = 0;
                        $total = 0;
                        if (isset($_SESSION['cart'])) {
                            foreach ($_SESSION['cart'] as $key => $value) {
                                $ptotal = $value['product_price'] * $value['product_quantity'];
                                $total += $value['product_price'] * $value['product_quantity'];
                                echo "
                                            <form action ='cart-insert.php' method='POST'>
                                                <tr>
                                                    <td> $key</td>
                                                    <td> <input type='hidden' name='name' value='$value[product_name]'>$value[product_name]</td>
                                                    <td> <input type='hidden' name='price' value='$value[product_price]'>₹ $value[product_price]</td>
                                                    <td> <input style=width:50px; type='number' name='quantity' min='1' max='10' value='$value[product_quantity]'></td>
                                                    <td> ₹ $ptotal</td>
                                                    <td><button name='update' class='btn btn-warning'>Update</button></td>
                                                    <td><button name='remove' class='btn btn-danger'>Delete</button></td>
                                                    <input type='hidden' name='item' value='$value[product_name]'>
                                                    <input type='hidden' name='ptotal' value='$total'>
                                                </tr>
                                            </form>
                                        ";
                            }
                        }
                        ?>
                    </tbody>
                </table>
            </div>
            <div class="col-md-4 justify-content-center text-center border border-dark rounded p-3 mt-auto mb-auto"
                style="height:180px;">
                <h3>Grand Total</h3>
                <h1 class="bg-success text-white pt-2 pb-2 rounded-pill" style="font-family:Arial">₹
                    <?php echo number_format($total); ?>
                </h1>
            </div>
            <hr class="mt-5 mb-5">
            <div class="row">
                <div class="col-md-8">
                    <a href="products-view.php" class="btn btn-md btn-success m-3 float-right"><i
                            class="fa fa-shopping-bag"></i> Continue Shopping</a>
                </div>
                <div class="text-end col-md-4 justify-content-right">
                    <a href="caddress.php" type="submit" name="checkout_btn" class="btn btn-md btn-primary m-3"><i
                            class="fas fa-shopping-cart fs-6"></i>Checkout</a>
                </div>
            </div>
            <hr class="mt-5 mb-2">
        </div>

    </div>
</section>

<?php
include('main/footer.php');
include('main/scripts.php');
?>