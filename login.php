<?php
session_start();
# Login de connexion à la base de données
$servername = "localhost"; // Nom du serveur MySQL, par défaut localhost
$username = "root"; // Nom d'utilisateur de la base de donnée, par défaut root
$password = "root"; // Mot de passe utilisateur de la base de donnée, par défaut root
$dbname = "maintenance"; // Nom de la base de données à utiliser

// Créer une connexion
$conn = new mysqli($servername, $username, $password, $dbname);

// Vérifier la connexion
if ($conn->connect_error) {
    die("Échec de la connexion : " . $conn->connect_error);
}

# Récupération des données du formulaire
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $password = $_POST['password'];

    # Récupération de l'utilisateur dans la base de données
    $sql = "SELECT password FROM Users WHERE username = '$name' AND password = '$password'";
    $result = $conn->query($sql);

    # Si on récupère un résultat, on stock le nom d'utilisateur dans la session et on redirige vers l'accueil
    if ($result && $result->num_rows > 0) {
        $_SESSION['name'] = $name;
        header("Location: index.php?name=" . urlencode($name));
        exit();
    } else {
        echo "Nom d'utilisateur ou mot de passe incorrect.";
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Page de Connexion</title>
</head>
<body>
    <form method="post" action="">
        <label for="name">Nom d'utilisateur :</label>
        <input type="text" id="name" name="name" required>
        <br>
        <label for="password">Mot de passe :</label>
        <input type="text" id="password" name="password" required>
        <br>
        <button type="submit">Se connecter</button>
    </form>
</body>
</html>
