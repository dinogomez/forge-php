<main class="page-content">
    <!-- NAV -->
    <?php
            require_once 'view/components/navbar.php'
        ?>
    <style>
    .edge {
        text-align: right;
    }
    </style>
    <div class="container-fluid">
        <div class="row">

            <h1>Create Menu Profile </h6>
            </h1>
            <p>Create, Read, Update and Delete Profiles</p>
            <hr>
            <?php
            if(isset($_GET['res'])){
                echo '<div class="alert alert-success text-center" role="alert">'.$_GET['res'].'</div>';
            }
        ?>
            <div class="col-5">
                <button type="button" class="btn btn-success btn-sm px-3 py-2" data-bs-toggle="modal"
                    data-bs-target="#AddProfile">
                    <i class="fas fa-plus"></i> <span class="fw-bolder">Add</span>
                </button>
            </div>

            <style>
            .scrolldown {
                height: 200px;
                overflow-y: scroll;
            }
            </style>
            <!-- Modal -->
            <div class="modal fade" id="AddProfile" tabindex="-1" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header text-center">
                            <h5 class="modal-title w-100" id="exampleModalLabel">Add Menu Profile</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form action="controller\AddProfileController.php" method="POST">
                                <div class="form-group my-2">
                                    <label for="formGroupExampleInput" class="ml-2">Menu Name</label>
                                    <input type="text" name="profileName" class="form-control" placeholder="" required>
                                </div>
                                <div class="form-group my-2">
                                    <label for="formGroupExampleInput" class="ml-2">Description</label>
                                    <textarea class="form-control" name="profileDesc" aria-label="With textarea"
                                        required></textarea>

                                </div>
                                <div class="ml-3 row my-2">
                                    <div class="col-5">Menu</div>
                                    <div class="col-5">Parent</div>
                                </div>
                                <div class="scrolldown form-control">

                                    <?php 
                                    
                                    require_once 'model\db.php';
                                    $sql = "SELECT * FROM menu";
                                    $result = $conn->query($sql);
                                    
                                
                                    if ($result->num_rows > 0) {
                                    
                                    while($row = $result->fetch_assoc()) {
                                        if(is_null($row['parent'])){
                                            $row['parent'] = 'Header';
                                            } 
                                        echo '<div class="form-check">
                                        <input class="form-check-input" name="menu[]" type="checkbox" value="'.$row['menu'].",".$row['parent'].'" id="flexCheckDefault">
                                      
                                        <div class="row my-2">
                                        <div class="col-5">'.$row['menu'].'</div>
                                        <div class="col-5">'.$row['parent'].'</div>
                                    </div>
                                        </label>
                                    </div>';
                                    }
                                    } else {
                                    echo "0 results";
                                    }
                                    
                                    ?>

                                </div>

                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <input type="submit" class="btn btn-primary" value="Add">
                        </div>
                        </form>
                    </div>
                </div>
            </div>
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Profile</th>
                        <th scope="col" class="edge">Operation</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        require_once 'controller/LoadMenuProfiles.php';
                    ?>


                </tbody>
            </table>

        </div>
</main>

</div>