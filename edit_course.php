<?php
include 'connect.php';

$id = $_GET['id'];
$sql = "SELECT * FROM courses WHERE id = ?";
$stmt = $con->prepare($sql);
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();
$row = $result->fetch_assoc();

$code = $row['code'];
$title = $row['title'];
$description = $row['description'];
$credits = $row['credits'];

if(isset($_POST['submit'])){
    $code = $_POST['code'];
    $title = $_POST['title'];
    $description = $_POST['description'];
    $credits = $_POST['credits'];
    
    $sql = "UPDATE courses SET code = ?, title = ?, description = ?, credits = ? WHERE id = ?";
    $stmt = $con->prepare($sql);
    $stmt->bind_param("sssii", $code, $title, $description, $credits, $id);
    
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
    <title>Edit Course</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css">
</head>
<body>
    <div class="container my-5">
        <h3>Edit Course</h3>
        <form method="post">
            <div class="form-group">
                <label>Course Code</label>
                <input type="text" class="form-control" placeholder="Enter course code" name="code" autocomplete="off" value="<?php echo $code;?>" required>
            </div>

            <div class="form-group">
                <label>Title</label>
                <input type="text" class="form-control" placeholder="Enter course title" name="title" autocomplete="off" value="<?php echo $title;?>" required>
            </div>

            <div class="form-group">
                <label>Description</label>
                <textarea class="form-control" placeholder="Enter course description" name="description" rows="4"><?php echo $description;?></textarea>
            </div>

            <div class="form-group">
                <label>Credits</label>
                <input type="number" class="form-control" placeholder="Enter credit hours" name="credits" autocomplete="off" value="<?php echo $credits;?>">
            </div>

            <button type="submit" class="btn btn-primary" name="submit">Update Course</button>
            <a href="courses.php" class="btn btn-secondary">Back</a>
        </form>
    </div>
</body>
</html>
