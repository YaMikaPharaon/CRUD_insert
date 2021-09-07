<?php

// Liste des informations concernant la base de donnée
$servername = "localhost";
$username = "root";
$password = "jgneuy";
$dbname = "car2run";

// Récupération des éléments qui ont été envoyés depuis le formulaire
$marque = $_POST["marque"];
$modele = $_POST["modele"];
$motorisation = $_POST["motorisation"];
$puissance = $_POST["puissance"];
$origine = $_POST["origine"];
$couleur = $_POST["couleur"];
$prix = $_POST["prix"];

// Création d'une connexion
$conn = new mysqli($servername, $username, $password, $dbname);

// Vérification de la connexion
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// Création de la requête d'envois de données
$sql = "INSERT INTO cars (marque, modele, motorisation, puissance, origine, couleur, prix)
VALUES ('$marque', '$modele', '$motorisation', '$puissance', '$origine', '$couleur', '$prix')";

// Vérification de la requête d'envois de données
if ($conn->query($sql) === TRUE) {
  echo "Nouvel enregistrement crée avec succès";

} else {
  echo "Erreur: " . $sql . "<br>" . $conn->error;
}

// Fermeture de la connexion à la base de donnée
$conn->close();
header('location:index.html');
?>