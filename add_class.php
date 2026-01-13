<?php
include 'connect.php';

if(isset($_POST['submit'])){
    $name = $_POST['name'];
    $section = $_POST['section'];
    $year = $_POST['year'];
    
    $sql = "INSERT INTO classes (name, section, year) VALUES (?, ?, ?)";
    $stmt = $con->prepare($sql);
    $stmt->bind_param("sss", $name, $section, $year);
    
    if($stmt->execute()){
        header('location:classes.php');
    } else {
        die("Error: " . $con->error);
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Class</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css">
</head>
<body>
    <div class="container my-5">
        <h3>Add New Class</h3>
        <form method="post">
            <div class="form-group">
                <label>Class Name</label>
                <input type="text" class="form-control" placeholder="Enter class name (e.g., Class 10A)" name="name" autocomplete="off" required>
            </div>

            <div class="form-group">
                <label>Section</label>
                <input type="text" class="form-control" placeholder="Enter section (e.g., A, B, C)" name="section" autocomplete="off">
            </div>

            <div class="form-group">
                <label>Year</label>
                <input type="text" class="form-control" placeholder="Enter year (e.g., 2025-2026)" name="year" autocomplete="off">
            </div>

            <button type="submit" class="btn btn-primary" name="submit">Add Class</button>
            <a href="classes.php" class="btn btn-secondary">Back</a>
        </form>
    </div>
</body>
</html>
