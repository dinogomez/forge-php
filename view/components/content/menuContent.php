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
            <div class="col-5">
                <button type="button" class="btn btn-success btn-sm px-3 py-2" data-bs-toggle="modal"
                    data-bs-target="#AddProfile">
                    <i class="fas fa-plus"></i> <span class="fw-bolder">Add</span>
                </button>
            </div>

            <style>
            .scrolldown {

                overflow-y: scroll
            }

            ;
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
                            <form>
                                <div class="form-group">
                                    <label for="formGroupExampleInput" class="ml-2">Menu Name</label>
                                    <input type="text" name="menuName" class="form-control" placeholder="">
                                </div>
                                <div class="form-group">
                                    <label for="formGroupExampleInput" class="ml-2">Description</label>
                                    <textarea class="form-control" aria-label="With textarea"></textarea>

                                </div>
                                <label for="formGroupExampleInput" class="ml-2">Menu</label>

                                <div class="scrolldown form-control">
                                    <input type="checkbox" /> This is checkbox <br />
                                    <input type="checkbox" /> This is checkbox <br />
                                    <input type="checkbox" /> This is checkbox <br />
                                    <input type="checkbox" /> This is checkbox <br />
                                    <input type="checkbox" /> This is checkbox <br />
                                    <input type="checkbox" /> This is checkbox <br />
                                    <input type="checkbox" /> This is checkbox <br />
                                    <input type="checkbox" /> This is checkbox <br />
                                    <input type="checkbox" /> This is checkbox <br />
                                    <input type="checkbox" /> This is checkbox <br />
                                </div>
                            </form>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-primary">Save changes</button>
                        </div>
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