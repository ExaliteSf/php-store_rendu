<?php
function uploadImage($file, $uploadDirectory)
{

    if ($file['error'] !== UPLOAD_ERR_OK) {
        return false;
    }

    // que 3 types acceptés
    $allowedTypes = ['image/jpeg', 'image/png', 'image/gif'];
    if (!in_array($file['type'], $allowedTypes)) {
        return false;
    }

    $fileName = uniqid() . '' . $file['name'];

    $destination = $uploadDirectory . '/' . $fileName;
    if (!move_uploaded_file($file['tmp_name'], $destination)) {
        return false;
    }
 
    return $destination;
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_FILES['image'])) {

    $uploadDirectory = 'uploads';

    $imagePath = uploadImage($_FILES['image'], $uploadDirectory);

    if ($imagePath) {

        require_once 'Database.php';
        $pdo = Database::getConnection();
        $stmt = $pdo->prepare("INSERT INTO images (path) VALUES (:path)");
        $stmt->execute(['path' => $imagePath]);

        echo "L'image a été téléchargée avec succès.";
    } else {
        echo "Une erreur s'est produite lors du téléchargement de l'image.";
    }
}
?>