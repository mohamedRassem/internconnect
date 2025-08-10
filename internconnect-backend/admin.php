<?php
session_start();
if (!isset($_SESSION['admin_logged_in'])) {
    header('Location: login.php');
    exit();
}

$pdo = new PDO("mysql:host=localhost;dbname=coalitiontest", "root", "");
$sql = "SELECT * FROM interconnect";
$stmt = $pdo->query($sql);
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>Admin - InternConnect</title>
  <style>
    body { font-family: Arial, sans-serif; padding: 20px; }
    h2 { text-align: center; }
    table { border-collapse: collapse; width: 100%; margin-top: 20px; }
    th, td { border: 1px solid #ccc; padding: 8px; text-align: center; }
    th { background-color: #f2f2f2; }
    button { padding: 4px 8px; }
    form { display: inline-block; }
  </style>
</head>
<body>
  <h2>Liste des candidatures</h2>
  <form method="POST" action="logout.php" style="text-align:right;">
    <button type="submit">Déconnexion</button>
  </form>

  <table>
    <tr>
      <th>ID</th>
      <th>Nom</th>
      <th>Email</th>
      <th>Téléphone</th>
      <th>Programme</th>
      <th>CV</th>
      <th>Consentement</th>
      <th>Statut</th>
      <th>Action</th>
    </tr>

    <?php while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) { ?>
    <tr>
      <td><?php echo $row['id']; ?></td>
      <td><?php echo htmlspecialchars($row['nom']); ?></td>
      <td><?php echo htmlspecialchars($row['email']); ?></td>
      <td><?php echo htmlspecialchars($row['telephone']); ?></td>
      <td><?php echo htmlspecialchars($row['programme']); ?></td>
      <td>
        <?php if (!empty($row['cv_path'])): ?>
          <a href="<?php echo htmlspecialchars($row['cv_path']); ?>" target="_blank">Télécharger</a>
        <?php else: ?>
          <span>CV non fourni</span>
        <?php endif; ?>
      </td>
      <td><?php echo $row['consentement'] ? 'Oui' : 'Non'; ?></td>
      <td>
        <form method="POST" action="update_statut.php">
          <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
          <select name="statut">
            <option value="En attente" <?php if($row['statut_paiement'] == 'En attente') echo 'selected'; ?>>En attente</option>
            <option value="Payé" <?php if($row['statut_paiement'] == 'Payé') echo 'selected'; ?>>Payé</option>
            <option value="Rejeté" <?php if($row['statut_paiement'] == 'Rejeté') echo 'selected'; ?>>Rejeté</option>
          </select>
          <button type="submit">✔</button>
        </form>
      </td>
      <td>
        <form method="GET" action="delete.php" onsubmit="return confirm('Supprimer cette candidature ?');">
          <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
          <button type="submit">🗑️</button>
        </form>
      </td>
    </tr>
    <?php } ?>
  </table>
</body>
</html>
