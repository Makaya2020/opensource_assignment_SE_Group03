<?php
include 'db.php';

if(isset($_POST['register']))
{
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    $sql = "INSERT INTO users(username,email,password)
            VALUES('$username','$email','$password')";

    if(mysqli_query($conn,$sql))
    {
        echo "<script>alert('User Registered Successfully');</script>";
    }
    else
    {
        echo "Error: ".mysqli_error($conn);
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>User Registration</title>

    <style>
        body{
            font-family: Arial, sans-serif;
            background:#f4f4f4;
        }

        .container{
            width:400px;
            margin:50px auto;
            background:white;
            padding:20px;
            border-radius:10px;
            box-shadow:0 0 10px gray;
        }

        input{
            width:100%;
            padding:10px;
            margin:8px 0;
        }

        button{
            width:100%;
            padding:10px;
            background:green;
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

    <h2>User Registration Form</h2>

    <form method="POST">

        <input type="text"
               name="username"
               placeholder="Enter Username"
               required>

        <input type="email"
               name="email"
               placeholder="Enter Email"
               required>

        <input type="password"
               name="password"
               placeholder="Enter Password"
               required>

        <button type="submit" name="register">
            Register
        </button>

    </form>

</div>

</body>
</html>