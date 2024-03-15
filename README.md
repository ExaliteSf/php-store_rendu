# PHP - CNAM 2024

## Base de données - Configuration

Créer un fichier `db.ini` dans le dossier `config`, inscrire ensuite vos propres données de configuration :

```ini
HOST=127.0.0.1
PORT=3306
DB_NAME=db_name
CHARSET=utf8mb4
USER=user
PASSWORD=pass
```

// Dans la fonction ajout_image.php il y a une erreur lors de l'enregistremennt de l'image dans la BDD, je n'ai pas sur trouver d'ou venais l'erreur même avec l'aide de chat GPT et de quelques forums mais elle est censé vérifier le type de fichier uploadé (elle en gère que 3 pour limiter la casse) et elle enregistre en théorie le chemin de l'image dans la BDD

// dans login.php il y a possibilité pour le 'client' ayant un compte de se connecter via un username et un password, elle les vérifie --> coorecte elle redirige vers le index.php sinon elle affiche un message d'erreur simple

//Pour le register.php elle gere l'inscription d'un utilisateur, elle confirme que les mdp sont bien similaires, si c'est ok elle marque un marque un message de validation et enregistre dans la bdd si non un message d'erreur, l'utilisateur peut a présent passer par la page login pour se connecter
Elle echo la fonction register form.php