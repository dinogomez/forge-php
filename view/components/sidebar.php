<?php
    session_start();
?>

<div class="page-wrapper toggled">
    <nav id="sidebar" class="sidebar-wrapper">
        <div class="sidebar-content">


            <div class="sidebar-header">
                <div class="user-pic">
                    <img class="img-responsive img-rounded" src="view/assets/img/user.jpg" alt="" style="width:60px;">
                </div>
                <div class="user-info">
                    <strong><?php echo $_SESSION['fname'] ?>
                        <?php echo $_SESSION['lname'] ?></strong>

                    <span class="user-role"><?php echo $_SESSION['role'] ?></span>
                    <div class="user-status">
                        <a href="#">
                            <i class="fa fa-circle"></i>
                            <span>Online</span></a>
                    </div>
                </div>
            </div>
            <!-- sidebar-header  -->
            <div class="sidebar-search">
                <div>
                    <div class="input-group">
                        <input type="text" class="form-control search-menu" placeholder="Search for...">
                        <span class="input-group-addon p-2"><i class="fa fa-search"></i></span>
                    </div>
                </div>
            </div>
            <!-- sidebar-search  -->
            <div class="sidebar-menu">
                <ul>
                    <li class="header-menu"><span>General</span></li>
                    <li><a href="../dashboard.php"><i class="fas fa-home"></i><span>Home</span></a></li>

                    <li class="sidebar-dropdown">
                        <a href="#"><i class="fa fa-dashboard"></i><span>File Management</span></a>
                        <div class="sidebar-submenu">
                            <ul>
                                <li><a href="#">Dir Management<span class="label label-success">Admin</span></a>
                                </li>
                                <li><a href="#">Records</a></li>
                                <li><a href="#">Logs</a></li>
                            </ul>
                        </div>
                    </li>
                    <!-- <li class="sidebar-dropdown">
                        <a href="#"><i class="fa fa-shopping-cart"></i><span>E-commerce</span><span
                                class="badge">3</span></a>
                        <div class="sidebar-submenu">
                            <ul>
                                <li><a href="#">Products<span class="badge">2</span></a></li>
                                <li><a href="#">Orders</a></li>
                                <li><a href="#">Credit cart</a></li>
                            </ul>
                        </div>
                    </li> -->
                    <!-- <li class="sidebar-dropdown">
                        <a href="#"><i class="fa fa-diamond"></i><span>Components</span></a>
                        <div class="sidebar-submenu">
                            <ul>
                                <li><a href="#">General</a></li>
                                <li><a href="#">Panels</a></li>
                                <li><a href="#">Tables</a></li>
                                <li><a href="#">Icons</a></li>
                                <li><a href="#">Forms</a></li>
                            </ul>
                        </div>
                    </li> -->
                    <li class="sidebar-dropdown">
                        <a href="#"><i class="fa fa-bar-chart-o"></i><span>User Management</span></a>
                        <div class="sidebar-submenu">
                            <ul>
                                <li><a href="../register.php">User Add</a></li>
                                <li><a href="#">User Statistics</a></li>
                                <li><a href="#">User Control</a></li>
                            </ul>
                        </div>
                    </li>

                    <li class="sidebar-dropdown">
                        <a href="#"><i class="fa fa-globe"></i><span>GPS</span></a>
                        <div class="sidebar-submenu">
                            <ul>
                                <li><a href="#">Ships</a></li>
                                <li><a href="#">Trucks</a></li>
                            </ul>
                        </div>
                    </li>


                    <li class="header-menu"><span>Others</span></li>

                    <li><a href="#"><i class="fa fa-calendar"></i><span>Calendar</span></a></li>
                    <li><a href="#"><i class="fa fa-folder"></i><span>Files</span></a></li>

                    <li><a href="#"><i class="fa fa-book"></i><span>Documentation</span></a></li>
                </ul>
            </div>
            <!-- sidebar-menu  -->
            <!-- sidebar-menu  -->
        </div>
        <!-- sidebar-content  -->

        <div class="sidebar-footer">
            <a href="#"><i class="fa fa-bell"></i><span class="label label-warning notification">3</span></a>
            <a href="../messages.php"><i class="fa fa-envelope"></i><span
                    class="label label-success notification">7</span></a>
            <a href="../settings.php"><i class="fa fa-gear"></i></a>
            <a href="#" data-bs-toggle="modal" data-bs-target="#staticBackdrop"><i class="fa fa-power-off"></i></a>

        </div>
    </nav>
    <!-- sidebar-wrapper  -->

    <!-- page-content" -->



    <!-- page-wrapper -->

    <!-- MODALS -->

    <!-- Modal -->
    <!-- Logout -->
    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header" style="border-bottom: 0 none;">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body text-center ">
                    <h5 class="modal-title pb-2" id="staticBackdropLabel">Are you sure you want to Logout?</h5>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary btn-sm col-3" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-success btn-sm col-3">Confirm</button>
                </div>
            </div>
        </div>
    </div>