<?php
include 'connect.php';

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

  // Hash the password
  $password_hash=password_hash($password, PASSWORD_DEFAULT);

  // Prepared statement to prevent SQL injection
  $sql="INSERT INTO `students` (`roll_no`,`first_name`,`last_name`,`email`,`phone`,`gender`,`dob`,`class_id`,`address`,`password_hash`)
  VALUES (?,?,?,?,?,?,?,?,?,?)";
  
  $stmt=$con->prepare($sql);
  $stmt->bind_param("sssssssssi", $roll_no, $first_name, $last_name, $email, $phone, $gender, $dob, $address, $password_hash, $class_id);

  $result=$stmt->execute();

  if($result){
    // echo "Student added successfully";
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
        <h3>Add New Student</h3>
        <form method="post">
  <div class="form-group">
    <label>Roll No</label>
    <input type="text" class="form-control" placeholder="Enter roll number" name="roll_no" autocomplete="off" required>
  </div>

  <div class="form-group">
    <label>First Name</label>
    <input type="text" class="form-control" placeholder="Enter first name" name="first_name" autocomplete="off" required>
  </div>

  <div class="form-group">
    <label>Last Name</label>
    <input type="text" class="form-control" placeholder="Enter last name" name="last_name" autocomplete="off">
  </div>

  <div class="form-group">
    <label>Email</label>
    <input type="email" class="form-control" placeholder="Enter email" name="email" autocomplete="off" required>
  </div>

  <div class="form-group">
    <label>Phone</label>
    <input type="text" class="form-control" placeholder="Enter phone number" name="phone" autocomplete="off">
  </div>

  <div class="form-group">
    <label>Gender</label>
    <select class="form-control" name="gender">
      <option value="Other">Select Gender</option>
      <option value="M">Male</option>
      <option value="F">Female</option>
      <option value="Other">Other</option>
    </select>
  </div>

  <div class="form-group">
    <label>Date of Birth</label>
    <input type="date" class="form-control" name="dob" autocomplete="off">
  </div>

  <div class="form-group">
    <label>Class ID</label>
    <input type="number" class="form-control" placeholder="Enter class ID" name="class_id" autocomplete="off">
  </div>

  <div class="form-group">
    <label>Address</label>
    <textarea class="form-control" placeholder="Enter address" name="address" autocomplete="off"></textarea>
  </div>

  <div class="form-group">
    <label>Password</label>
    <input type="password" class="form-control" placeholder="Enter password" name="password" autocomplete="off" required>
  </div>

  <button type="submit" class="btn btn-primary" name="submit">Add Student</button>
  <a href="display.php" class="btn btn-secondary">Back</a>
</form>
    </div>

    
  </body>
</html>