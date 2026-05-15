<?php
$host = 'localhost';
$user = 'root';
$password = '';
$databases = ['bibliothèque_cléry', 'bibliotheque_clery'];
$mysqli = null;

foreach ($databases as $database) {
    $mysqli = new mysqli($host, $user, $password, $database);
    if (!$mysqli->connect_error) {
        break;
    }
}

if ($mysqli->connect_error) {
    die('Erreur de connexion MySQL : (' . $mysqli->connect_errno . ') ' . $mysqli->connect_error);
}

$mysqli->set_charset('utf8mb4');
