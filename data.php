<?php
// Lagrer dataene i minnet ved hjelp av PHP-arrayer
$klasser = [
    ['klassekode' => 'IT1', 'klassnavn' => 'IT og ledelse 1. år', 'studiumkode' => 'ITLED'],
    ['klassekode' => 'IT2', 'klassnavn' => 'IT og ledelse 2. år', 'studiumkode' => 'ITLED'],
    ['klassekode' => 'IT3', 'klassnavn' => 'IT og ledelse 3. år', 'studiumkode' => 'ITLED'],
];

$studenter = [
    ['brukernavn' => 'bb', 'fornavn' => 'Bob', 'etternavn' => 'Bobson', 'klassekode' => 'IT1'],
    ['brukernavn' => 'mm', 'fornavn' => 'Mark', 'etternavn' => 'Markson', 'klassekode' => 'IT1'],
    ['brukernavn' => 'tt', 'fornavn' => 'Toby', 'etternavn' => 'Tobson', 'klassekode' => 'IT2'],
];

// Funksjoner for å lagre dataene til filer (valgfritt)
function lagreData() {
    global $klasser, $studenter;
    file_put_contents('klasse_data.json', json_encode($klasser));
    file_put_contents('student_data.json', json_encode($studenter));
}

// Last inn data fra filer hvis de eksisterer (valgfritt)
if (file_exists('klasse_data.json')) {
    $klasser = json_decode(file_get_contents('klasse_data.json'), true);
}
if (file_exists('student_data.json')) {
    $studenter = json_decode(file_get_contents('student_data.json'), true);
}
?>
