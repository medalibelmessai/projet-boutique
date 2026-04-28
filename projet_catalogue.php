<?php
session_start();
require "dataprojet.php";

if(isset($_POST['ajouter'])) {

    $code = $_POST['produit_code'];

    if(!isset($_SESSION['cart'])) {
        $_SESSION['cart'] = [];
    }

    if(isset($_SESSION['cart'][$code])) {
        $_SESSION['cart'][$code]++;
    } else {
        $_SESSION['cart'][$code] = 1;
    }

    header("Location: projet_catalogue.php");
    exit();
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="projet.css">
    <title>Boutique Apex de Wassim et Med Ali</title>
</head>

<body>




<div class="header">

    <img src="logo.png" class="logo">

    <h1 class="shop-name">APEX</h1>

    <div class="icons">
        <a href="projet_catalogue.php"  class="cart">🏠</a>
        <a href="panier.php" class="cart">🛒</a>
        <a href="rechercher_projet.php">🔍</a>
        <a href="inscription.php">👤</a> 
    </div>

</div>



<?php $category = $_GET['category'] ?? ""; ?>
<form method="GET" class="filter">
    <button type="submit" name="category" value="" class="btn-filter">Tous</button>
    <button type="submit" name="category" value="Informatique" class="btn-filter">Informatique</button>
    <button type="submit" name="category" value="Accessoires" class="btn-filter">Accessoires</button>
</form>
<div class="container">
<?php
require "dataprojet.php";
$category = $_GET['category'] ?? "";
foreach($products as $product):

    if($category != "" && $product['category'] != $category) {
        continue;
    }
?>
    <div class='card'>
        <h2 class="title-card"><?= $product['nom'] ?></h2>
        <h3 class="category"><?= $product['category'] ?></h3>
        
        <img src="<?= "images/".$product['image'] ?>" 
             alt="<?= $product['nom'] ?>" height="100">

        <p class="prix">Prix: <?= $product['prix'] ?> dt</p>

        <?php if(empty($product['stock'])): ?>
            <p class="stock">Stock Epuisé</p>
            <button class="btn-dontbuy" disabled>N'est pas disponible</button>
        <?php else: ?>
            <p class="stock">Stock disponible</p>

            <!-- ✅ FORM AJOUT -->
            <form method="post">
                <input type="hidden"  name="produit_code" value="<?= $product['code'] ?>">
                 <button type="submit" class="btn-buy" name="ajouter">Acheter</button>
              </form>
        <?php endif; ?>

    </div>

<?php endforeach; ?>
</div>

</body>
</html>