<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: login.html");
    exit();
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ClassHub - Tableau de bord</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <main>
        <div class="dashboard-container">
            <a href="dashboard.php" class="classhub-link">ClassHub</a>
            <div class="grid">
                <div class="course-box" onclick="window.location.href='comptabilite.php'"><span>💰 Comptabilité</span></div>
                <div class="course-box" onclick="window.location.href='entrepreneuriat.php'"><span>🚀 Entrepreneuriat</span></div>
                <div class="course-box" onclick="window.location.href='softskills.php'"><span>🤝 Soft Skills</span></div>
                <div class="course-box" onclick="window.location.href='droit.php'"><span>⚖️ Droit</span></div>
                <div class="course-box" onclick="window.location.href='geopolitique.php'"><span>🌍 Géopolitique</span></div>
                <div class="course-box" onclick="window.location.href='mathematiques.php'"><span>➕ Mathématiques</span></div>
            </div>
        </div>
    </main>
    <footer>
        Codé et propulsé par Faci 🚀
        <a href="https://www.linkedin.com/in/facinet-sylla-1822b328a/" target="_blank"><img src="assets/linkedin.png" alt="LinkedIn"></a>
        <a href="https://www.instagram.com/grosfaci/" target="_blank"><img src="assets/instagram.png" alt="Instagram"></a>
    </footer>
</body>
</html>