<?php
include 'connect.php';

if(isset($_POST['submit'])){
    $student_id = $_POST['student_id'];
    $course_id = $_POST['course_id'];
    $term = $_POST['term'];
    $marks = $_POST['marks'];
    $grade = $_POST['grade'];
    
    $sql = "INSERT INTO marks (student_id, course_id, term, marks, grade) VALUES (?, ?, ?, ?, ?)";
    $stmt = $con->prepare($sql);
    $stmt->bind_param("iisds", $student_id, $course_id, $term, $marks, $grade);
    
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
    <title>Add Marks</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css">
</head>
<body>
    <div class="container my-5">
        <h3>Add Student Marks</h3>
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
                <label>Term/Exam</label>
                <input type="text" class="form-control" placeholder="Enter term (e.g., Mid-Term, Final)" name="term" autocomplete="off" required>
            </div>

            <div class="form-group">
                <label>Marks</label>
                <input type="number" step="0.01" class="form-control" placeholder="Enter marks out of total" name="marks" autocomplete="off" required>
            </div>

            <div class="form-group">
                <label>Grade</label>
                <input type="text" class="form-control" placeholder="Enter grade (e.g., A, B, C)" name="grade" autocomplete="off">
            </div>

            <button type="submit" class="btn btn-primary" name="submit">Add Marks</button>
            <a href="marks.php" class="btn btn-secondary">Back</a>
        </form>
    </div>
</body>
</html>
