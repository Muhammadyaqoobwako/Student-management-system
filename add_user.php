<?php
include 'connect.php';

if(isset($_POST['submit'])){
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $role = $_POST['role'];
    
    // Hash password
    $password_hash = password_hash($password, PASSWORD_DEFAULT);
    
    $sql = "INSERT INTO users (username, email, password_hash, role) VALUES (?, ?, ?, ?)";
    $stmt = $con->prepare($sql);
    $stmt->bind_param("ssss", $username, $email, $password_hash, $role);
    
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
    <title>Add User</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css">
</head>
<body>
    <div class="container my-5">
        <h3>Add New User (Admin/Teacher)</h3>
        <form method="post">
            <div class="form-group">
                <label>Username</label>
                <input type="text" class="form-control" placeholder="Enter username" name="username" autocomplete="off" required>
            </div>

            <div class="form-group">
                <label>Email</label>
                <input type="email" class="form-control" placeholder="Enter email" name="email" autocomplete="off" required>
            </div>

            <div class="form-group">
                <label>Password</label>
                <input type="password" class="form-control" placeholder="Enter password" name="password" autocomplete="off" required>
            </div>

            <div class="form-group">
                <label>Role</label>
                <select class="form-control" name="role" required>
                    <option value="">-- Select Role --</option>
                    <option value="admin">Admin</option>
                    <option value="teacher">Teacher</option>
                </select>
            </div>

            <button type="submit" class="btn btn-primary" name="submit">Add User</button>
            <a href="users_manage.php" class="btn btn-secondary">Back</a>
        </form>
    </div>
</body>
</html>
