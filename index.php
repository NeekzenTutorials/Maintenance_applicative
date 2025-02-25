<?php
echo "<a href='setup.php'><button>Installer la base de données</button></a> <br />";
# Login de connexion à la base de données
$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "maintenance";

# Connexion à la base
$conn = new mysqli($servername, $username, $password, $dbname);

# Verification connexion
if ($conn->connect_error) {
    die("Échec de la connexion : " . $conn->connect_error);
}
echo "Connexion réussie à la base de données MySQL <br /><br />";

echo "Salut " . $_GET['name'] . "<br />";

# redirection
echo "<a href='signup.php'><button>S'inscrire</button></a>";
echo "<a href='login.php'><button>Se connecter</button></a>";



// Fermer la connexion
$conn->close();
?>