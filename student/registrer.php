<?php
require_once '../data.php';

$success = "";
$error = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $brukernavn = $_POST['brukernavn'];
    $fornavn = $_POST['fornavn'];
    $etternavn = $_POST['etternavn'];
    $klassekode = $_POST['klassekode'];

    // Sjekk om studenten allerede eksisterer
    foreach ($studenter as $student) {
        if ($student['brukernavn'] == $brukernavn) {
            $error = "Studenten med brukernavn '$brukernavn' eksisterer allerede!";
            break;
        }
    }

    // Sjekk om klassen eksisterer
    $klasseFound = false;
    foreach ($klasser as $klasse) {
        if ($klasse['klassekode'] == $klassekode) {
            $klasseFound = true;
            break;
        }
    }

    if (!$klasseFound) {
        $error = "Klassen med kode '$klassekode' eksisterer ikke!";
    }

    if (empty($error)) {
        $studenter[] = [
            'brukernavn' => $brukernavn,
            'fornavn' => $fornavn,
            'etternavn' => $etternavn,
            'klassekode' => $klassekode
        ];
        $success = "Student registrert!";
        // lagreData(); // Fjern kommentaren hvis man vil lagre til fil
    }
}
?>

<!DOCTYPE html>
<html lang="no">
<head>
    <meta charset="UTF-8">
    <title>Registrer student</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
            background-color: #f9f9f9;
        }
        .container {
            max-width: 600px;
            margin: 0 auto;
            background-color: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
        }
        h1 {
            color: black;
        }
        form {
            display: flex;
            flex-direction: column;
            gap: 15px;
        }
        label {
            font-weight: bold;
        }
        input, select {
            padding: 8px;
            border: 1px solid #ddd;
            border-radius: 4px;
        }
        button {
            padding: 10px 15px;
            background-color: #AAFF00;
            color: black;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        button:hover {
            background-color: #00A30E;
        }
        .message {
            padding: 10px;
            margin: 10px 0;
            border-radius: 4px;
        }
        .success {
            background-color: #d4edda;
            color: #155724;
        }
        .error {
            background-color: #f8d7da;
            color: #721c24;
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
        <h1>Registrer student</h1>

        <?php if (!empty($success)): ?>
            <div class="message success"><?php echo $success; ?></div>
        <?php endif; ?>

        <?php if (!empty($error)): ?>
            <div class="message error"><?php echo $error; ?></div>
        <?php endif; ?>

        <form method="post">
            <label>Brukernavn: <input type="text" name="brukernavn" required></label>
            <label>Fornavn: <input type="text" name="fornavn" required></label>
            <label>Etternavn: <input type="text" name="etternavn" required></label>
            <label>Klasse:
                <select name="klassekode" required>
                    <option value="">-- Velg en klasse --</option>
                    <?php foreach ($klasser as $klasse): ?>
                        <option value="<?php echo htmlspecialchars($klasse['klassekode']); ?>">
                            <?php echo htmlspecialchars($klasse['klassekode'] . " - " . $klasse['klassnavn']); ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </label>
            <button type="submit">Registrer</button>
        </form>

        <a href="index.php">Tilbake til hovedside</a>
    </div>
</body>
</html>
