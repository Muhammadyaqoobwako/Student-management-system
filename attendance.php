<?php
include 'connect.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Attendance</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <h2 class="my-4">Attendance Records</h2>
        <button class="btn btn-success mb-3"><a href="add_attendance.php" class="text-light">Mark Attendance</a></button>
        <a href="index.php" class="btn btn-secondary mb-3">Back to Dashboard</a>
        
        <table class="table table-striped">
            <thead class="table-dark">
                <tr>
                    <th>ID</th>
                    <th>Student Name</th>
                    <th>Roll No</th>
                    <th>Date</th>
                    <th>Status</th>
                    <th>Notes</th>
                    <th>Operations</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $sql = "SELECT a.id, s.first_name, s.last_name, s.roll_no, a.date, a.status, a.notes
                        FROM attendance a
                        JOIN students s ON a.student_id = s.id
                        ORDER BY a.date DESC
                        LIMIT 100";
                $result = mysqli_query($con, $sql);
                
                if($result && mysqli_num_rows($result) > 0){
                    while($row = mysqli_fetch_assoc($result)){
                        $statusBadge = $row['status'] == 'present' ? 'badge-success' : ($row['status'] == 'absent' ? 'badge-danger' : 'badge-warning');
                        echo '<tr>
                            <td>'.$row['id'].'</td>
                            <td>'.$row['first_name'].' '.$row['last_name'].'</td>
                            <td>'.$row['roll_no'].'</td>
                            <td>'.$row['date'].'</td>
                            <td><span class="badge '.$statusBadge.'">'.$row['status'].'</span></td>
                            <td>'.$row['notes'].'</td>
                            <td>
                                <button class="btn btn-info btn-sm"><a href="edit_attendance.php?id='.$row['id'].'" class="text-light">Edit</a></button>
                            </td>
                        </tr>';
                    }
                } else {
                    echo '<tr><td colspan="7" class="text-center">No attendance records found</td></tr>';
                }
                ?>
            </tbody>
        </table>
    </div>
</body>
</html>
