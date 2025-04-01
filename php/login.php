<?php
session_start();
require_once 'db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];
    
    $stmt = $pdo->prepare("SELECT * FROM users WHERE username = ?");
    $stmt->execute([$username]);
    $user = $stmt->fetch();
    
    if ($user && password_verify($password, $user['password'])) {
        $_SESSION['username'] = $username;
        
        $ip = $_SERVER['REMOTE_ADDR'];
        $device = $_SERVER['HTTP_USER_AGENT'];
        $stmt = $pdo->prepare("UPDATE users SET ip = ?, device = ? WHERE username = ?");
        $stmt->execute([$ip, $device, $username]);
        
        if ($username === 'faci') {
            header("Location: ../admin.php");
        } else {
            header("Location: ../dashboard.php");
        }
        exit();
    } else {
        header("Location: ../login.html?error=1");
        exit();
    }
} else {
    header("Location: ../login.html");
    exit();
}
?>