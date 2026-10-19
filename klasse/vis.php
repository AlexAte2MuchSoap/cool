<?php
require_once '../data.php';
?>

<!DOCTYPE html>
<html lang="no">
<head>
    <meta charset="UTF-8">
    <title>Vis alle klasser</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
            background-color: white;
        }
        .container {
            max-width: 1000px;
            margin: 0 auto;
            background-color: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
        }
        h1 {
            color: black;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 12px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
        tr:nth-child(even) {
            background-color: #f9f9f9;
        }
        a {
            display: inline-block;
            margin-top: 20px;
            color: #3498db;
            text-decoration: none;
        }
        a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Alle klasser</h1>
        <table>
            <tr>
                <th>Klassekode</th>
                <th>Klassnavn</th>
                <th>Studiumkode</th>
            </tr>
            <?php foreach ($klasser as $klasse): ?>
                <tr>
                    <td><?php echo htmlspecialchars($klasse['klassekode']); ?></td>
                    <td><?php echo htmlspecialchars($klasse['klassnavn']); ?></td>
                    <td><?php echo htmlspecialchars($klasse['studiumkode']); ?></td>
                </tr>
            <?php endforeach; ?>
        </table>

        <a href="index.php">Tilbake til hovedside</a>
    </div>
</body>
</html>
