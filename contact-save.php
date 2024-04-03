<?php
session_start();
include('admin/config/dbcon.php');

if(isset($_POST['contact_btn']))
{
    $email = $_POST['email'];
    $name = $_POST['name'];
    $phone = $_POST['phone'];
    $address = $_POST['user_address'];
    $city = $_POST['city'];
    $pincode = $_POST['pincode'];
    $description = $_POST['description'];

    $cq = " INSERT INTO contacts (email,name,phone,user_address,city,pincode,description) VALUES('$email','$name','$phone','$address','$city','$pincode','$description')";
    $cq_run =mysqli_query($conn,$cq);

    if($cq_run)
    {
        $_SESSION['status'] = "<Script>alert('Thank You. Your Feedback Successfully Subbmited');</Script>";
        header('Location: contact.php');
    }
    else
    {   
        $_SESSION['status'] = "<Script>alert('Failed To Submit your Feedback');</Script>";
        header('Location: contact.php');
    }
}

// Home Contact
if(isset($_POST['home_contact']))
{
    $email = $_POST['email'];

    $cq = " INSERT INTO home_contact (email) VALUES('$email')";
    $cq_run =mysqli_query($conn,$cq);

    if($cq_run)
    {
        $_SESSION['status'] = "<Script>alert('Thank You. We Will Contact Soon');</Script>";
        header('Location: index.php');
    }
    else
    {   
        $_SESSION['status'] = "<Script>alert('Try Again Later');</Script>";
        header('Location: index.php');
    }
}



?>