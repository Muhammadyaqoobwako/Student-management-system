<?php
include 'connect.php';

$id = $_GET['id'];
$sql = "SELECT * FROM marks WHERE id = ?";
$stmt = $con->prepare($sql);
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();
$row = $result->fetch_assoc();

$student_id = $row['student_id'];
$course_id = $row['course_id'];
$term = $row['term'];
$marks = $row['marks'];
$grade = $row['grade'];

if(isset($_POST['submit'])){
    $term = $_POST['term'];
    $marks = $_POST['marks'];
    $grade = $_POST['grade'];
    
    $sql = "UPDATE marks SET term = ?, marks = ?, grade = ? WHERE id = ?";
    $stmt = $con->prepare($sql);
    $stmt->bind_param("sdsi", $term, $marks, $grade, $id);
    
    if($stmt->execute()){
        header('location:marks.php');
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
    <title>Edit Marks</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css">
</head>
<body>
    <div class="container my-5">
        <h3>Edit Student Marks</h3>
        <form method="post">
            <div class="form-group">
                <label>Term/Exam</label>
                <input type="text" class="form-control" placeholder="Enter term" name="term" autocomplete="off" value="<?php echo $term;?>" required>
            </div>

            <div class="form-group">
                <label>Marks</label>
                <input type="number" step="0.01" class="form-control" placeholder="Enter marks" name="marks" autocomplete="off" value="<?php echo $marks;?>" required>
            </div>

            <div class="form-group">
                <label>Grade</label>
                <input type="text" class="form-control" placeholder="Enter grade" name="grade" autocomplete="off" value="<?php echo $grade;?>">
            </div>

            <button type="submit" class="btn btn-primary" name="submit">Update Marks</button>
            <a href="marks.php" class="btn btn-secondary">Back</a>
        </form>
    </div>
</body>
</html>
