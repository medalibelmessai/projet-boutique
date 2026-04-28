<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="recherch.css">
</head>
<body>
    <h1>Recherche de produits</h1>
    <form action="recherch_projet.php" method="GET">
        <label for="">Insérer partie du nom du produit</label>
        <input type="text" name="query">
        <br>
        <label>Chosir catégorie</label>
    <select name="category" id="">
        <?php 
                require "dataprojet.php";
               $cat=array_column($products,'category','category');
               foreach($cat as $value): ?>
                   <option value="<?= $value ?>"><?= $value ?></option>
                <?php endforeach ; ?>
            </select>
    
        <br>
        <input type="submit" value="Rechercher">
    </form>
</body>
</html>