<?php
include 'connect.php';

$id = $_GET['id'];
$sql = "SELECT * FROM classes WHERE id = ?";
$stmt = $con->prepare($sql);
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();
$row = $result->fetch_assoc();

$name = $row['name'];
$section = $row['section'];
$year = $row['year'];

if(isset($_POST['submit'])){
    $name = $_POST['name'];
    $section = $_POST['section'];
    $year = $_POST['year'];
    
    $sql = "UPDATE classes SET name = ?, section = ?, year = ? WHERE id = ?";
    $stmt = $con->prepare($sql);
    $stmt->bind_param("sssi", $name, $section, $year, $id);
    
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
    <title>Edit Class</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css">
</head>
<body>
    <div class="container my-5">
        <h3>Edit Class</h3>
        <form method="post">
            <div class="form-group">
                <label>Class Name</label>
                <input type="text" class="form-control" placeholder="Enter class name" name="name" autocomplete="off" value="<?php echo $name;?>" required>
            </div>

            <div class="form-group">
                <label>Section</label>
                <input type="text" class="form-control" placeholder="Enter section" name="section" autocomplete="off" value="<?php echo $section;?>">
            </div>

            <div class="form-group">
                <label>Year</label>
                <input type="text" class="form-control" placeholder="Enter year" name="year" autocomplete="off" value="<?php echo $year;?>">
            </div>

            <button type="submit" class="btn btn-primary" name="submit">Update Class</button>
            <a href="classes.php" class="btn btn-secondary">Back</a>
        </form>
    </div>
</body>
</html>
