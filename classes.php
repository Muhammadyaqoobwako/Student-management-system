<?php
include 'connect.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Classes</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <h2 class="my-4">Classes Management</h2>
        <button class="btn btn-success mb-3"><a href="add_class.php" class="text-light">Add New Class</a></button>
        <a href="index.php" class="btn btn-secondary mb-3">Back to Dashboard</a>
        
        <table class="table table-striped">
            <thead class="table-dark">
                <tr>
                    <th>ID</th>
                    <th>Class Name</th>
                    <th>Section</th>
                    <th>Year</th>
                    <th>Created</th>
                    <th>Operations</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $sql = "SELECT * FROM classes";
                $result = mysqli_query($con, $sql);
                
                if($result && mysqli_num_rows($result) > 0){
                    while($row = mysqli_fetch_assoc($result)){
                        echo '<tr>
                            <td>'.$row['id'].'</td>
                            <td>'.$row['name'].'</td>
                            <td>'.$row['section'].'</td>
                            <td>'.$row['year'].'</td>
                            <td>'.$row['created_at'].'</td>
                            <td>
                                <button class="btn btn-info btn-sm"><a href="edit_class.php?id='.$row['id'].'" class="text-light">Edit</a></button>
                                <button class="btn btn-danger btn-sm"><a href="delete_class.php?id='.$row['id'].'" class="text-light">Delete</a></button>
                            </td>
                        </tr>';
                    }
                } else {
                    echo '<tr><td colspan="6" class="text-center">No classes found</td></tr>';
                }
                ?>
            </tbody>
        </table>
    </div>
</body>
</html>
