<?php
session_start();
include('admin/config/dbcon.php');

if(isset($_POST['contact_btn']))
{
    $order_id = $_POST['order_id'];
    $email = $_POST['email'];
    $name = $_POST['name'];
    $phone = $_POST['phone'];
    $address = $_POST['user_address'];
    $city = $_POST['city'];
    $pincode = $_POST['pincode'];
    $total = $_POST['total'];

    $cq = " INSERT INTO `orders` (order_id,email,name,phone,address,city,pincode,total) VALUES('$order_id','$email','$name','$phone','$address','$city','$pincode','$order_id')";
    $cq_run =mysqli_query($conn,$cq);

    if($cq_run)
    {
        $_SESSION['status'] = "<Script>alert('Order Placed Successfully');</Script>";
        header('Location: index.php');
    }
    else
    {   
        $_SESSION['status'] = "<Script>alert('Fail To Place Your Order');</Script>";
        header('Location: index.php');
    }
}
?>