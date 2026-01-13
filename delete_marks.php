<?php
include 'connect.php';

if(isset($_GET['id'])){
    $id = $_GET['id'];
    
    $sql = "DELETE FROM marks WHERE id = ?";
    $stmt = $con->prepare($sql);
    $stmt->bind_param("i", $id);
    
    if($stmt->execute()){
        header('location:marks.php');
    } else {
        die("Error: " . $con->error);
    }
}
?>
