<?php
session_start();
include('includes/config.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $email = $_POST['email'];
  $password = $_POST['password'];

  // Your SQL query to retrieve user data based on email
  $sql = "SELECT id, EmailId, Password FROM tblusers WHERE EmailId = :email";

  $stmt = $dbh->prepare($sql);
  $stmt->bindParam(':email', $email);
  $stmt->execute();

  // Fetch user data
  $user = $stmt->fetch(PDO::FETCH_ASSOC);

  if ($user && password_verify($password, $user['Password'])) {

    session_regenerate_id();
    $_SESSION['user_id'] = $user['id'];
    $_SESSION['user_email'] = $user['EmailId'];
    $_SESSION['login'] = $user['EmailId'];

    // Redirect to a dashboard or home page
    header("location: index.php");
    exit();
  } else {
    // Invalid login credentials
    $_SESSION['error'] = "Invalid email or password. Please try again.";
    header("location: error.php");
  }
}
?>

<!-- Your HTML content for the login page goes here -->