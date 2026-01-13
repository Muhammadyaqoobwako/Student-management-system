<?php
include 'connect.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Users</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <h2 class="my-4">Users Management (Admin/Teacher)</h2>
        <button class="btn btn-success mb-3"><a href="add_user.php" class="text-light">Add New User</a></button>
        <a href="index.php" class="btn btn-secondary mb-3">Back to Dashboard</a>
        
        <table class="table table-striped">
            <thead class="table-dark">
                <tr>
                    <th>ID</th>
                    <th>Username</th>
                    <th>Email</th>
                    <th>Role</th>
                    <th>Created</th>
                    <th>Operations</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $sql = "SELECT id, username, email, role, created_at FROM users ORDER BY created_at DESC";
                $result = mysqli_query($con, $sql);
                
                if($result && mysqli_num_rows($result) > 0){
                    while($row = mysqli_fetch_assoc($result)){
                        $roleBadge = $row['role'] == 'admin' ? 'badge-danger' : 'badge-info';
                        echo '<tr>
                            <td>'.$row['id'].'</td>
                            <td>'.$row['username'].'</td>
                            <td>'.$row['email'].'</td>
                            <td><span class="badge '.$roleBadge.'">'.$row['role'].'</span></td>
                            <td>'.$row['created_at'].'</td>
                            <td>
                                <button class="btn btn-info btn-sm"><a href="edit_user.php?id='.$row['id'].'" class="text-light">Edit</a></button>
                                <button class="btn btn-danger btn-sm"><a href="delete_user.php?id='.$row['id'].'" class="text-light">Delete</a></button>
                            </td>
                        </tr>';
                    }
                } else {
                    echo '<tr><td colspan="6" class="text-center">No users found</td></tr>';
                }
                ?>
            </tbody>
        </table>
    </div>
</body>
</html>
