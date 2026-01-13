<?php
include 'connect.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Management System</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"> 
</head>
<body>
    <div class="container">
        <button class="btn btn-primary my-5"><a href="user.php" class="text-light">Add user</a>
    </button>
    <table class="table">
  <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Roll No</th>
      <th scope="col">Name</th>
      <th scope="col">Email</th>
      <th scope="col">Phone</th>
      <th scope="col">Gender</th>
      <th scope="col">Status</th>
      <th scope="col">Operations</th>
    </tr>
  </thead>
  <tbody>

  <?php
    $sql= "select * from `students`";
    $result=mysqli_query($con,$sql);
    if($result){
        while($row=mysqli_fetch_assoc($result)){
            $id=$row['id'];
            $roll_no=$row['roll_no'];
            $first_name=$row['first_name'];
            $last_name=$row['last_name'];
            $email=$row['email'];
            $phone=$row['phone'];
            $gender=$row['gender'];
            $status=$row['status'];
            echo '<tr>
            <th scope="row">'.$id.'</th>
            <td>'.$roll_no.'</td>
            <td>'.$first_name.' '.$last_name.'</td>
            <td>'.$email.'</td>
            <td>'.$phone.'</td>
            <td>'.$gender.'</td>
            <td>'.$status.'</td>
            <td>
            <button class="btn btn-primary"><a href="update.php?updateid='.$id.'" class="text-light">Update</a></button>
            <button class="btn btn-danger"><a href="delete.php?deleteid='.$id.'" class="text-light">Delete</a></button>
          </td>
          </tr>';
        }
    } 
  ?>
    <!-- <tr>
      <th scope="row">1</th>
      <td>Mark</td>
      <td>Otto</td>
      <td>@mdo</td>
    </tr>
    <tr>
      <th scope="row">2</th>
      <td>Jacob</td>
      <td>Thornton</td>
      <td>@fat</td>
    </tr>
    <tr>
      <th scope="row">3</th>
      <td>Larry</td>
      <td>the Bird</td>
      <td>@twitter</td>
    </tr> -->
  </tbody>
</table>
    </div>
</body>
</html>