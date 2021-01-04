<?php
 session_start();
 if(!isset($_SESSION['uid'])){
     session_destroy();
     header('Location: index.php');
 }

 
    $cars = array (
        array("Volvo",22,18),
        array("BMW",15,13),
        array("Saab",5,2),
        array("Land Rover",17,15)
    );


?>