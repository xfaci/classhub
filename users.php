<?php
session_start();
require_once 'php/db.php';

if (!isset($_SESSION['username']) || $_SESSION['username'] !== 'faci') {
    header("Location: login.html");
    exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['add_user'])) {
    $new_username = $_POST['new_username'];
    $new_password = password_hash($_POST['new_password'], PASSWORD_DEFAULT);
    
    try {
        $stmt = $pdo->prepare("INSERT INTO users (username, password, ip, device) VALUES (?, ?, '', '')");
        $stmt->execute([$new_username, $new_password]);
    } catch (PDOException $e) {
        $error = "Erreur : " . $e->getMessage();
    }
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ClassHub - Utilisateurs</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <main>
        <div class="users-container">
            <a href="dashboard.php" class="classhub-link">ClassHub</a>
            <h2>Gérer les utilisateurs</h2>
            <table class="users-table">
                <thead>
                    <tr>
                        <th>Identifiant</th>
                        <th>IP</th>
                        <th>Appareil</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $stmt = $pdo->query("SELECT username, ip, device FROM users");
                    while ($row = $stmt->fetch()) {
                        echo "<tr>";
                        echo "<td>{$row['username']}</td>";
                        echo "<td>{$row['ip']}</td>";
                        echo "<td>{$row['device']}</td>";
                        echo "</tr>";
                    }
                    ?>
                </tbody>
            </table>
            <h2>Ajouter un utilisateur</h2>
            <?php if (isset($error)) echo "<p style='color: red;'>$error</p>"; ?>
            <form method="POST">
                <input type="text" name="new_username" placeholder="Nouvel identifiant" required>
                <input type="password" name="new_password" placeholder="Mot de passe" required>
                <button type="submit" name="add_user">Ajouter</button>
            </form>
            <button onclick="window.location.href='php/logout.php'">Déconnexion</button>
        </div>
    </main>
    <footer>
        Codé et propulsé par Faci 🚀
        <a href="https://www.linkedin.com/in/facinet-sylla-1822b328a/" target="_blank"><img src="assets/linkedin.png" alt="LinkedIn"></a>
        <a href="https://www.instagram.com/grosfaci/" target="_blank"><img src="assets/instagram.png" alt="Instagram"></a>
    </footer>
</body>
</html>