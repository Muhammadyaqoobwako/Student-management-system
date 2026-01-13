<?php
include 'connect.php';

$id = $_GET['id'];
$sql = "SELECT id, username, email, role FROM users WHERE id = ?";
$stmt = $con->prepare($sql);
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();
$row = $result->fetch_assoc();

$username = $row['username'];
$email = $row['email'];
$role = $row['role'];

if(isset($_POST['submit'])){
    $username = $_POST['username'];
    $email = $_POST['email'];
    $role = $_POST['role'];
    $password = $_POST['password'];
    
    if(!empty($password)){
        $password_hash = password_hash($password, PASSWORD_DEFAULT);
        $sql = "UPDATE users SET username = ?, email = ?, role = ?, password_hash = ? WHERE id = ?";
        $stmt = $con->prepare($sql);
        $stmt->bind_param("ssssi", $username, $email, $role, $password_hash, $id);
    } else {
        $sql = "UPDATE users SET username = ?, email = ?, role = ? WHERE id = ?";
        $stmt = $con->prepare($sql);
        $stmt->bind_param("sssi", $username, $email, $role, $id);
    }
    
    if($stmt->execute()){
        header('location:users_manage.php');
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
    <title>Edit User</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css">
</head>
<body>
    <div class="container my-5">
        <h3>Edit User</h3>
        <form method="post">
            <div class="form-group">
                <label>Username</label>
                <input type="text" class="form-control" placeholder="Enter username" name="username" autocomplete="off" value="<?php echo $username;?>" required>
            </div>

            <div class="form-group">
                <label>Email</label>
                <input type="email" class="form-control" placeholder="Enter email" name="email" autocomplete="off" value="<?php echo $email;?>" required>
            </div>

            <div class="form-group">
                <label>Password (leave blank to keep current)</label>
                <input type="password" class="form-control" placeholder="Enter new password or leave blank" name="password" autocomplete="off">
            </div>

            <div class="form-group">
                <label>Role</label>
                <select class="form-control" name="role" required>
                    <option value="admin" <?php if($role == 'admin') echo 'selected'; ?>>Admin</option>
                    <option value="teacher" <?php if($role == 'teacher') echo 'selected'; ?>>Teacher</option>
                </select>
            </div>

            <button type="submit" class="btn btn-primary" name="submit">Update User</button>
            <a href="users_manage.php" class="btn btn-secondary">Back</a>
        </form>
    </div>
</body>
</html>
