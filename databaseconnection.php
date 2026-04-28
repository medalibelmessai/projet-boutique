
<?php
    $dsn = 'mysql:host=localhost;dbname=projet boutique;charset=utf8mb4'; 
    $user = 'dali et wassim'; 
    $psw = ''; 

try {
    $db = new PDO($dsn, $user, $psw); 
    // Configuration pour générer des exceptions en cas d'erreur SQL
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 
} catch (PDOException $e) {
    die("Erreur de connexion : " . $e->getMessage()); 
}
?>