<?php
session_start();
$error = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Identifiants admin (à personnaliser)
    $admin_email = 'admin@internconnect.com';
    $admin_password = 'admin245';

    if ($email === $admin_email && $password === $admin_password) {
        $_SESSION['admin_logged_in'] = true;
        header('Location: admin.php');
        exit();
    } else {
        $error = 'Identifiants incorrects';
    }
}
?>

<!DOCTYPE html>
<html>
<head><title>Connexion Admin</title></head>
<body>
  <h2>Connexion Admin</h2>
  <?php if ($error): ?><p style="color:red;"><?php echo $error; ?></p><?php endif; ?>
  <form method="POST">
    <label>Email:</label><br>
    <input type="email" name="email" required><br><br>
    <label>Mot de passe:</label><br>
    <input type="password" name="password" required><br><br>
    <button type="submit">Se connecter</button>
  </form>
</body>
</html>
