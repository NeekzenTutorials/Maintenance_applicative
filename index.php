<?php
echo "<a href='setup.php'><button>Installer la base de données</button></a> <br />";
# Login de connexion à la base de données
$servername = "localhost"; // Nom du serveur MySQL, par défaut localhost
$username = "root"; // Nom d'utilisateur de la base de donnée, par défaut root
$password = "root"; // Mot de passe utilisateur de la base de donnée, par défaut root
$dbname = "maintenance"; // Nom de la base de données à utiliser

# Connexion à la base
$conn = new mysqli($servername, $username, $password, $dbname);

# Verification connexion
if ($conn->connect_error) {
    die("Échec de la connexion : " . $conn->connect_error);
}
echo "Connexion réussie à la base de données MySQL <br /><br />";

echo "Salut " . $_GET['name'] . "<br />"; # Affichage du nom d'utilisateur

# boutons de redirection
echo "<a href='signup.php'><button>S'inscrire</button></a>";
echo "<a href='login.php'><button>Se connecter</button></a>";

// Fermer la connexion
$conn->close();
?>