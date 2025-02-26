<?php
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

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Préparer et exécuter la requête d'insertion
    $stmt = $conn->prepare("INSERT INTO Users (username, password) VALUES (?, ?)");
    $stmt->bind_param("ss", $username, $password);

    if ($stmt->execute()) {
        header("Location: index.php"); // Redirection vers l'accueil après inscription
        exit();
    } else {
        echo "Erreur : " . $stmt->error;
    }

    $stmt->close();
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Page d'Inscription</title>
</head>
<body>
    <form method="post" action="">
        <label for="username">Nom d'utilisateur :</label>
        <input type="text" id="username" name="username" required>
        <br>
        <label for="password">Mot de passe :</label>
        <input type="password" id="password" name="password" required>
        <br>
        <button type="submit">S'inscrire</button>
    </form>
</body>
</html>
