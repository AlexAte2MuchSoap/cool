<?php
$host = "localhost"; // Endre hvis nødvendig
$dbname = "dokploy_usn_no"; // Endre til din database
$username = "root"; // Endre hvis nødvendig
$password = ""; // Endre hvis nødvendig

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Kunne ikke koble til databasen: " . $e->getMessage());
}
?>
