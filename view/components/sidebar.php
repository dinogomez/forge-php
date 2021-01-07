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
                    <?php

    require_once 'model/db.php';


    $uid = $_SESSION['uid'];
    $prof_id;



    // echo 'UID: '.$uid.'<br>';

    // [PROF ID RETRIEVAL] START
    $sql = "SELECT prof_id FROM users WHERE uid='$uid'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        $prof_id = $row['prof_id'];
        // echo 'PROF_ID: '.$prof_id.'<br>';

    }
    } else {
    echo "0 results";
    }
    // [PROF ID RETRIEVAL] END

    function array_push_assoc($array, $key, $value){
    $array[$key] = $value;
    return $array;
    }



    // [MENU RETRIEVAL] START
    // [CHILD RETRIEVAL]
    $subMenus = array("File Management" => "Hello");
    $sql = "SELECT *, menu.execute as execute FROM profileModules
    INNER JOIN menu
    ON profileModules.menu = menu.menu WHERE prof_id = '$prof_id' and type = 'submenu'";

    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
    // output data of each row
    
    while($row = $result->fetch_assoc()) {

        $href = "../";
        if(is_null($row['execute'])){
        $row['execute'] = '#';
        } else {
        $href = "../".$row['execute'];
        }
        $menu = $row['menu'];
        $parent = $row['parent'];
        $value = '<li><a href="'.$href.'">'.$row['menu'].'</a></li>';

        $subMenus = array_push_assoc($subMenus, $parent, $value);

    }
    // foreach($subMenus as $x => $x_value) {
    //   echo "Key=" . $x . ", Value=" . $x_value;
    //   echo "<br>";
    // }
    }


    $sql = "SELECT *, menu.icon as icon, menu.execute as execute FROM profileModules
    INNER JOIN menu
    ON profileModules.menu = menu.menu WHERE prof_id = '$prof_id'";

    $result = $conn->query($sql);



    if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        if($row['type'] == 'header'){
        $href = "../";
        if(is_null($row['execute'])){
        $row['execute'] = '#';
        $href = '#';
        } else {
        $href = "../".$row['execute'];
        }

        $menu = $row['menu'];
        $icon = $row['icon'];

        echo '<li class="sidebar-dropdown">
                <a href="'.$href.'"><i class="'.$icon.'"></i></i><span>'.$menu.'</span></a>
                <div class="sidebar-submenu">
                                <ul>';
                
                foreach($subMenus as $x => $x_value) {
                if($x == $menu){
                    echo $x_value;
                }
                }
        echo  ' </ul>
        </div></li>';
        }
    }
    } 

    // [Menu RETRIEVAL] END

    


        
    ?>

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