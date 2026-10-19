<?php
require_once '../data.php';

$success = "";
$error = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $klassekode = $_POST['klassekode'];
    $bekreft = $_POST['bekreft'] ?? '';

    // Sjekk om brukeren har bekreftet sletting
    if ($bekreft !== 'ja') {
        $error = "Du må bekrefte slettingen for å fortsette!";
    } else {
        // Sjekk om klassen eksisterer
        $klasseFound = false;
        foreach ($klasser as $key => $klasse) {
            if ($klasse['klassekode'] == $klassekode) {
                $klasseFound = true;

                // Sjekk om klassen har studenter
                $harStudenter = false;
                foreach ($studenter as $student) {
                    if ($student['klassekode'] == $klassekode) {
                        $harStudenter = true;
                        break;
                    }
                }

                if ($harStudenter) {
                    $error = "Kan ikke slette klassen '$klassekode' fordi den har tilknyttede studenter!";
                } else {
                    // Slett klassen
                    unset($klasser[$key]);
                    $success = "Klasse '$klassekode' er slettet!";
                }
                break;
            }
        }

        if (!$klasseFound) {
            $error = "Klassen med kode '$klassekode' eksisterer ikke!";
        }
    }
}

// Hent alle klasser for listeboks
?>

<!DOCTYPE html>
<html lang="no">
<head>
    <meta charset="UTF-8">
    <title>Slett en klasse</title>
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
        select, input[type="checkbox"] {
            padding: 8px;
            border: 1px solid #ddd;
            border-radius: 4px;
        }
        button {
            padding: 10px 15px;
            background-color: #e74c3c;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        button:hover {
            background-color: #c0392b;
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
        .confirmation {
            display: flex;
            align-items: center;
            gap: 10px;
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
        <h1>Slett en klasse</h1>

        <?php if (!empty($success)): ?>
            <div class="message success"><?php echo $success; ?></div>
        <?php endif; ?>

        <?php if (!empty($error)): ?>
            <div class="message error"><?php echo $error; ?></div>
        <?php endif; ?>

        <form method="post">
            <label>Velg klasse:
                <select name="klassekode" required>
                    <option value="">-- Velg en klasse --</option>
                    <?php foreach ($klasser as $klasse): ?>
                        <option value="<?php echo htmlspecialchars($klasse['klassekode']); ?>">
                            <?php echo htmlspecialchars($klasse['klassekode'] . " - " . $klasse['klassnavn']); ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </label>

            <div class="confirmation">
                <input type="checkbox" name="bekreft" id="bekreft" value="ja" required>
                <label for="bekreft">Er du sikker på at du vil slette denne klassen?</label>
            </div>

            <button type="submit">Slett</button>
        </form>

        <a href="index.php">Tilbake til hovedside</a>
    </div>
</body>
</html>
