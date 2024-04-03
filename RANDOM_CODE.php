<?php
    $ptotal = 0;
    $total = 0;
    if (isset($_SESSION['cart'])) {
        foreach ($_SESSION['cart'] as $key => $value) {
            $total += $value['product_price'] * $value['product_quantity'];
            echo $total;
        }
    }
?>