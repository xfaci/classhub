<?php
session_start();
require_once 'php/db.php';

if (!isset($_SESSION['username']) || $_SESSION['username'] !== 'faci') {
    header("Location: login.html");
    exit();
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ClassHub - Tous les utilisateurs</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <main>
        <div class="users-container">
            <a href="dashboard.php" class="classhub-link">ClassHub</a>
            <h2>Tous les utilisateurs</h2>
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