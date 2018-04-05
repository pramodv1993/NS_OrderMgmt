<?php

   $location = $_POST['Location'];
   $customerName = $_POST['CustomerName'];
   $frameMaterial = $_POST['FrameMaterial'];
   

 //need to add validation

//store in backend
include_once 'Constants.php';
$conn = new mysqli(DB_HOST,DB_USER,DB_PASSWD,DB_NAME);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "INSERT INTO Orders (Frame_Material,CustomerName,Location) VALUES ('$frameMaterial','$customerName','$location')";

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();


?> 