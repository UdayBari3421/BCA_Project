<?php  
session_start();
include('config/dbcon.php');
include('admin/authentication.php');
// Logout User
if(isset($_POST['userlogout_btn']))
{
    session_destroy();
    unset($_SESSION['auth']);
    unset($_SESSION['auth_user']);

    $_SESSION['status'] = "Logged Out Sucessfully";
    header('Location: login.php');
    exit(0);
} 

if(isset($_POST['login_btn']))
{
    $email = $_POST['email'];
    $password = $_POST['password'];
    $log_query = "SELECT * FROM users WHERE email='$email' AND password='$password' LIMIT 1";
    $log_query_run = mysqli_query($conn, $log_query);

    if(mysqli_num_rows($log_query_run) > 0)
    {
        foreach($log_query_run as $row)
        {
            $user_id = $row['id'];
            $user_name = $row['name'];
            $user_email = $row['email'];
            $user_phone = $row['phone'];
            $role_as = $row['role_as'];
            $address = $row['user_address'];
            $user_city = $row['user_city'];
            $user_pincode = $row['user_pincode'];
        }

        $_SESSION['auth'] = "$role_as";
        $_SESSION['auth_user'] = [
            'user_id' =>$user_id,
            'user_name' =>$user_name,
            'user_email' =>$user_email,
            'user_phone' =>$user_phone,
            'user_address' =>$address,
            'user_city' =>$user_city,
            'user_pincode' =>$user_pincode
        ];

        $_SESSION['status'] = "Logged in Sucessfully!"; 
        header('Location: index.php');

    }
    else
    {
        $_SESSION['status'] = "Invalid Credential"; 
        header('Location: login.php');
    }

}
else
{
    $_SESSION['status'] = "Access Denied"; 
    header('Location: login.php');
}
?>