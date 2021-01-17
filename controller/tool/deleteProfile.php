<?php 
    $server = "127.0.0.1";
    $dbuser = "root";
    $dbpass = "";
    $dbname = "forge";

    $conn = mysqli_connect($server, $dbuser, $dbpass, $dbname);    
    if(isset($_GET['id'])){
    $id = $_GET['id'];

    $conn->query('SET FOREIGN_KEY_CHECKS=0;');
    $sql = "DELETE FROM profile WHERE id='$id'";

    if ($conn->query($sql) === TRUE) {
      $msg = "Record deleted successfully";
      echo $msg;
      $conn->query('SET FOREIGN_KEY_CHECKS=1;');

      header('Location: ../../menu.php?res='.$msg);

    } else {
      echo "Error deleting record: " . $conn->error;
    }


 }
?>