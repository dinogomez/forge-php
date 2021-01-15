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

      foreach($subMenus as $x => $x_value) {
      
        if($x == $menu){
          // echo '$x = '.$x.' | $menu = '.$menu.'<br>';
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
        break 2;
    } else {

      $output = '<li><a href="'.$href.'"><i class="'.$icon.'"></i><span>'.$menu.'</span></a></li>';
      
    }
      }
      echo $output;
      }

    
}
} 

// [Menu RETRIEVAL] END




    
?>