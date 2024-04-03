<?php

    session_start();
        include('main/header.php');
        include('admin/config/dbcon.php');

?>

<?php
    
    if(isset($_SESSION['status']))
    {
        echo $_SESSION['status'];
        unset($_SESSION['status']);
    }

?>
<style>
    
    body {
        color: white;
        background-color: black;
        padding: 0;
        margin: 0;
    }

    .containercpy {
        background-color: white;
        width: 100%;
        border-bottom-right-radius: 20px;
        border-bottom-left-radius: 20px;
        padding-left: 25px;
        padding-right: 25px;
    }

    body::before {
        content: "";
        background: url('https://source.unsplash.com/random/?contact,email') no-repeat center/cover;
        top: 0;
        left: 0;
        position: fixed;
        width: 100vw;
        height: 100vh;
        z-index: -1;
        opacity: 0.3;
    }

    section {
        padding-bottom: 0;
        padding-top: 0;
    }

    .fm {
        border: 3px solid white;
        margin-top: 100px;
        margin-bottom: 100px;
        padding: 50px;
        padding-bottom: 0px;
        padding-top: 40px;
        border-radius:120px;
    }

    .fm label{
        margin-left: 10px;
    }
    
    .fm input,textarea{
        width: 100%;
        outline:none;
        margin:7px;
        border-radius:10px;
    }
    
    .fm h2{
        margin-bottom: 20px;
    }
    
    .fm h2 span{
        color:red;
    }
</style>
<main id="main">
    <section>
        <div class="col-md-12 d-flex justify-content-center">
            <div class="col-lg-6">
                <form action="contact-save.php" method="POST" class="fm justify-content-center">
                    <h2 class="text-center"><span>UGS</span> Contact Form</h2>
                    <hr>
                    <div class="form-row">
                        <div class="form-group col-md-12">
                            <label>Email</label>
                            <input type="email" name="email" class="form-control" id="inputEmail4" placeholder="Email">
                        </div>
                        <div class="form-group col-md-12">
                            <label>Name</label>
                            <input type="text" name="name" class="form-control" placeholder="Enter Your Name">
                        </div>
                        <div class="form-group col-md-12">
                            <label>Phone</label>
                            <input type="number" name="phone" class="form-control" placeholder="Enter Your Mobile No">
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Address</label>
                        <input type="text" name="address" class="form-control" placeholder="Address">
                    </div>
                    <div class="form-row row">
                        <div class="form-group col-md-6">
                            <label>City</label>
                            <input type="text" name="city" class="form-control" placeholder="Enter Your City">
                        </div>
                        <div class="form-group col-md-6">
                            <label>Pincode</label>
                            <input type="text" name="pincode" class="form-control" placeholder="Enter Your Pincode">
                        </div>
                    </div>
                    <div class="form-row">
                        <label>Description</label>
                        <div class="form-group col-md-12">
                            <textarea name="description" id="tex" col="30" rows="10"></textarea>
                        </div>
                    </div>
                    <div class="row m-5 justify-content-center">
                        <div class="col-md-4 text-center">
                            <button type="submit" name="contact_btn" class="btn btn-success">SUBMIT</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>
</main>
<?php
    include('main/footer.php');
    include('main/scripts.php');
?>