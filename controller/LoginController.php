<?php
if (session_status() == PHP_SESSION_NONE) {
  session_start();
}
  require_once '../model/db.php';

  $uid = mysqli_real_escape_string($conn,$_POST['uid']);
  $password = mysqli_real_escape_string($conn,$_POST['password']);
 
  try {


    if (!$uid || !$password) {
      throw new Exception('Incomplete credentials');
    }

    $dbError = mysqli_connect_errno();
    
    if ($dbError) {
      throw new Exception('Could not connect to the database.');
    }


    $sql = "SELECT * FROM users WHERE uid ='$uid'";

    $result = mysqli_query($conn,$sql);

    $row = mysqli_fetch_array($result,MYSQLI_ASSOC);

    $count = mysqli_num_rows($result);

    if ($count<= 0) {
      throw new Exception("Account does not exist.");

    }

    $sql = "SELECT * FROM users WHERE uid ='$uid'";

    $result = mysqli_query($conn,$sql);

    while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {

      
      //setting values
      $hash = $row['password'];

      if (password_verify($password,$hash)) {
        $_SESSION['id'] = $row['id'];
        $_SESSION['uid'] = $row['uid'];
        $_SESSION['fname'] = $row['fname'];
        $_SESSION['mname'] = $row['mname'];
        $_SESSION['lname'] = $row['lname'];
        $_SESSION['role'] = $row['role'];
        header('Location: ../dashboard.php');
      } else {
        throw new Exception('Incorrect Login Credentials!');

      }
   
      }
    }catch(Exception $e) {
    header('Location: ../index.php?error='.$e->getMessage());
  }

  
  echo 'SESSION:'.$_SESSION['uid'];

?>