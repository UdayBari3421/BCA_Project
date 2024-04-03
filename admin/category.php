<?php
    include('config/dbcon.php');
    include('authentication.php');
    
    include('includes/header.php');
    include('includes/topbar.php');
    include('includes/sidebar.php');
?>

<!-- Modal -->
<div class="modal fade" id="CategoryModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Category</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <form action="code.php" method="POST">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="">Category Name</label>
                        <input type="text" name="name" class="form-control" required>
                    </div>
                    
                    <div class="form-group">
                        <label for="">Description</label>
                        <textarea name="description" class="form-control" required rows="3"></textarea>
                    </div>
                    
                    <div class="form-group">
                        <label for="">Trending</label>
                        <input type="checkbox" name="trending">Trending
                    </div>
                    
                    <div class="form-group">
                        <label for="">Status</label>
                        <input type="checkbox" name="status">Status
                    </div>
                    
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" name="category_save" class="btn btn-primary">Save</button>
                </div>
            </form>

        </div>
    </div>
</div>

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
                        <li class="breadcrumb-item active">Category</li>
                    </ol>
                </div> <!-- /.col -->
            </div> <!-- /.row -->
        </div> <!-- /.container-fluid -->
    </div>

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card mt-4">
                    <?php  include('message.php');  ?>
                        <div class="card-header mt-4">
                            <h4>
                                Products Category
                                <a href="#" data-toggle="modal" data-target="#CategoryModal"
                                    class="btn float-right btn-primary">Add</a>
                            </h4>
                        </div>
                        <div class="card-body">
                            <table id="example2" class="table table-bordered table-striped">
                                <thead>
                                    <tr class="text-center bg-dark">
                                        <th>ID</th>
                                        <th>Name</th>
                                        <th>Trending</th>
                                        <th>Status</th>
                                        <th>About</th>
                                        <th>Edit</th>
                                        <th>Delete</th>
                                        <th>Created At</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    <!-- Show Data or Fetch Data into Table From Database -->
                                    <?php
                                        $query = "SELECT * From categories";
                                        $query_run = mysqli_query($conn, $query);

                                        if(mysqli_num_rows($query_run) > 0)
                                        {
                                            foreach($query_run as $cateItem)
                                            {
                                                ?>
                                                <tr class="text-center">
                                                    <td> <?= $cateItem ['id']; ?> </td>
                                                    <td> <?= $cateItem ['name']; ?> </td>
                                                    <td> 
                                                        <input type="checkbox" <?= $cateItem ['trending'] =='1' ? 'checked':''; ?> />
                                                    </td>
                                                    <td> 
                                                        <input type="checkbox" <?= $cateItem ['status'] =='1' ? 'checked':''; ?> />
                                                    </td>
                                                    <td> <?= $cateItem ['description']; ?> </td>
                                                    <td>
                                                        <a href="category-edit.php?id=<?= $cateItem ['id']; ?>" class="btn btn-success">Edit</a>
                                                    </td>
                                                    <td>
                                                        <form action="code.php" method="POST">
                                                            <input type="hidden" name="cate_delete_id" value="<?= $cateItem ['id']; ?>"/>
                                                            <button type="submit" name="cate_delete_btn" class="btn btn-danger">Delete</button>
                                                        </form>
                                                    </td>
                                                    <td><span class="bg-secondary px-2 rounded-pill" style=font-weight:bold> <?= $cateItem ['created_at']; ?> </span></td>
                                            
                                                </tr>

                                                <?php
                                            }
                                        }
                                        else
                                        {
                                    ?>
                                            <tr>
                                                <td colspan="6">No Record Found</td>
                                            </tr>
                                        
                                    <?php
                                        
                                        }

                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

</div>

<?php   include('includes/script.php'); ?>
<?php   include('includes/footer.php'); ?>