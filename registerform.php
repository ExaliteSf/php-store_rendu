<?php
function generateRegisterForm()
{
    $pdo = new PDO('mysql:host=localhost;dbname=php_store', 'votre_nom_utilisateur', 'votre_mot_de_passe');
    $stmt = $pdo->query("SELECT * FROM category");
    $categories = $stmt->fetchAll(PDO::FETCH_ASSOC);

    $form = '<form method="post" action="register_process.php">';
    $form .= '<input type="text" name="username" placeholder="Nom utilisateur" required><br>';
    $form .= '<input type="password" name="password" placeholder="Mot de passe" required><br>';
    $form .= '<input type="password" name="confirm_password" placeholder="Confirmer le mot de passe" required><br>';
    $form .= '<select name="category_id">';
    foreach ($categories as $category) {
        $form .= '<option value="' . $category['id'] . '">' . $category['name'] . '</option>';
    }
    $form .= '</select><br>';
    $form .= '<input type="submit" name="register" value="inscription">';
    $form .= '</form>';

    return $form;
}

// Pour afficher le formulaire d'inscription, il suffit d'appeler cette fonction.
echo generateRegisterForm();
?>