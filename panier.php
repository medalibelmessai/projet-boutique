<?php
session_start();
require "dataprojet.php";

// ➕ PLUS
if(isset($_GET['plus'])) {
    $code = $_GET['plus'];
    $_SESSION['cart'][$code]++;
}

// ➖ MINUS
if(isset($_GET['minus'])) {
    $code = $_GET['minus'];
    $_SESSION['cart'][$code]--;

    if($_SESSION['cart'][$code] <= 0) {
        unset($_SESSION['cart'][$code]);
    }
}

// ❌ DELETE
if(isset($_GET['delete'])) {
    unset($_SESSION['cart'][$_GET['delete']]);
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Panier APEX</title>
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
<h1 style="color: white; text-align: center;">🛒 Mon Panier</h1>

<?php if(empty($_SESSION['cart'])): ?>
    <p style="text-align: center; font-size: x-large; font-weight: bold;">Panier vide</p>

<?php else: ?>
<div class="panier-item">
<table border="1" cellpadding="10" >
<tr>
    <th>Produit</th>
    <th>Prix</th>
    <th>Quantité</th>
    <th>Total</th>
    <th>Action</th>
</tr>
<br>


<?php
$totalGeneral = 0;

foreach($_SESSION['cart'] as $code => $qte):

    // نلقاو produit بالcode
    $product = null;

    foreach($products as $p) {
        if($p['code'] == $code) {
            $product = $p;
            break;
        }
    }

    if(!$product) continue;

    $total = $product['prix'] * $qte;
    $totalGeneral += $total;
?>

<tr>
    <td><?= $product['nom'] ?></td>
    <td><?= $product['prix'] ?> dt</td>
    <td><?= $qte ?></td>
    <td><?= $total ?> dt</td>
    <td>
        <a href="?plus=<?= $code ?>">➕</a>
        <a href="?minus=<?= $code ?>">➖</a>
        <a href="?delete=<?= $code ?>">❌</a>
    </td>
</tr>

<?php endforeach; ?>

<tr>
    <td colspan="3"><b>Total</b></td>
    <td><b><?= $totalGeneral ?> dt</b></td>
    <td></td>
</tr>

</table>

<?php endif; ?>
</div> 
<form action="inscription.php">
    <button class="checkout-btn">confirmer la commande</button>
</form>



</body>
</html>