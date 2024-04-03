<?php
    include('authentication.php');
    include('includes/header.php');
    include('includes/topbar.php');
    include('includes/sidebar.php');
    include('config/dbcon.php');
?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Dashboard</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Dashboard</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <!-- Small boxes (Stat box) -->
            <div class="row">
                <div class="col-md-12">
                    <?php
                       include('message.php');
                    ?>
                </div>
                <?php 
                    $sql = "SELECT * FROM `orders`";
                    $sql_fire = mysqli_query($conn,$sql);
                    if($count=mysqli_num_rows($sql_fire))
                    {
                        $count1 = mysqli_num_rows($sql_fire);
                    }
                ?>
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-primary text-center">
                        <div class="inner">
                            <h3><?php echo $count1; ?></h3>
                            <p>New Orders</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-bag"></i>
                        </div>
                    </div>
                </div>
                <?php 
                    $sql = "SELECT * FROM `users`";
                    $sql_fire = mysqli_query($conn,$sql);
                    if($count=mysqli_num_rows($sql_fire))
                    {
                        $count1 = mysqli_num_rows($sql_fire);
                    }
                ?>
                <!-- ./col -->
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-info">
                        <div class="inner text-center">
                            <h3><?php echo $count1; ?></h3>
                            <p>User Registrations</p>
                        </div>
                        <div class="icon">
                            <i class="fa fa-users"></i>
                        </div>
                    </div>
                </div>
                <!-- ./col -->
                <?php 
                    $sql = "SELECT * FROM `contacts`";
                    $sql_fire = mysqli_query($conn,$sql);
                    if($count=mysqli_num_rows($sql_fire))
                    {
                        $count1 = mysqli_num_rows($sql_fire);
                    }
                ?>
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-success">
                        <div class="inner text-center">
                            <h3><?php echo $count1; ?></h3>
                            <p>Total Contacted</p>
                        </div>
                        <div class="icon">
                            <i class="fa fa-phone"></i>
                        </div>
                    </div>
                </div>
                <!-- ./col -->
                <?php 
                    $sql = "SELECT * FROM `products`";
                    $sql_fire = mysqli_query($conn,$sql);
                    if($count=mysqli_num_rows($sql_fire))
                    {
                        $count1 = mysqli_num_rows($sql_fire);
                    }
                ?>
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-warning">
                        <div class="inner text-center">
                            <h3><?php echo $count1; ?></h3>
                            <p>Total Products</p>
                        </div>
                        <div class="icon">
                            <i class="fa fa-synagogue"></i>
                        </div>
                    </div>
                </div>
                <!-- ./col -->
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>
</div>

<?php include('includes/script.php'); ?>
<?php include('includes/footer.php'); ?>