<?php
session_start();

$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "maintenance";

// Créer une connexion
$conn = new mysqli($servername, $username, $password, $dbname);

// Vérifier la connexion
if ($conn->connect_error) {
    die("Échec de la connexion : " . $conn->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $password = $_POST['password'];

    // Requête avec vulnérabilité SQL Injection
    $sql = "SELECT password FROM Users WHERE username = '$name' AND password = '$password'";
    $result = $conn->query($sql);

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
