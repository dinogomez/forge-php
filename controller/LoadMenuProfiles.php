<?php
   require 'controller/tool/CheckLogin.php';
   require 'controller/tool/deleteProfile.php';

   $sql = "SELECT * FROM profile";
   $result = $conn->query($sql);
   
   if ($result->num_rows > 0) {
   // output data of each row
   while($row = $result->fetch_assoc()) {
    echo '<tr>
            <th scope="row">'.$row['id'].'</th>
            <td>'.$row['label'].'</td>
            <td class="edge">
                <a class="mx-2" href="#"><i class="fas fa-edit text-primary fs-5"></i></a>
                <a class="mx-2" href="controller/tool/deleteProfile.php?id='.$row['id'].'"><i class="fas fa-trash text-danger fs-5"></i></a>
            </td>
        </tr>';
   
   }
   } else {
   echo "0 results";
   }

   
?>