<?php
include 'connect.php';

if(isset($_POST['submit'])){
    $student_id = $_POST['student_id'];
    $date = $_POST['date'];
    $status = $_POST['status'];
    $notes = $_POST['notes'];
    
    $sql = "INSERT INTO attendance (student_id, date, status, notes) VALUES (?, ?, ?, ?)";
    $stmt = $con->prepare($sql);
    $stmt->bind_param("isss", $student_id, $date, $status, $notes);
    
    if($stmt->execute()){
        header('location:attendance.php');
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
    <title>Mark Attendance</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css">
</head>
<body>
    <div class="container my-5">
        <h3>Mark Student Attendance</h3>
        <form method="post">
            <div class="form-group">
                <label>Select Student</label>
                <select class="form-control" name="student_id" required>
                    <option value="">-- Choose Student --</option>
                    <?php
                    $sql = "SELECT id, first_name, last_name, roll_no FROM students WHERE status = 'active' ORDER BY first_name";
                    $result = mysqli_query($con, $sql);
                    while($row = mysqli_fetch_assoc($result)){
                        echo '<option value="'.$row['id'].'">'.$row['first_name'].' '.$row['last_name'].' ('.$row['roll_no'].')</option>';
                    }
                    ?>
                </select>
            </div>

            <div class="form-group">
                <label>Date</label>
                <input type="date" class="form-control" name="date" required value="<?php echo date('Y-m-d'); ?>">
            </div>

            <div class="form-group">
                <label>Attendance Status</label>
                <select class="form-control" name="status" required>
                    <option value="">-- Select Status --</option>
                    <option value="present">Present</option>
                    <option value="absent">Absent</option>
                    <option value="late">Late</option>
                </select>
            </div>

            <div class="form-group">
                <label>Notes</label>
                <textarea class="form-control" placeholder="Enter any notes (optional)" name="notes" rows="3"></textarea>
            </div>

            <button type="submit" class="btn btn-primary" name="submit">Mark Attendance</button>
            <a href="attendance.php" class="btn btn-secondary">Back</a>
        </form>
    </div>
</body>
</html>
