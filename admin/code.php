<?php
session_start();
include('config/dbcon.php');
include('authentication.php');

// Add Category
if(isset($_POST['category_save']))
{
    $name = $_POST['name'];
    $description = $_POST['description'];
    $trending = $_POST['trending'] == true? '1': '0';
    $status = $_POST['status'] == true? '1': '0';

    $query = " INSERT INTO categories (name,description,trending,status) VALUES ('$name','$description','$trending','$status')";
    $c_query_run = mysqli_query($conn, $query);

    if($c_query_run)
    {
        $_SESSION['status'] = "Category Inserted Sucessfully.";
        header('Location: category.php');
    }
    else
    {
        $_SESSION['status'] = "Category Insertion FAILED.!";
        header('Location: category.php');
    }
}

// Update Category
if(isset($_POST['category_update']))
{
    $cate_id = $_POST['cate_id'];
    $name = $_POST['name'];
    $description = $_POST['description'];
    $trending = $_POST['trending'] == true ? '1':'0';
    $status = $_POST['status'] == true ? '1':'0';
    
    $query = "UPDATE `categories` SET `name`='$name',`description`='$description',`trending`='$trending',`status`='$status' WHERE `id`='$cate_id' ";
    $query_run = mysqli_query($conn, $query);

    if($query_run)
    {
        $_SESSION['status'] = "Category Updated Sucessfully.";
        header('Location: category.php');
    }
    else
    {
        $_SESSION['status'] = "Category Updating FAILED.!";
        header('Location: category.php');
    }
}

// Delete Category
if(isset($_POST['cate_delete_btn']))
{
    $cate_id = $_POST['cate_delete_id'];
    $delete_query = "DELETE FROM `categories` WHERE `id`='$cate_id'";

    $delete_query_run = mysqli_query($conn, $delete_query);

    if($delete_query_run)
    {
        $_SESSION['status'] = "Category Deleted Sucessfully.";
        header('Location: category.php');
    }
    else
    {
        $_SESSION['status'] = "Category Deleting FAILED.!";
        header('Location: category.php');
    }
}

//Add products in Database 
if(isset($_POST['products_save']))
{
    $category_id = $_POST['category_id'];
    $name = $_POST['name'];
    $small_description = $_POST['small_description'];
    $long_description = $_POST['long_description'];
    $price = $_POST['price'];
    $offerprice = $_POST['offerprice'];
    $quantity = $_POST['quantity'];
    $status = $_POST['status'] == true ? '1' : '0';
    $image = $_FILES['image']['name'];
    
    $allowed_extension = array('png','jpg','jpeg');
    $file_extension = pathinfo($image, PATHINFO_EXTENSION);
    
    $filename = time().'.'.$file_extension;


    if(!in_array($file_extension, $allowed_extension))
    {
        $_SESSION['status'] = "You are Allowed Only jpeg , jpg , png and images.";
        header('Location: products-add.php');
        exit(0);
    }
    else
    {
        $query = "INSERT INTO `products`(`category_id`,`name`, `small_description`, `long_description`, `price`, `offerprice`,`quantity`,`image`, `status`) 
        VALUES ('$category_id','$name','$small_description','$long_description','$price','$offerprice','$quantity','$filename','$status')";
        $query_run = mysqli_query($conn, $query);
        if($query_run)
        {
            move_uploaded_file($_FILES['image']['tmp_name'], 'uploads/products/'.$filename);
            
            $_SESSION['status'] = "Products Added Sucessfully";
            header('Location: products-add.php');
            exit(0);
        } 
        else
        {
            $_SESSION['status'] = "Something went wrong!";
            header('Location: products-add.php');
            exit(0);
        } 
    }
}

//Update Product 
if(isset($_POST['products_update']))
{
    $product_id = $_POST['product_id'];
    $category_id = $_POST['category_id'];
    $name = $_POST['name'];
    $small_description = $_POST['small_description'];
    $long_description = $_POST['long_description'];
    $price = $_POST['price'];
    $offerprice = $_POST['offerprice'];
    $quantity = $_POST['quantity'];
    $status = $_POST['status'] == true ? '1' : '0';
    
    $image = $_FILES['image']['name'];
    $old_image = $_POST['old_image'];
    
    if($image != '')
    {
        $update_filename = $_FILES['image']['name'];
        
        $allowed_extension = array('png','jpg','jpeg');
        $file_extension = pathinfo($update_filename, PATHINFO_EXTENSION);
        $filename = time().'.'.$file_extension;


        if(!in_array($file_extension, $allowed_extension))
        {
            $_SESSION['status'] = "You are Allowed Only jpeg , jpg , png and images.";
            header('Location: products-add.php');
            exit(0);
        }
        $update_filename = $filename;
    }
    else
    {
        $update_filename = $old_image;
    }

    $query = "UPDATE `products` SET `category_id`='$category_id',
                `name`='$name',
                `small_description`='$small_description',
                `long_description`='$long_description',
                `price`='$price',
                `offerprice`='$offerprice',
                `quantity`='$quantity',
                `status`='$status',
                `image`='$update_filename' WHERE `id`='$product_id' ";

    $query_run = mysqli_query($conn, $query);
    if($query_run)
    {
        if($image != '')
        {
            move_uploaded_file($_FILES['image']['tmp_name'], 'uploads/products/'.$filename);
            if(file_exists('uploads/products/'.$old_image))
            {
                unlink("uploads/products/".$old_image);
            }
        }   
        $_SESSION['status'] = "Product Updated Sucessfully";
        header('Location: product-edit.php?prod_id='.$product_id);
        exit(0);
    }
    else
    {
        $_SESSION['status'] = "Product Updation Failed";
        header('Location: product-edit.php?prod_id='.$product_id);
        exit(0);
    }
}

// Delete Product From Database
if(isset($_POST['product_delete']))
{
    $product_id = $_POST['pro_delete_id'];
    $product_query = "DELETE FROM `products` WHERE `id`='$product_id'";

    $product_query_run = mysqli_query($conn, $product_query);

    if($product_query_run)
    {
        $_SESSION['status'] = "Product Deleted Sucessfully.";
        header('Location: products.php');
    }
    else
    {
        $_SESSION['status'] = "Product Deleting FAILED.!";
        header('Location: products.php');
    }
}

// Validation Section
// Check email
if(isset($_POST['check_Emailbtn']))
{
    $email = $_POST['email'];
    
    $checkemail = "SELECT `email` FROM `users` WHERE email='$email';";
    $checkemail_run = mysqli_query($conn, $checkemail); 
    
    if(mysqli_num_rows($checkemail_run) > 0)
    {
        echo "Email Id Already Taken !";
    }
    else
    {
        echo "Email Id Available";
    } 
        
}
 
// User Section
// Add New User
if(isset($_POST['addUser']))
{
    $user_id            = $_POST['user_id']; 
    $user_name          = $_POST['user_name'];
    $user_phone         = $_POST['user_phone'];
    $user_email         = $_POST['user_email'];
    $user_password      = $_POST['user_password'];
    $user_address       = $_POST['user_address'];
    $user_city          = $_POST['user_city'];
    $user_pincode       = $_POST['user_pincode'];
    $user_role_as       = $_POST['user_role_as'] == true ? '1' : '0';

    if($password == $confirmpassword)
    {
        $checkemail = "SELECT `email` FROM `users` WHERE `email` = '$user_email';";
        $checkemail_run = mysqli_query($conn, $checkemail); 

        if(mysqli_num_rows($checkemail_run) > 0)
        {
            $_SESSION['status'] = "Email Id Is Already Taken";
            header('Location: registered.php');
            exit; 
        }
        else
        {
            $user_query = "INSERT INTO `users`(`name`, `phone`, `email`, `password`, `role_as`, `user_address`, `user_city`, `user_pincode`) VALUES ('$user_name','$user_phone','$user_email','$user_password','$user_role_as','$user_address','$user_city','$user_pincode')";
            $user_query_run = mysqli_query($conn, $user_query);
        
            if($user_query_run)
            {
                $_SESSION['status'] = "User Registration Sucessfully!";
                header('Location: registered.php');
            }
            else
            {
                $_SESSION['status'] = "User Registration Failed!";
                header('Location: registered.php');
            }
        }
    }
    else
    {
        $_SESSION['status'] = "User Registration Failed!";
        header('Location: registered.php');
    }
}

// Update Registerd User 
if(isset($_POST['updateUser']))
{
    $user_id = $_POST['user_id'];
    $name = $_POST['name'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $user_city =$_POST['user_city'];
    $password = $_POST['password'];
    $address = $_POST['user_address'];
    $user_pincode= $_POST['user_pincode'];
    $user_role = $_POST['role_as'] == true ? '1' : '0';

    $query = "UPDATE `users` SET `name`='$name', `phone`='$phone', `email`='$email', `user_city`='$user_city', `password`='$password', `user_address`='$address',`user_pincode`='$user_pincode', `role_as`='$user_role' WHERE id='$user_id ' ";
    $query_run = mysqli_query($conn, $query);
    
    if($query_run)
    {
        $_SESSION['status'] = "User Updated Sucessfully!";
        header('Location: registered.php');
    }
    else
    {
        $_SESSION['status'] = "User Updating Failed!";
        header('Location: registered.php');
    }            
}

// Userrole Update
if(isset($_POST['updateUserRole']))
{
    $role_id = $_POST['role_id'];
    $name = $_POST['name'];
    $user_role = $_POST['role_as'] == true ? '1' : '0';

    $query = "UPDATE `users` SET `role_as`='$user_role' WHERE id='$role_id ' ";
    $query_run = mysqli_query($conn, $query);
    
    if($query_run)
    {
        $_SESSION['status'] = "User Role Changed Sucessfully!";
        header('Location: user-role.php');
    }
    else
    {
        $_SESSION['status'] = "User Role Changing Failed!";
        header('Location: user-role.php');
    }            
}

// Delete User from Database 
if(isset($_POST['DeleteUserbtn']))
{
    $user_id =$_POST["delete_id"];

    $query = "DELETE FROM `users` WHERE id='$user_id' ";
    $query_run = mysqli_query($conn, $query);

    if($query_run)
    {
        $_SESSION['status'] = "User Deleted Sucessfully!";
        header('Location: registered.php');
    }
    else
    {
        $_SESSION['status'] = "Failed to Delete the User!";
        header('Location: registered.php');
    }

}

// Logout User
if(isset($_POST['logout_btn']))
{
    session_destroy();
    unset($_SESSION['auth']);
    unset($_SESSION['auth_user']);

    $_SESSION['status'] = "Logged Out Sucessfully";
    header('Location: login.php');
    exit(0);
}  
?>