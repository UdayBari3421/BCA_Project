<?php
    include('config/dbcon.php');
    include('authentication.php');
    
    include('includes/header.php');
    include('includes/topbar.php');
    include('includes/sidebar.php');
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
                        <li class="breadcrumb-item active">Products</li>
                    </ol>
                </div> <!-- /.col -->
            </div> <!-- /.row -->
        </div> <!-- /.container-fluid -->
    </div>
    <hr>

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card mt-4">
                    <?php  include('message.php');  ?>
                        <div class="card-header mt-4">
                            <h3>
                                Products 
                                <a href="products-add.php" class="btn float-right btn-primary">Add</a>
                            </h3>
                        </div>
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr class="text-center">
                                        <th>ID</th>
                                        <th>Category ID</th>
                                        <th>Quantity</th>
                                        <th>Name</th>
                                        <th>Image Preview</th>
                                        <th>Offer Price</th>
                                        <th>Price</th>
                                        <th>Action</th>
                                        <th>Create Date</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <!-- Show Data or Fetch Data into Table From Database -->
                                    <?php
                                        $query = "SELECT * From `products`";
                                        $query_run = mysqli_query($conn, $query);
                                        if(mysqli_num_rows($query_run) > 0)
                                        {
                                            foreach($query_run as $prod_item)
                                            {
                                                ?>
                                                <tr class="text-center" style="font-weight:bold;">
                                                    <td>    <?= $prod_item ['id'] ?>            </td>
                                                    <td>    <?= $prod_item ['category_id'] ?>   </td>
                                                    <td>    <?= $prod_item ['quantity'] ?>      </td>
                                                    <td>    <?= $prod_item ['name'] ?>          </td>
                                                    <td> 
                                                        <?= '<img src="uploads/products/'.$prod_item ['image'].'" height="150px" width="150px">'; ?> 
                                                    </td>
                                                    <td style="color:#075ad7;">₹<?= $prod_item ['offerprice'] ?> </td>
                                                    <td style="color:#c12121;">₹<?= $prod_item ['price'] ?> </td>
                                                    <td>
                                                        <form action="code.php" method="POST">
                                                            <a href="product-edit.php?prod_id=<?= $prod_item ['id']; ?>" class="btn btn-sm btn-success">Edit</a>
                                                            <input type="hidden" name="pro_delete_id" value="<?= $prod_item ['id']; ?>"/>
                                                            <button type="submit" name="product_delete" class="btn btn-sm btn-danger">Delete</button>
                                                        </form>
                                                    </td>
                                                    <td> <span class="bg-secondary px-2 rounded-pill" style="font-weight:bold; font-size:15px;"> <?= $prod_item ['created_at']; ?> </span></td>
                                                </tr>
                                                <?php
                                            }
                                        }
                                        else
                                        {
                                            ?>
                                                <tr>
                                                    <td colspan="7" class="text-center"><h4>No Record Found</h4></td>
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