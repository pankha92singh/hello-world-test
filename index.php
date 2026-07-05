<?php
require_once __DIR__ . '/config.php';

$sql = "SELECT name, age, fruit, image_path FROM people ORDER BY id ASC";
$result = $conn->query($sql);

if (!$result) {
    die("Database error: " . $conn->error);
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Database and Storage Test</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f5f7fb;
            padding: 30px;
        }

        .box {
            max-width: 800px;
            margin: auto;
            background: white;
            padding: 25px;
            border-radius: 14px;
            box-shadow: 0 8px 25px rgba(0,0,0,0.08);
        }

        h1 {
            text-align: center;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 25px;
        }

        th, td {
            border: 1px solid #ddd;
            padding: 14px;
            text-align: center;
        }

        th {
            background: #111827;
            color: white;
        }

        img {
            width: 90px;
            height: 90px;
            object-fit: contain;
        }
    </style>
</head>
<body>

<div class="box">
    <h1>Database + Storage Test</h1>
    <p>This page gets names and ages from database, and fruit images from file storage.</p>

    <table>
        <tr>
            <th>Name</th>
            <th>Age</th>
            <th>Fruit</th>
            <th>Photo from Storage</th>
        </tr>

        <?php while ($row = $result->fetch_assoc()): ?>
            <tr>
                <td><?php echo htmlspecialchars($row['name']); ?></td>
                <td><?php echo htmlspecialchars($row['age']); ?></td>
                <td><?php echo htmlspecialchars($row['fruit']); ?></td>
                <td>
                    <img src="<?php echo htmlspecialchars($row['image_path']); ?>" alt="<?php echo htmlspecialchars($row['fruit']); ?>">
                </td>
            </tr>
        <?php endwhile; ?>
    </table>
</div>

</body>
</html>
