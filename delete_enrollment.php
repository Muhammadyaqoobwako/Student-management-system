<?php
include 'connect.php';

if(isset($_GET['id'])){
    $id = $_GET['id'];
    
    $sql = "DELETE FROM enrollments WHERE id = ?";
    $stmt = $con->prepare($sql);
    $stmt->bind_param("i", $id);
    
    if($stmt->execute()){
        header('location:enrollments.php');
    } else {
        die("Error: " . $con->error);
    }
}
?>
