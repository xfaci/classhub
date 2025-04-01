<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: login.html");
    exit();
}

$subject = 'entrepreneuriat';
$upload_dir = "uploads/$subject/";
$files = (file_exists($upload_dir)) ? scandir($upload_dir) : [];
$files = array_diff($files, ['.', '..']); // Enlever . et ..
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ClassHub - Entrepreneuriat</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <main>
        <div class="dashboard-container">
            <a href="dashboard.php" class="classhub-link">ClassHub</a>
            <h2>💰 Entrepreneuriat</h2>
            <?php if (empty($files)): ?>
                <p>Cette page est vide.</p>
            <?php else: ?>
                <div class="file-list">
                    <?php foreach ($files as $file): 
                        $ext = strtolower(pathinfo($file, PATHINFO_EXTENSION));
                        $icon = ($ext === 'pdf') ? 'pdf.png' : (($ext === 'doc' || $ext === 'docx') ? 'doc.png' : 'ppt.png');
                    ?>
                        <div class="file-item" title="Aperçu : <?php echo htmlspecialchars($file); ?>">
                            <img src="assets/<?php echo $icon; ?>" alt="<?php echo $ext; ?>">
                            <span><?php echo htmlspecialchars($file); ?></span>
                        </div>
                    <?php endforeach; ?>
                </div>
            <?php endif; ?>
        </div>
    </main>
    <footer>
        Codé et propulsé par Faci 🚀
        <a href="https://www.linkedin.com/in/facinet-sylla-1822b328a/" target="_blank"><img src="assets/linkedin.png" alt="LinkedIn"></a>
        <a href="https://www.instagram.com/grosfaci/" target="_blank"><img src="assets/instagram.png" alt="Instagram"></a>
    </footer>
</body>
</html>