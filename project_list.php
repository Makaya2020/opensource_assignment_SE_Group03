<?php include "db.php"; ?>

<!DOCTYPE html>
<html>
<head>
    <title>Project List</title>

    <style>
        body {
            font-family: Arial;
            background: #f4f6f9;
            margin: 0;
            padding: 0;
        }

        .container {
            width: 80%;
            margin: 40px auto;
            background: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0px 0px 10px rgba(0,0,0,0.1);
        }

        h2 {
            text-align: center;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        table, th, td {
            border: 1px solid #ddd;
        }

        th {
            background: #28a745;
            color: white;
            padding: 10px;
        }

        td {
            padding: 10px;
            text-align: center;
        }

        tr:nth-child(even) {
            background: #f2f2f2;
        }

        .btn {
            padding: 5px 10px;
            border: none;
            border-radius: 5px;
            color: white;
            cursor: pointer;
            text-decoration: none;
        }

        .edit {
            background: #007bff;
        }

        .delete {
            background: #dc3545;
        }
    </style>
</head>

<body>

<div class="container">

<h2>Project List</h2>

<table>
    <tr>
        <th>ID</th>
        <th>Project Name</th>
        <th>Description</th>
        <th>Start Date</th>
        <th>End Date</th>
        <th>Status</th>
        <th>Actions</th>
    </tr>

<?php
$sql = "SELECT * FROM projects";
$result = mysqli_query($conn, $sql);

while ($row = mysqli_fetch_assoc($result)) {
?>

<tr>
    <td><?php echo $row['id']; ?></td>
    <td><?php echo $row['project_name']; ?></td>
    <td><?php echo $row['description']; ?></td>
    <td><?php echo $row['start_date']; ?></td>
    <td><?php echo $row['end_date']; ?></td>
    <td><?php echo $row['status']; ?></td>
    <td>
        <a class="btn edit" href="#">Edit</a>
        <a class="btn delete" href="#">Delete</a>
    </td>
</tr>

<?php } ?>

</table>

</div>

</body>
</html>