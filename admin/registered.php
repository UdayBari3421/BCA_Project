<?php
    
    include('authentication.php');      
    include('includes/header.php');
    include('includes/topbar.php');
    include('includes/sidebar.php');
    include('config/dbcon.php');

?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">

    <!-- User Modal -->
    <div class="modal fade" id="AddUserModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add User :</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <form action="code.php" method="POST">
                    <div class="modal-body">
                        <input type="hidden" name="user_id">
                        <div class="form-group">
                            <label for="">Name</label>
                            <input type="text" name="user_name" class="form-control" placeholder="Name">
                        </div>

                        <div class="form-group">
                            <label for="">Phone Number</label>
                            <input type="text" name="user_phone" class="form-control" placeholder="Phone Number">
                        </div>

                        <div class="form-group">
                            <label for="">Email ID</label>
                            <input type="email" name="user_email" class="form-control email_id" placeholder="Email">
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Password</label>
                                    <input type="Password" name="user_password" class="form-control" placeholder="Password">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Confirm Password</label>
                                    <input type="Password" name="user_confirmpassword" class="form-control"
                                        placeholder="Confirm Password">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="">Address</label>
                                    <input type="text" name="user_address" class="form-control" placeholder="Enter Your Address">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">City</label>
                                    <input type="text" name="user_city" class="form-control" placeholder="Enter Your City">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Pincode</label>
                                    <input type="text" name="user_pincode" class="form-control" placeholder="Enter Your Address">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="">User Role</label>
                            <input type="checkbox" name="user_role_as"> Admin / User
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" name="addUser" class="btn btn-primary">Save</button>
                    </div>
                </form>

            </div>
        </div>
    </div>

    <!-- Delete user -->
    <div class="modal fade" id="DeleteModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Delete User</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="code.php" method="POST">
                    <div class="modal-body">
                        <input type="hidden" name="delete_id" class="delete_user_id">
                        <p>
                            Are you sure. You Want To Delete This Data ?
                        </p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" name="DeleteUserbtn" class="btn btn-primary">Confirm Delete</button>
                    </div>
                </form>

            </div>
        </div>
    </div><!-- /Delete user -->

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
                        <li class="breadcrumb-item active"><a href="#">Registered Users</a></li>
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
                            <h3 class="card-title">Registered Users</h3>
                            <a href="#" data-toggle="modal" data-target="#AddUserModal"
                                class="btn btn-primary btn-sm float-right">Add User</a>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Name</th>
                                        <th>Phone Number</th>
                                        <th>Email</th>
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
                                                        <td> <?php echo $row ['phone']; ?> </td>
                                                        <td> <?php echo $row ['email']; ?> </td>
                                                        <td>
                                                            <a href="update.php?user_id=<?php echo $row ['id']; ?>" class="btn btn-sm btn-info">Edit</a>
                                                            <button type="button" value="<?php echo $row ['id']; ?>" class="btn btn-sm btn-danger deletebtn">Delete</button>
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

<script>

$(document).ready(function () {
    $('.email_id').keyup(function (e) { 
        var email = $('.email_id').val();
        // console.log(email);
        $.ajax({
            type: "POST",
            url: "code.php",
            data: {
                'check_Emailbtn': 1,
                'email': email,
            },
            
            success: function (response) {
                // console.log(response)
                $('.email_err').text(response);
            }
        });
    });
});

</script>

<script>
$(document).ready(function() {
    $('.deletebtn').click(function(e) {
        e.preventDefault();

        var user_id = $(this).val();
        // console.log(user_id);
        $('.delete_user_id').val(user_id);
        $('#DeleteModal').modal('show');

    });
});
</script>


<?php include('includes/footer.php'); ?>