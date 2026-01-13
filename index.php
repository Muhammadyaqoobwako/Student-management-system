<?php
include 'connect.php';

// Get statistics
$students_count = mysqli_fetch_assoc(mysqli_query($con, "SELECT COUNT(*) as count FROM students"))['count'];
$classes_count = mysqli_fetch_assoc(mysqli_query($con, "SELECT COUNT(*) as count FROM classes"))['count'];
$courses_count = mysqli_fetch_assoc(mysqli_query($con, "SELECT COUNT(*) as count FROM courses"))['count'];
$enrollments_count = mysqli_fetch_assoc(mysqli_query($con, "SELECT COUNT(*) as count FROM enrollments"))['count'];
$attendance_count = mysqli_fetch_assoc(mysqli_query($con, "SELECT COUNT(*) as count FROM attendance"))['count'];
$marks_count = mysqli_fetch_assoc(mysqli_query($con, "SELECT COUNT(*) as count FROM marks"))['count'];
$users_count = mysqli_fetch_assoc(mysqli_query($con, "SELECT COUNT(*) as count FROM users"))['count'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Management System - Dashboard</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css">
    <style>
        body {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            min-height: 100vh;
            padding: 20px 0;
        }
        .dashboard-header {
            background: rgba(255,255,255,0.95);
            border-radius: 10px;
            padding: 30px;
            margin-bottom: 30px;
            box-shadow: 0 5px 15px rgba(0,0,0,0.1);
        }
        .stat-card {
            background: white;
            border-radius: 10px;
            padding: 20px;
            margin-bottom: 20px;
            box-shadow: 0 3px 10px rgba(0,0,0,0.1);
            text-align: center;
            transition: transform 0.3s ease;
        }
        .stat-card:hover {
            transform: translateY(-5px);
        }
        .stat-number {
            font-size: 32px;
            font-weight: bold;
            color: #667eea;
        }
        .stat-label {
            color: #666;
            margin-top: 10px;
            font-size: 14px;
        }
        .module-btn {
            display: block;
            padding: 15px;
            margin-bottom: 15px;
            text-decoration: none;
            border-radius: 5px;
            color: white;
            font-weight: 500;
            transition: all 0.3s ease;
        }
        .module-btn:hover {
            color: white;
            transform: scale(1.02);
        }
        .students-btn { background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); }
        .classes-btn { background: linear-gradient(135deg, #f093fb 0%, #f5576c 100%); }
        .courses-btn { background: linear-gradient(135deg, #4facfe 0%, #00f2fe 100%); }
        .enrollments-btn { background: linear-gradient(135deg, #43e97b 0%, #38f9d7 100%); }
        .attendance-btn { background: linear-gradient(135deg, #fa709a 0%, #fee140 100%); }
        .marks-btn { background: linear-gradient(135deg, #30cfd0 0%, #330867 100%); }
        .users-btn { background: linear-gradient(135deg, #a8edea 0%, #fed6e3 100%); color: #333; }
    </style>
</head>
<body>
    <div class="container">
        <div class="dashboard-header">
            <h1 class="mb-0">🎓 Student Management System</h1>
            <p class="text-muted mt-2">Welcome to your educational administration dashboard</p>
        </div>

        <div class="row mb-4">
            <div class="col-md-3">
                <div class="stat-card">
                    <div class="stat-number"><?php echo $students_count; ?></div>
                    <div class="stat-label">Total Students</div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="stat-card">
                    <div class="stat-number"><?php echo $classes_count; ?></div>
                    <div class="stat-label">Classes</div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="stat-card">
                    <div class="stat-number"><?php echo $courses_count; ?></div>
                    <div class="stat-label">Courses</div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="stat-card">
                    <div class="stat-number"><?php echo $enrollments_count; ?></div>
                    <div class="stat-label">Enrollments</div>
                </div>
            </div>
        </div>

        <div class="row mb-4">
            <div class="col-md-3">
                <div class="stat-card">
                    <div class="stat-number"><?php echo $attendance_count; ?></div>
                    <div class="stat-label">Attendance Records</div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="stat-card">
                    <div class="stat-number"><?php echo $marks_count; ?></div>
                    <div class="stat-label">Marks Entered</div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="stat-card">
                    <div class="stat-number"><?php echo $users_count; ?></div>
                    <div class="stat-label">Admin/Teachers</div>
                </div>
            </div>
        </div>

        <h3 class="text-white my-4">📚 Management Modules</h3>

        <div class="row">
            <div class="col-md-6">
                <a href="display.php" class="module-btn students-btn">👥 Manage Students</a>
            </div>
            <div class="col-md-6">
                <a href="classes.php" class="module-btn classes-btn">🏫 Manage Classes</a>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6">
                <a href="courses.php" class="module-btn courses-btn">📖 Manage Courses</a>
            </div>
            <div class="col-md-6">
                <a href="enrollments.php" class="module-btn enrollments-btn">✍️ Student Enrollments</a>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6">
                <a href="attendance.php" class="module-btn attendance-btn">📋 Attendance Tracking</a>
            </div>
            <div class="col-md-6">
                <a href="marks.php" class="module-btn marks-btn">📊 Marks/Grades</a>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6">
                <a href="users_manage.php" class="module-btn users-btn">🔐 Manage Users</a>
            </div>
        </div>

        <hr class="bg-white my-4">
        <p class="text-center text-white mt-4">
            <small>&copy; 2026 Student Management System. All rights reserved.</small>
        </p>
    </div>
</body>
</html>
