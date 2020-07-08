<?php
include 'insert.php';

//Open connection
$conn = Connect();

//Selection from DB
function Select($move, $conn) {
    $stmt= "SELECT Movement_direction FROM Movements WHERE Movement_direction='$move' LIMIT 1";
    $result = $conn->query($stmt);
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
          echo $row["Movement_direction"]. "<br>";
        }
    }
    else {
        echo "Error: " . $stmt . "<br>" . $conn->error;
    }
}


// Conditions  
if(array_key_exists('br', $_POST)) {
    Select("R", $conn);
}
else if(array_key_exists('bl', $_POST)) {
    Select("L", $conn);
}
else if(array_key_exists('bb', $_POST)) {
    Select("B", $conn);
}
else if(array_key_exists('bf', $_POST)) {
    Select("F", $conn);
}
else if(array_key_exists('bs', $_POST)) {
    Select("S", $conn);
}

//Close connection
Disconnect($conn);

?>