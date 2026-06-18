<?php
session_start();
include 'db.php';

if(isset($_POST['login']))
{
    $email = $_POST['email'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM users
            WHERE email='$email'
            AND password='$password'";

    $result = mysqli_query($conn, $sql);

    if(mysqli_num_rows($result) > 0)
    {
        $_SESSION['email'] = $email;
        header("Location: dashboard.php");
    }
    else
    {
        echo "<script>alert('Invalid Email or Password');</script>";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Login Form</title>

    <style>
        body{
            font-family: Arial, sans-serif;
            background:#f4f4f4;
        }

        .container{
            width:400px;
            margin:80px auto;
            background:white;
            padding:20px;
            border-radius:10px;
            box-shadow:0 0 10px gray;
        }

        input{
            width:100%;
            padding:10px;
            margin:10px 0;
        }

        button{
            width:100%;
            padding:10px;
            background:blue;
            color:white;
            border:none;
            cursor:pointer;
        }

        h2{
            text-align:center;
        }
    </style>
</head>
<body>

<div class="container">

    <h2>User Login</h2>

    <form method="POST">

        <input type="email"
               name="email"
               placeholder="Enter Email"
               required>

        <input type="password"
               name="password"
               placeholder="Enter Password"
               required>

        <button type="submit" name="login">
            Login
        </button>

    </form>

</div>

</body>
</html>