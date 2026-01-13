<?php
include 'connect.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Enrollments</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <h2 class="my-4">Student Enrollments</h2>
        <button class="btn btn-success mb-3"><a href="add_enrollment.php" class="text-light">Add Enrollment</a></button>
        <a href="index.php" class="btn btn-secondary mb-3">Back to Dashboard</a>
        
        <table class="table table-striped">
            <thead class="table-dark">
                <tr>
                    <th>ID</th>
                    <th>Student Name</th>
                    <th>Course</th>
                    <th>Semester</th>
                    <th>Grade</th>
                    <th>Enrolled Date</th>
                    <th>Operations</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $sql = "SELECT e.id, s.first_name, s.last_name, c.title, e.semester, e.grade, e.created_at 
                        FROM enrollments e
                        JOIN students s ON e.student_id = s.id
                        JOIN courses c ON e.course_id = c.id
                        ORDER BY e.created_at DESC";
                $result = mysqli_query($con, $sql);
                
                if($result && mysqli_num_rows($result) > 0){
                    while($row = mysqli_fetch_assoc($result)){
                        echo '<tr>
                            <td>'.$row['id'].'</td>
                            <td>'.$row['first_name'].' '.$row['last_name'].'</td>
                            <td>'.$row['title'].'</td>
                            <td>'.$row['semester'].'</td>
                            <td>'.$row['grade'].'</td>
                            <td>'.$row['created_at'].'</td>
                            <td>
                                <button class="btn btn-danger btn-sm"><a href="delete_enrollment.php?id='.$row['id'].'" class="text-light">Remove</a></button>
                            </td>
                        </tr>';
                    }
                } else {
                    echo '<tr><td colspan="7" class="text-center">No enrollments found</td></tr>';
                }
                ?>
            </tbody>
        </table>
    </div>
</body>
</html>
