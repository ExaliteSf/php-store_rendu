<?php

require_once 'Database.php';


function registerUser($username, $password)
{

    $pdo = Database::getConnection();


    $stmt = $pdo->prepare("SELECT id FROM users WHERE login = :username");
    $stmt->execute(['username' => $username]);
    $user = $stmt->fetch();

    if ($user) {

        return false;
    }





    $stmt = $pdo->prepare("INSERT INTO users (login, password) VALUES (:username, :password)");
    $result = $stmt->execute(['username' => $username, 'password' ]);

    return $result;
}


if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $username = $_POST["username"];
    $password = $_POST["password"];
    $confirmPassword = $_POST["confirm_password"];


    if ($password !== $confirmPassword) {

        exit("Les mots de passe ne correspondent pas.");
    }


    $registrationResult = registerUser($username, $password);


    if ($registrationResult) {

        exit("L'utilisateur a été enregistré avec succès.");
    } else {

        exit("Une erreur s'est produite lors de l'inscription.");
    }
}

// 
echo generateRegisterForm();
?>