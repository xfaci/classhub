<?php
try {
    // Connexion à SQLite
    $pdo = new PDO('sqlite:../db/users.db');
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    // Créer la table users si elle n'existe pas
    $pdo->exec("CREATE TABLE IF NOT EXISTS users (
        id INTEGER PRIMARY KEY AUTOINCREMENT,
        username TEXT UNIQUE NOT NULL,
        password TEXT NOT NULL,
        ip TEXT,
        device TEXT
    )");

    // Ajouter l'admin "faci" si absent
    $stmt = $pdo->prepare("SELECT COUNT(*) FROM users WHERE username = 'faci'");
    $stmt->execute();
    if ($stmt->fetchColumn() == 0) {
        $hashed_password = password_hash('admin15', PASSWORD_DEFAULT);
        $stmt = $pdo->prepare("INSERT INTO users (username, password, ip, device) VALUES (?, ?, '', '')");
        $stmt->execute(['faci', $hashed_password]);
        echo "Base de données et admin 'faci' créés avec succès.";
    }
} catch (PDOException $e) {
    die("Erreur de connexion à la base de données : " . $e->getMessage());
}
?>