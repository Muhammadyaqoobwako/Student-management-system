<?php
include 'connect.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Marks</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <h2 class="my-4">Student Marks/Grades</h2>
        <button class="btn btn-success mb-3"><a href="add_marks.php" class="text-light">Add Marks</a></button>
        <a href="index.php" class="btn btn-secondary mb-3">Back to Dashboard</a>
        
        <table class="table table-striped">
            <thead class="table-dark">
                <tr>
                    <th>ID</th>
                    <th>Student Name</th>
                    <th>Course</th>
                    <th>Term</th>
                    <th>Marks</th>
                    <th>Grade</th>
                    <th>Operations</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $sql = "SELECT m.id, s.first_name, s.last_name, c.title, m.term, m.marks, m.grade
                        FROM marks m
                        JOIN students s ON m.student_id = s.id
                        JOIN courses c ON m.course_id = c.id
                        ORDER BY m.term DESC, s.first_name";
                $result = mysqli_query($con, $sql);
                
                if($result && mysqli_num_rows($result) > 0){
                    while($row = mysqli_fetch_assoc($result)){
                        echo '<tr>
                            <td>'.$row['id'].'</td>
                            <td>'.$row['first_name'].' '.$row['last_name'].'</td>
                            <td>'.$row['title'].'</td>
                            <td>'.$row['term'].'</td>
                            <td>'.$row['marks'].'</td>
                            <td>'.$row['grade'].'</td>
                            <td>
                                <button class="btn btn-info btn-sm"><a href="edit_marks.php?id='.$row['id'].'" class="text-light">Edit</a></button>
                                <button class="btn btn-danger btn-sm"><a href="delete_marks.php?id='.$row['id'].'" class="text-light">Delete</a></button>
                            </td>
                        </tr>';
                    }
                } else {
                    echo '<tr><td colspan="7" class="text-center">No marks records found</td></tr>';
                }
                ?>
            </tbody>
        </table>
    </div>
</body>
</html>
