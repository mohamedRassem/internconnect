<?php
$host = 'localhost';
$dbname = 'coalitiontest';
$username = 'root';
$password = ''; // ou ton mot de passe MySQL si tu en as mis un

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Erreur de connexion : " . $e->getMessage());
}
?>
