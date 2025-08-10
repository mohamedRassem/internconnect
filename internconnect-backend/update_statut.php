<?php
$pdo = new PDO("mysql:host=localhost;dbname=coalitiontest", "root", "");
$id = $_POST['id'];
$statut = $_POST['statut'];

$sql = "UPDATE interconnect SET statut_paiement = ? WHERE id = ?";
$stmt = $pdo->prepare($sql);
$stmt->execute([$statut, $id]);

header("Location: admin.php");
exit();
?>
