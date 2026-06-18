<?php include "db.php"; ?>
<!DOCTYPE html>
<html>
<head>
    <title>Add Project</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f6f9;
            margin: 0;
            padding: 0;
        }

        .container {
            width: 50%;
            margin: 50px auto;
            background: white;
            padding: 25px;
            border-radius: 10px;
            box-shadow: 0px 0px 10px rgba(0,0,0,0.1);
        }

        h2 {
            text-align: center;
            color: #333;
        }

        label {
            font-weight: bold;
            color: #444;
        }

        input[type="text"],
        input[type="date"],
        textarea,
        select {
            width: 100%;
            padding: 10px;
            margin: 8px 0 15px 0;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
        }

        textarea {
            resize: none;
            height: 100px;
        }

        button {
            width: 100%;
            background-color: #28a745;
            color: white;
            padding: 12px;
            border: none;
            border-radius: 5px;
            font-size: 16px;
            cursor: pointer;
        }

        button:hover {
            background-color: #218838;
        }

        .message {
            text-align: center;
            margin-top: 10px;
            font-weight: bold;
        }

        .success {
            color: green;
        }

        .error {
            color: red;
        }
    </style>
</head>

<body>

<div class="container">

    <h2>Add New Project</h2>

    <form action="add_project.php" method="POST">

        <label>Project Name:</label>
        <input type="text" name="project_name" required>

        <label>Description:</label>
        <textarea name="description" required></textarea>

        <label>Start Date:</label>
        <input type="date" name="start_date" required>

        <label>End Date:</label>
        <input type="date" name="end_date" required>

        <label>Status:</label>
        <select name="status">
            <option value="Pending">Pending</option>
            <option value="In Progress">In Progress</option>
            <option value="Completed">Completed</option>
        </select>

        <button type="submit" name="submit">Add Project</button>

    </form>

<?php
if (isset($_POST['submit'])) {

    $project_name = $_POST['project_name'];
    $description  = $_POST['description'];
    $start_date   = $_POST['start_date'];
    $end_date     = $_POST['end_date'];
    $status       = $_POST['status'];

    $sql = "INSERT INTO projects (project_name, description, start_date, end_date, status)
            VALUES (?, ?, ?, ?, ?)";

    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, "sssss", $project_name, $description, $start_date, $end_date, $status);

    if (mysqli_stmt_execute($stmt)) {
        echo "<p class='message success'>Project added successfully!</p>";
    } else {
        echo "<p class='message error'>Error: " . mysqli_error($conn) . "</p>";
    }
}
?>

</div>

</body>
</html>