<?php
    require_once 'view/layouts/header.php';
?>
<link rel="stylesheet" href="view/css/login.css">

<div class="container home-wrapper">
    <div class="jumbotron bg-light p-5 shadow w-50">
        <h1 class="display-2 text-center fw-bold"><span class="text-success fw-bolder">&lt;</span>forge<span
                class="text-success fw-bolder">/&gt;</span></h1>
        <?php
            if(isset($_GET['error'])){
                echo '<div class="alert alert-danger text-center" role="alert">'.$_GET['error'].'</div>';
            }
        ?>
        <form action="controller/LoginController.php" method="POST">
            <div class="form-group">
                <label for="formGroupExampleInput">User ID</label>
                <input type="number" name="uid" class="form-control number-noarrow" placeholder="Username">
            </div>
            <div class="form-group">
                <label for="formGroupExampleInput2">Password</label>
                <input type="password" name="password" class="form-control" placeholder="Password">
            </div>

            <hr class="my-2">

            <div class="text-center mt-3">
                <input class="btn btn-success col-12" type="submit" value="Login">
                <!-- DEBUG -->
                <!-- <a class="btn btn-danger col-12 mt-1" href="register.php">!debug-register</a> -->
            </div>


        </form>
    </div>
</div>

<?php
    require_once 'view/layouts/footer.php';
?>