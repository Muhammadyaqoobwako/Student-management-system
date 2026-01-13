<?php
include 'connect.php';

if(isset($_POST['submit'])){
    $code = $_POST['code'];
    $title = $_POST['title'];
    $description = $_POST['description'];
    $credits = $_POST['credits'];
    
    $sql = "INSERT INTO courses (code, title, description, credits) VALUES (?, ?, ?, ?)";
    $stmt = $con->prepare($sql);
    $stmt->bind_param("sssi", $code, $title, $description, $credits);
    
    if($stmt->execute()){
        header('location:courses.php');
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
    <title>Add Course</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css">
</head>
<body>
    <div class="container my-5">
        <h3>Add New Course</h3>
        <form method="post">
            <div class="form-group">
                <label>Course Code</label>
                <input type="text" class="form-control" placeholder="Enter course code (e.g., CS101)" name="code" autocomplete="off" required>
            </div>

            <div class="form-group">
                <label>Title</label>
                <input type="text" class="form-control" placeholder="Enter course title" name="title" autocomplete="off" required>
            </div>

            <div class="form-group">
                <label>Description</label>
                <textarea class="form-control" placeholder="Enter course description" name="description" rows="4"></textarea>
            </div>

            <div class="form-group">
                <label>Credits</label>
                <input type="number" class="form-control" placeholder="Enter credit hours" name="credits" autocomplete="off" value="3">
            </div>

            <button type="submit" class="btn btn-primary" name="submit">Add Course</button>
            <a href="courses.php" class="btn btn-secondary">Back</a>
        </form>
    </div>
</body>
</html>
