<?php
require 'db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nom = $_POST['nom'];
    $email = $_POST['email'];
    $telephone = $_POST['telephone'];
    $programme = $_POST['programme'];
    $consentement = isset($_POST['consentement']) ? 1 : 0;

    // Gestion du fichier CV
    $cv_path = '';
    if (isset($_FILES['cv']) && $_FILES['cv']['error'] === UPLOAD_ERR_OK) {
        $uploadDir = 'uploads/';
        if (!is_dir($uploadDir)) {
            mkdir($uploadDir, 0777, true);
        }
        $filename = basename($_FILES['cv']['name']);
        $targetPath = $uploadDir . time() . '_' . $filename;
        if (move_uploaded_file($_FILES['cv']['tmp_name'], $targetPath)) {
            $cv_path = $targetPath;
        }
    }

    // Insertion dans la base
    $stmt = $pdo->prepare("INSERT INTO interconnect (nom, email, telephone, programme, cv_path, consentement) VALUES (?, ?, ?, ?, ?, ?)");
    $stmt->execute([$nom, $email, $telephone, $programme, $cv_path, $consentement]);

    echo "Candidature enregistrée avec succès !";
}
?>
