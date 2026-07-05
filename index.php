<?php
require_once dirname(__DIR__) . '/config.php';

$sql = "SELECT id, name, age, fruit FROM people ORDER BY id ASC";
$result = $conn->query($sql);

if (!$result) {
    error_log("Database query failed: " . $conn->error);
    die("Something went wrong.");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Secure Fruit Website - Updated by Codex</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f5f7fb;
            margin: 0;
            padding: 20px;
        }

        .box {
            max-width: 850px;
            margin: auto;
            background: white;
            padding: 22px;
            border-radius: 14px;
            box-shadow: 0 8px 25px rgba(0,0,0,0.08);
        }

        h1 {
            text-align: center;
            margin-top: 0;
        }

        p {
            text-align: center;
            color: #555;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 22px;
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

        @media (max-width: 600px) {
            body {
                padding: 12px;
            }

            .box {
                padding: 14px;
            }

            th, td {
                padding: 9px;
                font-size: 14px;
            }

            img {
                width: 65px;
                height: 65px;
            }
        }
    </style>
</head>
<body>

<div class="box">
    <h1>Secure Fruit Website - Local Codex Test</h1>
    <p>Names and ages come from database. Photos are served securely by PHP.</p>

    <table>
        <tr>
            <th>Name</th>
            <th>Age</th>
            <th>Fruit</th>
            <th>Secure Photo</th>
        </tr>

        <?php while ($row = $result->fetch_assoc()): ?>
            <tr>
                <td><?php echo htmlspecialchars($row['name'], ENT_QUOTES, 'UTF-8'); ?></td>
                <td><?php echo htmlspecialchars($row['age'], ENT_QUOTES, 'UTF-8'); ?></td>
                <td><?php echo htmlspecialchars($row['fruit'], ENT_QUOTES, 'UTF-8'); ?></td>
                <td>
                    <img 
                        src="image.php?id=<?php echo (int)$row['id']; ?>" 
                        alt="<?php echo htmlspecialchars($row['fruit'], ENT_QUOTES, 'UTF-8'); ?>"
                    >
                </td>
            </tr>
        <?php endwhile; ?>
    </table>
</div>

</body>
</html>
