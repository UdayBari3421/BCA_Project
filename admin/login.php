<?php
    include('includes/header.php');

    session_start();
    if(isset($_SESSION['auth']))
    {
        $_SESSION['status']= "You are already Logged In!";
        header('Location: index.php');
        exit(0);
    }
    
?>
<div class="section" style="background: url('../assets/img/bg.png')no-repeat center center/cover; height: 95vh;">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-5 my-5">
            <?php
                if(isset($_SESSION['auth_status']))
                {
                    ?>
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <strong>Hey!</strong> <?php echo $_SESSION['auth_status']; ?>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    <?php
                    unset($_SESSION['auth_status']);
                }
                include('message.php');
            ?>
                <div class="card bg-dark my-5">
                    <div class="card-header">
                        <h5 class="text-center fw-bold">Login Form</h5>
                    </div>
                    <div class="card-body">
                        <form action="logincode.php" method="POST">
                            <div class="form-group">
                                <label for="">Email Id</label>
                                <input type="text" name="email" class="form-control" placeholder="Email Id">
                            </div>

                            <div class="form-group">
                                <label for="">Password</label>
                                <input type="password" name="password" class="form-control" placeholder="password">
                            </div>

                            <hr>
                            <div class="form-group">
                                <label class="checkbox">
                                    <input type="checkbox" value="remember-me" id="remember_me"> Remember me
                                </label>
                            </div>

                            <div class="form-group">
                                <button type="submit" name="login_btn" class="btn btn-success btn-block">Login</button>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php   include('includes/script.php');           ?>
<?php   include('includes/footer.php');     ?>