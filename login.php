<?php
require_once 'Database.php';

function loginUser($username, $password)
{
    $pdo = Database::getConnection();

    $stmt = $pdo->prepare("SELECT id, login, password FROM users WHERE login = :username");
    $stmt->execute(['username' => $username]);
    $user = $stmt->fetch();

    if (!$user || !password_verify($password, $user['password'])) {
        return false;
    }

    return $user;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];

    $user = loginUser($username, $password);

    if ($user) {
        session_start();
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['username'] = $user['login'];
        header("Location: index.php");
        exit();
    } else {
        $errorMessage = "C'est inccorect.";
    }
}
?>