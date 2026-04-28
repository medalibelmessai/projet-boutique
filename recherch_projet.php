<?php
session_start();
?>
<?php
    if(isset($_GET['query'])&& isset($_GET['category'])){
        require "dataprojet.php";
        $result=[];
        foreach($products as $product){
            $verifQuery=strpos(strtolower($product['nom']),trim(strtolower($_GET['query'])));
            if(strtolower($product['category'])===strtolower($_GET['category']))
                $verifCat=true;
            else
                $verifCat=false;
        
            if($verifQuery!==false && $verifCat!==false){
                echo   "<div><div>",$product['nom'],"</div><img src='images/",$product['image'],"' alt='",$product['nom'],"'></div> <hr>";

            }
        }
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

</div>   </body>
</html>