<?php
include 'connect.php';
$id=$_GET['updateid'];

$sql="select * from `students` where id=$id";
$result=mysqli_query($con,$sql);
$row=mysqli_fetch_assoc($result);
$roll_no=$row['roll_no'];
$first_name=$row['first_name'];
$last_name=$row['last_name'];
$email=$row['email'];
$phone=$row['phone'];
$gender=$row['gender'];
$dob=$row['dob'];
$class_id=$row['class_id'];
$address=$row['address'];
$password_hash=$row['password_hash'];


if(isset($_POST['submit'])){
  $roll_no=$_POST['roll_no'];
  $first_name=$_POST['first_name'];
  $last_name=$_POST['last_name'];
  $email=$_POST['email'];
  $phone=$_POST['phone'];
  $gender=$_POST['gender'];
  $dob=$_POST['dob'];
  $class_id=$_POST['class_id'];
  $address=$_POST['address'];
  $password=$_POST['password'];

  // Hash password only if changed
  if(!empty($password)){
    $password_hash=password_hash($password, PASSWORD_DEFAULT);
  }

  // Prepared statement
  $sql= "update `students` set roll_no=?, first_name=?, last_name=?, email=?, phone=?, gender=?, dob=?, class_id=?, address=?, password_hash=? where id=?";
  
  $stmt=$con->prepare($sql);
  $stmt->bind_param("sssssssissi", $roll_no, $first_name, $last_name, $email, $phone, $gender, $dob, $class_id, $address, $password_hash, $id);

  $result=$stmt->execute();

  if($result){
    // echo "updated successfully";
    header('location:display.php');
  }else{
    die("Error: " . $con->error);
  }
}
?>


<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css">

    <title>Student Management System</title>
  </head>
  <body>
    <div class="container my-5">
        <h3>Update Student</h3>
        <form method="post">
  <div class="form-group">
    <label>Roll No</label>
    <input type="text" class="form-control" placeholder="Enter roll number" name="roll_no" autocomplete="off" value="<?php echo $roll_no;?>" required>
  </div>

  <div class="form-group">
    <label>First Name</label>
    <input type="text" class="form-control" placeholder="Enter first name" name="first_name" autocomplete="off" value="<?php echo $first_name;?>" required>
  </div>

  <div class="form-group">
    <label>Last Name</label>
    <input type="text" class="form-control" placeholder="Enter last name" name="last_name" autocomplete="off" value="<?php echo $last_name;?>">
  </div>

  <div class="form-group">
    <label>Email</label>
    <input type="email" class="form-control" placeholder="Enter email" name="email" autocomplete="off" value="<?php echo $email;?>" required>
  </div>

  <div class="form-group">
    <label>Phone</label>
    <input type="text" class="form-control" placeholder="Enter phone number" name="phone" autocomplete="off" value="<?php echo $phone;?>">
  </div>

  <div class="form-group">
    <label>Gender</label>
    <select class="form-control" name="gender">
      <option value="Other" <?php if($gender=='Other') echo 'selected'; ?>>Other</option>
      <option value="M" <?php if($gender=='M') echo 'selected'; ?>>Male</option>
      <option value="F" <?php if($gender=='F') echo 'selected'; ?>>Female</option>
    </select>
  </div>

  <div class="form-group">
    <label>Date of Birth</label>
    <input type="date" class="form-control" name="dob" value="<?php echo $dob;?>">
  </div>

  <div class="form-group">
    <label>Class ID</label>
    <input type="number" class="form-control" placeholder="Enter class ID" name="class_id" value="<?php echo $class_id;?>">
  </div>

  <div class="form-group">
    <label>Address</label>
    <textarea class="form-control" placeholder="Enter address" name="address" autocomplete="off"><?php echo $address;?></textarea>
  </div>

  <div class="form-group">
    <label>Password (leave blank to keep current)</label>
    <input type="password" class="form-control" placeholder="Enter new password or leave blank" name="password" autocomplete="off">
  </div>

  <button type="submit" class="btn btn-primary" name="submit">Update Student</button>
  <a href="display.php" class="btn btn-secondary">Back</a>
</form>
    </div>

    
  </body>
</html>