<?php
    session_start();
    if(!isset($_SESSION['auth']))
    {
        $_SESSION['auth_status'] = "Login To Acess Website";
        header('Location: login.php');
        exit(0);
    }
    else
    {
        if($_SESSION['auth'] == "1")
        {
            
        }
        else
        {
            $_SESSION['status'];
            header('Location: ../index.php');
            exit(0);
        }
    }
?>

