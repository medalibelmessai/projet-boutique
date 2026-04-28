<?php
require_once "ClientController.php";

$controller = new ClientController();
$message = $controller->inscrire();


if(isset($_POST['inscrire'])) {

    $nom = trim($_POST['nom']);
    $email = trim($_POST['email']);
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    
}
?>
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Inscription</title>
    <link rel="stylesheet" href="projet.css">
</head>

<body>
<div class="header">
    <img src="logo.png" class="logo">
    <a class="shop-name" href="projet_catalogue.php">APEX</a>
    <a href="rechercher_projet.php" class="search-icon">🔍</a>
    <a href="panier.php" class="cart">🛒</a>
   
</div>
<h1>Créer un compte</h1>

<form method="POST">

    <input type="text" name="nom" placeholder="Ton nom" required>
    
    <input type="email" name="email" placeholder="Ton email" required>

    <input type="password" name="password" placeholder="Mot de passe" required>

    <button type="submit" name="inscrire">S'inscrire</button>

</form>

<p><?= $message ?></p>

</body>
</html>
