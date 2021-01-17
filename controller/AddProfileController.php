<?php 

require_once '../model/db.php';
$profileName = $_POST['profileName'];
$profileDesc = $_POST['profileDesc'];
$menuArr = $_POST['menu'];
$prof_id;
$type;
$rights = "W";

$stmt = $conn->prepare("INSERT INTO profile (label, description) VALUES (?, ?)");
$stmt->bind_param("ss",$profileName , $profileDesc );
$stmt->execute();
echo "New records created successfully";

$stmt->close();




$sql = "SELECT * FROM profile WHERE label = '$profileName'";
$result = $conn->query($sql);
$row = mysqli_fetch_assoc($result);
$prof_id = $row['id'];



$stmt = $conn->prepare("INSERT INTO profilemodules (prof_id, menuType, menu, rights, parent) VALUES (?, ?, ?, ?, ?)");


foreach ($menuArr as $key => $value) {
    $parent;
    $arr = explode(",",$value);
    if($arr[1] == "Header"){
        $type = "header";
    }else{
        $type = "submenu";
    }
    if($arr[1] == "Header"){
        $parent = NULL;
    } else {
        $parent = $arr[1];
    }
    $menu = $arr[0];
    echo '<br>$value = '.$value;
    echo '<br>$prof_id = '.$prof_id;
    echo '| $type = '.$type.' | $menu'.$menu.' | $rights ='.$rights.' | $parent ='.$parent;
    
    $stmt->bind_param("issss", $prof_id, $type, $menu, $rights, $parent);


    $stmt->execute();
    echo"Error: %s.\n".$stmt->error;
    
    
}

$message = "Successfully Added Profile";
header('Location: ../menu.php?res='.$message);

    


?>