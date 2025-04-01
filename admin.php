<?php
session_start();
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
    <title>ClassHub - Admin</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <main>
        <div class="admin-container">
            <a href="dashboard.php" class="classhub-link">ClassHub</a>
            <div class="upload-box">
                <h2>Publier un fichier</h2>
                <form action="php/upload.php" method="POST" enctype="multipart/form-data">
                    <select name="subject">
                        <option value="comptabilite">Comptabilité</option>
                        <option value="entrepreneuriat">Entrepreneuriat</option>
                        <option value="softskills">Soft Skills</option>
                        <option value="droit">Droit</option>
                        <option value="geopolitique">Géopolitique</option>
                        <option value="mathematiques">Mathématiques</option>
                    </select>
                    <input type="file" name="file" required>
                    <button type="submit">Envoyer</button>
                </form>
            </div>
            <button class="users-button" onclick="window.location.href='all_users.php'">Voir les utilisateurs</button>
        </div>
    </main>
    <footer>
        Codé et propulsé par Faci 🚀
        <a href="https://www.linkedin.com/in/facinet-sylla-1822b328a/" target="_blank"><img src="assets/linkedin.png" alt="LinkedIn"></a>
        <a href="https://www.instagram.com/grosfaci/" target="_blank"><img src="assets/instagram.png" alt="Instagram"></a>
    </footer>
</body>
</html>