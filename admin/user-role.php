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
                        <li class="breadcrumb-item active"><a href="#">Role for User</a></li>
                    </ol>
                </div> <!-- /.col -->
            </div> <!-- /.row -->
        </div> <!-- /.container-fluid -->
    </div>
    <hr>
    
    <!-- /.content-header -->
    <section class="content">
        <div class="container">
            <div class="row">
                <div class="col-md-12">

                    <!-- Session making status -->
                    <?php
                            
                            if(isset($_SESSION['status']))
                            {
                                echo "<h4>".$_SESSION['status']."</h4>";
                                unset($_SESSION['status']);
                            }

                        ?>
                    <!-- /Session making status -->

                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Role for Users</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="userRoleTable" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Name</th>
                                        <th>Role</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    <!-- Show Data or Fetch Data into Table From Database -->
                                    <?php

                                            $query = "SELECT * From users";
                                            $query_run = mysqli_query($conn, $query);

                                            if(mysqli_num_rows($query_run) > 0)
                                            {
                                                foreach($query_run as $row)
                                                {
                                                    ?>
                                                    <tr>
                                                        <td> <?php echo $row ['id']; ?> </td>
                                                        <td> <?php echo $row ['name']; ?> </td>
                                                        <td> <?php echo $row ['role_as']; ?> </td>
                                                        <td>
                                                            <a href="roleup.php?role_id=<?php echo $row ['id']; ?>" class="btn btn-sm btn-primary">Change Role</a>
                                                        </td>
                                                    </tr>

                                                    <?php
                                                }
                                            }
                                            else
                                            {
                                                    ?>
                                                <tr>
                                                    <td>No Record Found</td>
                                                </tr>
                                                    <?php
                                            }

                                        ?>
                                </tbody>
                            </table>
                        </div> <!-- /.card-body -->
                    </div> <!-- /.card -->
                </div> <!-- /.col -->
            </div> <!-- /.row -->
        </div> <!-- /.container -->
    </section> <!-- /.content -->
</div>



<?php include('includes/script.php'); ?>
<?php include('includes/footer.php'); ?>