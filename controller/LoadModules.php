<?php 

    require_once 'forge-php\model\db.php';
    
    $sql = "SELECT * FROM menu";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
    
    while($row = $result->fetch_assoc()) {
        echo '<div class="form-check">
        <input class="form-check-input" name="menu[]" type="checkbox" value="'.$row['menu'].'" id="flexCheckDefault">
        <label class="form-check-label" for="flexCheckDefault">
        '.$row['menu'].'
        </label>
    </div>';
    }
    } else {
    echo "0 results";
    }
    


?>