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
                        <li class="breadcrumb-item active">Orders</li>
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
                        <!-- <div class="card-header mt-4">
                            <h3>
                                Products 
                                <a href="products-add.php" class="btn float-right btn-primary">Add</a>
                            </h3>
                        </div> -->
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr class="text-center">
                                        <th>Order ID</th>
                                        <th>Email</th>
                                        <th>Name</th>
                                        <th>Phone</th>
                                        <th>Address</th>
                                        <th>Total</th>
                                        <th>Products</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <!-- Show Data or Fetch Data into Table From Database -->
                                    <?php
                                        $query = "SELECT * From `orders`";
                                        $query_run = mysqli_query($conn, $query);
                                        if(mysqli_num_rows($query_run) > 0)
                                        {
                                            foreach($query_run as $prod_item)
                                            {
                                                ?>
                                                <tr class="text-center" style="font-weight:bold;">
                                                    <td>    <?= $prod_item['order_id'] ?>   </td>
                                                    <td>    <?= $prod_item['email'] ?>      </td>
                                                    <td>    <?= $prod_item['name'] ?>          </td>
                                                    <td>    <?= $prod_item['phone'] ?>          </td>
                                                    <td>    <?= $prod_item['address'] ?>        </td>
                                                    <td>    <?= $prod_item['total'] ?>        </td>
                                                    <td>    <?= $prod_item['products'] ?>        </td>
                                                    <td>
                                                        <form action="code.php" method="POST">
                                                            <input type="hidden" name="order_delete_id" value="<?= $prod_item ['id']; ?>"/>
                                                            <button type="submit" name="order_delete" class="btn btn-sm btn-danger">Delete</button>
                                                        </form>
                                                    </td>
                                                    <!-- <td> <span class="bg-secondary px-2 rounded-pill" style="font-weight:bold; font-size:15px;"> <?= $prod_item ['created_at']; ?> </span></td> -->
                                                </tr>
                                                <?php
                                            }
                                        }
                                        else
                                        {
                                            ?>
                                                <tr>
                                                    <td colspan="12" class="text-center"><h4>No Record Found</h4></td>
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