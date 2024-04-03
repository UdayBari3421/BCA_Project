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
                        <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                        <li class="breadcrumb-item"><a href="user-role.php">Role for User</a></li>
                        <li class="breadcrumb-item active"><a href="#">Edit</a></li>
                    </ol>
                </div> <!-- /.col -->
            </div> <!-- /.row -->
        </div> <!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <section class="content">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Change Role For Users</h3>
                            <a href="user-role.php" class="btn btn-danger btn-sm float-right">BACK</a>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6">
                                    
                                
                                    <form action="code.php" method="POST">
                                        <div class="modal-body">
                                            <?php
                                                if(isset($_GET['role_id']))
                                                {
                                                    $role_id = $_GET['role_id'];
                                                    $query = "SELECT * FROM users WHERE id ='$role_id' LIMIT 1 ";
                                                    $query_run = mysqli_query($conn, $query);

                                                    if(mysqli_num_rows($query_run) > 0)
                                                    {
                                                        foreach($query_run as $row)
                                                        {
                                            ?>
                                                            <input type="hidden" name="role_id" value="<?php echo $row['id'] ?>">
                                                            <div class="form-group">
                                                                <label for="">Name</label>
                                                                <input type="text" name="name" readonly value="<?php echo $row['name'] ?>" class="form-control" placeholder="Name">
                                                            </div>
                                                            
                                                            <div class="form-group">
                                                                <label for="">User Role</label>
                                                                <input type="checkbox" name="role_as" <?php echo $row['role_as'] == '1' ? 'checked' : '' ; ?>> Admin / User
                                                            </div>
                                            <?php
                                                        
                                                        }
                                                    }
                                                    else
                                                    {
                                                        echo "<h4> No Records Found.! </h4>";
                                                    }
                                                }
                                            ?>
                                            
                                        </div>
                                        <div class="modal-footer">
                                            <button type="submit" name="updateUserRole" class="btn btn-info">Change Role</button>
                                        </div>
                                    </form>


                                </div>
                            </div>
                        </div> <!-- /.card-body -->
                    </div> <!-- /.card -->
                </div> <!-- /.col -->
            </div> <!-- /.row -->
        </div> <!-- /.container -->
    </section> <!-- /.content -->


</div>


<?php include('includes/script.php'); ?>
<?php include('includes/footer.php'); ?>