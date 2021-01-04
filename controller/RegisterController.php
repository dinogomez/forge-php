<?php
    require_once '../model/db.php';

try {
  
  $dbError = mysqli_connect_errno();
  if ($dbError) {
    throw new Exception('Could not connect to database. Error: <br> '.$dbError);
  } else {
    echo 'Connected to db';
  }
  $uid = $_POST['uid'];
  $role = $_POST['role'];
  $prof_id = $_POST['prof_id'];
  $fname = $_POST['fname'];
  $mname = $_POST['mname'];
  $lname = $_POST['lname'];
  $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

  // echo '$_POST DATA'.'<br>'.$uid.'<br>'.$prof_id.'<br>'.$role.'<br>'.$password.'<br>'.$fname.'<br>'.$mname.'<br>'.$lname;
   /* Check connection */
   if (mysqli_connect_errno()) {
    printf("Connect failed: %s\n", mysqli_connect_error());
    exit();
  }

  $stmt = $conn->prepare("INSERT INTO users (uid, prof_id, password, role,  fname, mname, lname ) VALUES (?,?,?,?,?,?,?)");
  if (!$stmt) {
    throw new Exception($mysqli->error);
  }
  $stmt->bind_param('iisssss', $uid, $prof_id, $password, $role,  $fname, $mname, $lname);   // Bind $sample to the parameter


  /* Execute prepared statement */
  if (!$stmt->execute()) {
    throw new Exception($stmt->error);
  }

  /* Close statement and connection */
  $stmt->close();

  header('Location: ../register.php?res=success');



  
  


} catch (Exception $e) {
 /* if something fails inside try block will be catched here */
  echo '<br>'.'Errors';
  header('Location: ../register.php?res='.$e->getMessage());

  
}



?>