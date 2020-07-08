<?php

//create connection to the DB
function Connect() {
    $dbserver = "localhost";
    $dbuser = "root";
    $dbpass = "";
    $dbname = "Robot";
    $conn = new mysqli($dbserver, $dbuser, $dbpass, $dbname) or die("Connect failed: %s\n". $conn -> error); //servername, username, password, DBname.
    return $conn;
}

//Close connection 
function Disconnect($conn) {
    $conn -> close();
}

//Insertion to DB
function Insert($move, $conn) {
    $stmt= "INSERT INTO Movements (Movement_direction)
    VALUES ('$move')";

    if ($conn->query($stmt) === TRUE) {
       // echo $move;
    } else {
        echo "Error: " . $stmt . "<br>" . $conn->error;
    }
}

//Open connection
$conn = Connect();


// Conditions  
if(array_key_exists('br', $_POST)) {
    Insert("R", $conn);
}
else if(array_key_exists('bl', $_POST)) {
    Insert("L", $conn);
}
else if(array_key_exists('bb', $_POST)) {
    Insert("B", $conn);
}
else if(array_key_exists('bf', $_POST)) {
    Insert("F", $conn);
}
else if(array_key_exists('bs', $_POST)) {
    Insert("S", $conn);
}

//Close connection
Disconnect($conn);
?>