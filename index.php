<?php
require_once 'data.php';
?>

<!DOCTYPE html>
<html lang="no">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Peak nettsted</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 20px; background-color: #f9f9f9; }
        h1 { color: black; }
        ul { list-style-type: none; padding: 0; }
        li { margin: 10px 0; }
        a {
            display: inline-block;
            padding: 10px 15px;
            background-color: #AAFF00;
            color: black;
            text-decoration: none;
            border-radius: 5px;
            transition: background-color 0.3s;
        }
        a:hover {
            background-color: #2980b9;
        }
        .container {
            max-width: 800px;
            margin: 0 auto;
            background-color: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Peak brukerfunskjoner</h1>
        <ul>
            <li><a href="klasse/registrer.php">Registrer klasse</a></li>
            <li><a href="klasse/vis.php">Vis alle klasser</a></li>
            <li><a href="klasse/slett.php">Slett klasse</a></li>
            <li><a href="student/registrer.php">Registrer student</a></li>
            <li><a href="student/vis.php">Vis alle studenter</a></li>
            <li><a href="student/slett.php">Slett student</a></li>
        </ul>
    </div>
</body>
</html>
