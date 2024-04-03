<?php
    include('config/dbcon.php');
    include('authentication.php');
    
    include('includes/header.php');
    include('includes/topbar.php');
    include('includes/sidebar.php');
?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card mt-4">
                        <?php  include('message.php');  ?>
                        <div class="card-header mt-4">
                            <h4>
                                Edit - Product Category
                                <a href="category.php" class="btn btn-danger float-right">BACK</a>
                            </h4>
                        </div>
                        <div class="card-body">
                            
                            <form action="code.php" method="POST">
                                <?php
                                    if(isset($_GET['id']))
                                    {
                                        $cate_id = $_GET['id'];
                                        $qa = "SELECT * FROM `categories` WHERE id='$cate_id'";
                                        $qa_run = mysqli_query($conn, $qa);
                                        
                                        foreach($qa_run as $c_item) :
                                        ?>
                                        <input type="hidden" name="cate_id" value=" <?php echo $c_item['id'] ?> ">
                                        <div class="modal-body">
                                            <div class="form-group">
                                                <label for="">Category Name</label>
                                                <input type="text" name="name" value="<?php echo $c_item['name']; ?>" class="form-control" required>
                                            </div>

                                            <div class="form-group">
                                                <label for="">Description</label>
                                                <textarea name="description" class="form-control" required rows="3"> <?php echo $c_item['description']; ?> </textarea>
                                            </div>

                                            <div class="form-group">
                                                <label for="">Trending</label>
                                                <input type="checkbox" <?php echo $c_item['trending']=='1'?'checked':''; ?> name="trending" />Trending
                                            </div>

                                            <div class="form-group">
                                                <label for="">Status</label>
                                                <input type="checkbox" <?php echo $c_item['status']=='1'?'checked':''; ?> name="status" />Status
                                            </div>

                                        </div>
                                        <div class="modal-footer">
                                            <a href="category.php" class="btn btn-secondary">Cancel</a>
                                            <button type="submit" name="category_update" class="btn btn-primary">Update</button>
                                        </div>

                                        <?php
                                        endforeach;
                                    }
                                    else
                                    {
                                        echo"ID Not found";
                                    }


                                ?>
                            </form>


                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

</div>

<?php   include('includes/script.php'); ?>
<?php   include('includes/footer.php'); ?>