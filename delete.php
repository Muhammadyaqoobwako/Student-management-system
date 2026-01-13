<?php
include 'connect.php';
if(isset($_GET['deleteid'])){
    $id=$_GET['deleteid'];

    // Prepared statement to delete from students table
    $sql="delete from `students` where id=?";
    
    $stmt=$con->prepare($sql);
    $stmt->bind_param("i", $id);
    $result=$stmt->execute();

    if($result){
        // echo "Deleted successfully";
        header('location:display.php');
    }else{
        die("Error: " . $con->error);
    }
}

?>