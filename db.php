<?php

$conn = mysqli_connect("localhost", "root", "", "project_tracking");

if ($conn) {
    echo "Database connected successfully";
} else {
    die("Connection failed: " . mysqli_connect_error());
}

?>