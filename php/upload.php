<?php
session_start();
require_once 'db.php';

// Vérifier si l'utilisateur est "faci"
if (!isset($_SESSION['username']) || $_SESSION['username'] !== 'faci') {
    header("Location: ../login.html");
    exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $subject = $_POST['subject'];
    $file = $_FILES['file'];
    
    // Créer le dossier si nécessaire
    $upload_dir = "../uploads/$subject/";
    if (!file_exists($upload_dir)) {
        mkdir($upload_dir, 0777, true);
    }
    
    // Déplacer le fichier
    $destination = $upload_dir . basename($file['name']);
    if (move_uploaded_file($file['tmp_name'], $destination)) {
        header("Location: ../admin.html?success=1");
    } else {
        header("Location: ../admin.html?error=1");
    }
    exit();
}
?>