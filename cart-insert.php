<?php
    session_start();
    $product_name =$_POST['name'];
    $product_price =$_POST['price'];
    $product_quantity =$_POST['quantity'];
    
    if(isset($_POST['add_cart']))
    {
        $check_product = array_column($_SESSION['cart'],'product_name');
        if(in_array($product_name,$check_product))
        {
            echo"
            <script>
            alert('Product Already Added');
            window.location.href = ' products-view.php';
            </script>
            ";
        }
        
        else
        {
            $_SESSION['cart'][] = array(   
                'product_name'=>$product_name,
                'product_price'=>$product_price,
                'product_quantity'=>$product_quantity
            );
            header('location: products-view.php');
        }
        
    }
    ?>

<!-- Remove Item From Cart-->
<?php
    if(isset($_POST['remove']))
    {
        foreach($_SESSION['cart'] as $key => $value)
        {
            if($value['product_name']===$_POST['item'])
            {
                unset($_SESSION['cart'][$key]);
                $_SESSION['cart'] = array_values($_SESSION['cart']);
                header('location: cart.php');
            }
        }
    }
?>
<!-- Update Cart -->
<?php
    if(isset($_POST['update']))
    {
        foreach($_SESSION['cart'] as $key => $value)
        {
            if($value['product_name']===$_POST['item'])
            {
              $_SESSION['cart'][$key] = array(   
                'product_name'=>$product_name,
                'product_price'=>$product_price,
                'product_quantity'=>$product_quantity 
            );
            header('location: cart.php');
            }
        }
    }
?>