<?php
include 'connect.php';

if(isset($_POST['submit'])){
    $student_id = $_POST['student_id'];
    $course_id = $_POST['course_id'];
    $semester = $_POST['semester'];
    $grade = $_POST['grade'];
    
    $sql = "INSERT INTO enrollments (student_id, course_id, semester, grade) VALUES (?, ?, ?, ?)";
    $stmt = $con->prepare($sql);
    $stmt->bind_param("iiss", $student_id, $course_id, $semester, $grade);
    
    if($stmt->execute()){
        header('location:enrollments.php');
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
    <title>Add Enrollment</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css">
</head>
<body>
    <div class="container my-5">
        <h3>Add Student Enrollment</h3>
        <form method="post">
            <div class="form-group">
                <label>Select Student</label>
                <select class="form-control" name="student_id" required>
                    <option value="">-- Choose Student --</option>
                    <?php
                    $sql = "SELECT id, first_name, last_name, roll_no FROM students ORDER BY first_name";
                    $result = mysqli_query($con, $sql);
                    while($row = mysqli_fetch_assoc($result)){
                        echo '<option value="'.$row['id'].'">'.$row['first_name'].' '.$row['last_name'].' ('.$row['roll_no'].')</option>';
                    }
                    ?>
                </select>
            </div>

            <div class="form-group">
                <label>Select Course</label>
                <select class="form-control" name="course_id" required>
                    <option value="">-- Choose Course --</option>
                    <?php
                    $sql = "SELECT id, code, title FROM courses ORDER BY title";
                    $result = mysqli_query($con, $sql);
                    while($row = mysqli_fetch_assoc($result)){
                        echo '<option value="'.$row['id'].'">'.$row['code'].' - '.$row['title'].'</option>';
                    }
                    ?>
                </select>
            </div>

            <div class="form-group">
                <label>Semester</label>
                <input type="text" class="form-control" placeholder="Enter semester (e.g., Fall 2025)" name="semester" autocomplete="off">
            </div>

            <div class="form-group">
                <label>Grade</label>
                <input type="text" class="form-control" placeholder="Enter grade (e.g., A, B, C)" name="grade" autocomplete="off">
            </div>

            <button type="submit" class="btn btn-primary" name="submit">Add Enrollment</button>
            <a href="enrollments.php" class="btn btn-secondary">Back</a>
        </form>
    </div>
</body>
</html>
