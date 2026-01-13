<?php
include 'connect.php';

$id = $_GET['id'];
$sql = "SELECT * FROM attendance WHERE id = ?";
$stmt = $con->prepare($sql);
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();
$row = $result->fetch_assoc();

$student_id = $row['student_id'];
$date = $row['date'];
$status = $row['status'];
$notes = $row['notes'];

if(isset($_POST['submit'])){
    $date = $_POST['date'];
    $status = $_POST['status'];
    $notes = $_POST['notes'];
    
    $sql = "UPDATE attendance SET date = ?, status = ?, notes = ? WHERE id = ?";
    $stmt = $con->prepare($sql);
    $stmt->bind_param("sssi", $date, $status, $notes, $id);
    
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
    <title>Edit Attendance</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css">
</head>
<body>
    <div class="container my-5">
        <h3>Edit Attendance</h3>
        <form method="post">
            <div class="form-group">
                <label>Date</label>
                <input type="date" class="form-control" name="date" required value="<?php echo $date; ?>">
            </div>

            <div class="form-group">
                <label>Attendance Status</label>
                <select class="form-control" name="status" required>
                    <option value="present" <?php if($status == 'present') echo 'selected'; ?>>Present</option>
                    <option value="absent" <?php if($status == 'absent') echo 'selected'; ?>>Absent</option>
                    <option value="late" <?php if($status == 'late') echo 'selected'; ?>>Late</option>
                </select>
            </div>

            <div class="form-group">
                <label>Notes</label>
                <textarea class="form-control" placeholder="Enter any notes" name="notes" rows="3"><?php echo $notes; ?></textarea>
            </div>

            <button type="submit" class="btn btn-primary" name="submit">Update Attendance</button>
            <a href="attendance.php" class="btn btn-secondary">Back</a>
        </form>
    </div>
</body>
</html>
