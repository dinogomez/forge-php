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

            <table class="table table-hover">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Profile</th>
                        <th scope="col" class="edge">Operation</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th scope="row">1</th>
                        <td>Encoder</td>
                        <td class="edge">
                            <a class="mx-2" href="#"><i class="fas fa-edit text-primary fs-5"></i></a>
                            <a class="mx-2" href="#"><i class="fas fa-trash text-danger fs-5"></i></a>
                        </td>
                    </tr>
                    <tr>
                        <th scope="row">2</th>
                        <td>GPS</td>
                        <td class="edge">
                            <a class="mx-2" href="#"><i class="fas fa-edit text-primary fs-5"></i></a>
                            <a class="mx-2" href="#"><i class="fas fa-trash text-danger fs-5"></i></a>
                        </td>
                    </tr>


                </tbody>
            </table>

        </div>
</main>

</div>