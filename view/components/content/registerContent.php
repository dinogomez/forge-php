<link rel="stylesheet" href="view/css/login.css">

<main class="page-content">
    <!-- NAV -->
    <?php
            require_once 'view/components/navbar.php'
        ?>
    <div class="container-fluid">
        <div class="container home-wrapper">
            <div class="jumbotron bg-light p-5 shadow w-50">
                <h1 class=" text-center fw-bold"></span>Add User</h1>

                <?php
            if(isset($_GET['res'])){
                if($_GET['res']=="success"){
                    echo '<div class="alert alert-success text-center" role="alert">User Added Succesfully</div>';
                } else {
                    echo '<div class="alert alert-danger text-center" role="alert">'.$_GET['res'].'</div>';

                }
            }
        ?>
                <form action="controller/RegisterController.php" method="POST">
                    <div class="form-group ">
                        <label for="formGroupExampleInput">User ID</label>
                        <input type="number" name="uid" class="form-control number-noarrow" placeholder="User ID"
                            required>
                    </div>
                    <div class="form-group pt-2">
                        <label for="formGroupExampleInput2">Password</label>
                        <input type="password" name="password" class="form-control" placeholder="Password" required>
                    </div>

                    <div class="form-group pt-2">
                        <label for="formGroupExampleInput2">Role</label>
                        <select name="role" class="form-control" required>
                            <option class="text-gray-200" value="" selected disabled hidden>Choose Role</option>
                            <option class="text-gray" value="User">User</option>
                            <option class="text-gray" value="Administrator">Admin</option>
                        </select>
                    </div>
                    <div class="form-group pt-2">
                        <label for="formGroupExampleInput2">Profile</label>
                        <select name="prof_id" class="form-control" required>
                            <option class="text-gray-200" value="" selected disabled hidden>Choose Profile</option>
                            <option class="text-gray" value="1">Admin</option>
                            <option class="text-gray" value="2">Default</option>
                        </select>
                    </div>
                    <div class="form-group pt-2">
                        <label for="formGroupExampleInput2">First Name</label>
                        <input type="text" name="fname" class="form-control" placeholder="First Name" required>
                    </div>
                    <div class="form-group pt-2">
                        <label for="formGroupExampleInput2">Middle Name</label>
                        <input type="text" name="mname" class="form-control" placeholder="Middle Name" required>
                    </div>
                    <div class="form-group pt-2">
                        <label for="formGroupExampleInput2">Last Name</label>
                        <input type="text" name="lname" class="form-control" placeholder="Last Name" required>
                    </div>


                    <hr class="my-2">

                    <div class="text-center mt-3">
                        <input class="btn btn-success col-12" type="submit" value="Add">
                    </div>


                </form>
            </div>
        </div>
</main>

</div>