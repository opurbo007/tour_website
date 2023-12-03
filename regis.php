<?php
session_start();
error_reporting(0);
include('includes/config.php');

if (isset($_POST['submit'])) {
  // Collect form data
  $name = $_POST['name'];
  $mobile = $_POST['mobile'];
  $email = $_POST['email'];
  $password = $_POST['password'];

  // Hash the password for security
  $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

  // Your SQL query to insert data into the users table
  $sql = "INSERT INTO tblusers (FullName, MobileNumber, EmailId, Password) 
            VALUES (:name, :mobile, :email, :password)";

  $stmt = $dbh->prepare($sql);
  $stmt->bindParam(':name', $name);
  $stmt->bindParam(':mobile', $mobile);
  $stmt->bindParam(':email', $email);
  $stmt->bindParam(':password', $hashedPassword);

  // Execute the query
  if ($stmt->execute()) {
    // Registration successful, redirect to index.php
    header("location:index.php");
    exit();
  } else {
    // Registration failed, handle the error
    $_SESSION['error'] = "Failed to reisgter";
    header("location: error.php");
  }
}
?>