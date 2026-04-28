<?php
session_start();
require "dataprojet.php";


$conn = new PDO("mysql:host=localhost;dbname=projet boutique", "root", "");

if(isset($_POST['valider'])) {

    // 1. insert commande
    $stmt = $conn->prepare("INSERT INTO commandes(nom,email,numero) VALUES (?,?,?)");
    $stmt->execute([$_POST['nom'], $_POST['email'], $_POST['numero']]);

    $commande_id = $conn->lastInsertId();

    // 2. insert products from session cart
    foreach($_SESSION['cart'] as $code => $qty) {

        $stmt = $conn->prepare("INSERT INTO commande_items(commande_id,code_produit,quantite) VALUES (?,?,?)");
        $stmt->execute([$commande_id, $code, $qty]);
    }

    // 3. clear cart
    unset($_SESSION['cart']);

    echo "Commande enregistrée ✔️";
}
?>


<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Checkout</title>
    <link rel="stylesheet" href="projet.css">
</head>
<body>
<div class="header">

    <img src="logo.png" class="logo">

    <h1 class="shop-name">APEX</h1>

    <div class="icons">
        <a href="projet_catalogue.php"  class="cart">🏠</a>
        <a href="panier.php" class="cart">🛒</a>
    </div>

</div>
<h1 style="color: white; text-align: center;"> Confirmation commande</h1>

<form method="post">

    <label >Nom:</label><br>
    <input type="text" placeholder="Ton nom" name="nom" required><br><br>

    <label>Numéro:</label><br>
    <input type="text" placeholder="+216 21200300" name="numero" required><br><br>

    <label>Email:</label><br>
    <input type="email" placeholder="ton_email@gmail.com" name="email" required><br><br>

    <button type="submit" name="valider" class="checkout-btn">Valider commande</button>

</form>

</body>
</html>