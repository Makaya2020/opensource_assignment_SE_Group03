<?php
session_start();

if(!isset($_SESSION['email']))
{
    header("Location: login.php");
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Dashboard</title>
</head>
<body>

<h1>Welcome to Software Project Tracking System</h1>

<p>Login Successful!</p>

<a href="logout.php">Logout</a>

</body>
</html>