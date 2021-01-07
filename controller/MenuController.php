<?php

require_once '../model/db.php';

session_start();

$uid = $_SESSION['uid'];
echo 'UID'.$uid.'<br>';
// [PROFILE ID]
$prof_id = 0;


// [Prof_ID] Retrieval Start
$query = "SELECT prof_id FROM users WHERE uid='$uid'";
$result = $conn->query($query);

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
    $prof_id = $row['prof_id'];
    echo "PROF_ID:".$prof_id.'<br>';
  }
} else {
  echo "0 results";
}
// [Prof_ID] Retrieval End


// [Serialized Menu] Retrieval Start
// [MENU GROUP]
$menugroup = "";

$query = "SELECT menugroup, FROM profile WHERE prof_id='$prof_id'";
$result = $conn->query($query);

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
    echo "Serialized: ".$row['menugroup'].'<br>';
    $menugroup = unserialize($row['menugroup']);
    echo "Unserialized: ".var_dump($menugroup).'<br>';
  }
} else {
  echo "0 results";
}

// ICON RETRIEVAL
$fa_icon = "";
$query = "SELECT icon FROM menu WHERE menuGroup='$menugroup'";
$result = $conn->query($query);

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
    $fa_icon = $row['icon'];
  }
} else {
  echo "0 results";
}

// [Serialized Menu] Retrieval End


// [Module] Retrieval Start

// [Module] Retrieval End

// [Parsing Menu Array] Start

// [Parsing Menu Array] End




   echo '<li class="sidebar-dropdown">
  <a href="#"><i class="'.$fa_icon.'"></i><span>'.$menuGroup.'</span></a>
  <div class="sidebar-submenu">
      <ul>';

      $query = "SELECT moduleName, moduleProcess FROM modules WHERE menuGroup='$menugroup'";
        $result = $conn->query($query);

        if ($result->num_rows > 0) {
        // output data of each row
        while($row = $result->fetch_assoc()) {
            echo '<li><a href="'.$moduleProcess.'">'.$row['moduleName'].'</a></li>';
        }
        } else {
        echo "0 results";
        }

     
     
     
          echo '</ul>
  </div>
</li>';


 



    
?>