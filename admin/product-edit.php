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
                        <li class="breadcrumb-item"><a href="products.php">Products</a></li>
                        <li class="breadcrumb-item active"><a href="#">Edit</a></li>
                    </ol>
                </div> <!-- /.col -->
            </div> <!-- /.row -->
        </div> <!-- /.container-fluid -->
    </div>
    <hr>

<?php
if(isset($_GET['prod_id']))
{
    $product_id = $_GET['prod_id'];
    $query = "SELECT * FROM `products` WHERE `id`='$product_id' ";
    $query_run = mysqli_query($conn, $query);
    if(mysqli_num_rows($query_run) > 0)
    {
        $prodItem = mysqli_fetch_array($query_run);
        ?>

<section class="content">
    <div class="container">
        <div class="row">
        
        <div class="col-md-12">
            <?php  
                include('message.php');
            ?>
            <div class="card mt-4">
                <div class="card-header mt-4">
                    <h3>
                        Products - Edit  
                        <a href="products.php" class="btn float-right btn-danger">BACK</a>
                    </h3>
                </div>
                <div class="card-body">
                    
                    <form action="code.php" method="post" enctype="multipart/form-data">

                    <input type="hidden" name="product_id" value="<?= $prodItem ['id']; ?>">

                        <div class="row justify-content-center">
                            <div class="col-md-12">
                            <label>Select Category</label>
                            <?php 
                                $query = "SELECT * FROM categories";
                                $query_run = mysqli_query($conn, $query);

                                if(mysqli_num_rows($query_run) > 0)
                                {
                                    
                                    ?>
                                    <select name="category_id" required class="form-control">
                                        <option value="">Select Category</option>
                                        <?php 
                                            foreach($query_run as $item)
                                            { 
                                                ?>

                                                <option value="<?= $item['id']; ?>" <?= $prodItem ['category_id'] == $item['id'] ? 'selected':''; ?>>
                                                    <?= $item['name']; ?>
                                                </option>
                                                
                                                <?php
                                            }
                                        ?>
                                    </select>
                                    <?php
                                }
                            ?>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Products Name</label>
                                    <input type="text" name="name" value="<?= $prodItem['name']; ?>" class="form-control" placeholder="Enter Products Name"/>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Small Desription</label>
                                    <textarea type="text" name="small_description" class="form-control" required rows="3" placeholder="Enter Small Desription"><?= $prodItem['small_description']; ?></textarea>
                                </div>
                            </div>
                            
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Long Desription</label>
                                    <textarea type="text" name="long_description" class="form-control" required rows="3" placeholder="Enter Long Desription"><?= $prodItem['long_description']; ?></textarea>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Price</label>
                                    <input type="text" name="price" value="<?= $prodItem['price']; ?>" class="form-control" required placeholder="Enter Price"/>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Offer Price</label>
                                    <input type="text" name="offerprice" value="<?= $prodItem['offerprice']; ?>" class="form-control" required placeholder="Enter Offer Price"/>
                                </div>
                            </div>
                            
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Quantity</label>
                                    <input type="text" name="quantity" value="<?= $prodItem['quantity']; ?>" class="form-control" required placeholder="Enter Product Quantity"/>
                                </div>
                            </div>
                            
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Status (Checked = Show | Hide )</label> <br>
                                    <input type="checkbox" name="status" <?= $prodItem['status'] == '1' ? 'checked' : '' ; ?>> Show / Hide
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Upload Image</label>
                                    <input type="file" name="image" class="form-control">
                                    <input type="hidden" name="old_image" value="<?= $prodItem ['image']; ?>">
                                </div>
                            </div>
                            
                            <div class="col-md-12">
                                <div class="form-group">
                                    <img src="uploads/products/<?= $prodItem['image']; ?>" height="100px" width="100px" alt="">
                                </div>
                            </div>


                            <div class="col-md-4">
                                <div class="form-group text-center">
                                    <button type="submit" name="products_update" class="btn btn-primary">Update</button>
                                </div>
                            </div>

                        </div>
                    </form>
                
                </div>
            </div>
        </div>
        </div>
    </div>
</section>

</div>
<?php

    }
    else
    {
        echo "No Such Products Found";
    }
}
?>

<?php   include('includes/script.php'); ?>
<?php   include('includes/footer.php'); ?>