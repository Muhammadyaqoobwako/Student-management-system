# Student Management System

A comprehensive web-based student management system built with PHP and MySQL. This application provides complete functionality for managing students, courses, classes, enrollments, attendance tracking, and academic marks.

## 📋 Features

### Core Modules

- **Student Management**: Add, edit, delete, and manage student records
- **Course Management**: Create and manage courses with course codes and credits
- **Class Management**: Organize classes and manage class information
- **Enrollment System**: Track student enrollments in courses and classes
- **Attendance Tracking**: Monitor and record student attendance
- **Marks Management**: Record and manage student examination marks
- **User Management**: Admin and staff user account management with role-based access

### Technical Features

- Responsive Bootstrap UI design
- Secure password hashing for user authentication
- Prepared statements to prevent SQL injection
- Real-time dashboard with statistics
- Data validation and error handling
- MySQL database with proper indexing and relationships

## 🛠️ Tech Stack

- **Backend**: PHP 7+
- **Database**: MySQL 5.7+
- **Frontend**: HTML5, CSS3, Bootstrap 4
- **Server**: Apache (XAMPP)

## 📦 Installation

### Prerequisites

- XAMPP (PHP, MySQL, Apache)
- Web Browser

### Setup Steps

1. **Clone the repository**

   ```bash
   git clone https://github.com/Muhammadyaqoobwako/Student-management-system.git
   cd Student-management-system
   ```

2. **Create Database**

   - Open phpMyAdmin (http://localhost/phpmyadmin)
   - Create a new database named `crudoperation`
   - Import the `database.sql` file

3. **Configure Database Connection**

   - Verify the connection settings in `connect.php`:

   ```php
   $con = new mysqli('localhost','root','','crudoperation');
   ```

4. **Start Services**
   - Start Apache and MySQL from XAMPP Control Panel
   - Access the application: `http://localhost/Web_engineering project/`

## 📁 Project Structure

```
├── index.php              # Dashboard home page
├── connect.php            # Database connection
├── database.sql           # Database schema
│
├── Students
│   ├── display.php        # View all students
│   ├── add_user.php       # Add new student
│   ├── update.php         # Update student record
│   ├── edit_user.php      # Edit student form
│   └── delete.php         # Delete student
│
├── Classes
│   ├── classes.php        # View all classes
│   ├── add_class.php      # Add new class
│   ├── edit_class.php     # Edit class
│   └── delete_class.php   # Delete class
│
├── Courses
│   ├── courses.php        # View all courses
│   ├── add_course.php     # Add new course
│   ├── edit_course.php    # Edit course
│   └── delete_course.php  # Delete course
│
├── Enrollments
│   ├── enrollments.php    # View all enrollments
│   ├── add_enrollment.php # Add enrollment
│   └── delete_enrollment.php # Remove enrollment
│
├── Attendance
│   ├── attendance.php     # View attendance records
│   └── edit_attendance.php # Record/edit attendance
│
├── Marks
│   ├── marks.php          # View marks
│   ├── add_marks.php      # Add marks
│   ├── edit_marks.php     # Edit marks
│   └── delete_marks.php   # Delete marks
│
└── Users Management
    ├── users_manage.php   # View all users
    ├── add_user.php       # Add new user
    ├── edit_user.php      # Edit user
    └── delete_user.php    # Delete user
```

## 🗄️ Database Schema

### Tables Overview

| Table         | Purpose                          |
| ------------- | -------------------------------- |
| `students`    | Store student information        |
| `classes`     | Manage class information         |
| `courses`     | Maintain course details          |
| `enrollments` | Track student-course enrollments |
| `attendance`  | Record attendance logs           |
| `marks`       | Store examination marks          |
| `users`       | Admin/staff accounts             |

For detailed schema, see `database.sql`

## 🔑 Key PHP Files

| File           | Description                            |
| -------------- | -------------------------------------- |
| `connect.php`  | Database connection configuration      |
| `index.php`    | Main dashboard with statistics         |
| `display.php`  | Display all students                   |
| `user.php`     | Student add/manage page                |
| `update.php`   | Update student records                 |
| `delete.php`   | Delete student records                 |
| `add_*.php`    | Add new records for various modules    |
| `edit_*.php`   | Edit forms for various modules         |
| `*_manage.php` | Management views for different modules |

## 🔒 Security Features

- Prepared statements for SQL query execution
- Password hashing using PHP's `password_hash()` function
- Input validation and sanitization
- Role-based access control (Admin, Teacher, Staff)

## 🚀 Usage

1. **Access Dashboard**: Open `index.php` to view system statistics
2. **Manage Students**: Navigate to student management module
3. **Manage Courses & Classes**: Add and organize courses and classes
4. **Track Enrollments**: Register students in courses
5. **Record Attendance**: Log daily attendance
6. **Manage Marks**: Record student examination marks
7. **Admin Users**: Create and manage system users

## 📝 Default Database Connection

```
Host: localhost
User: root
Password: (empty)
Database: crudoperation
```

## 📄 License

This project is open source and available under the MIT License.

## 👨‍💻 Author

Muhammad Yaqoob Wako

## 📧 Contact & Support

For issues, suggestions, or contributions, please visit the GitHub repository:
https://github.com/Muhammadyaqoobwako/Student-management-system

---

**Last Updated**: January 2026
**Version**: 1.0.0
