<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="projet.css">
</head>
<body>
    <h1>Formulaire d'ajout de Produit</h1>
    <form action="<?= $_SERVER['PHP_SELF'] ?>" method="post">
        <table>
             <tr>
                <td><label for="">code:</label> </td>
                <td> <input type="text" name="nom"> </td>
            </tr>
           <tr>
                <td><label for="">Nom:</label> </td>
                <td> <input type="text" name="nom"> </td>
            </tr>
            
            <tr>
                <td><label for="">Prix:</label> </td>
                <td> <input type="number" name="prix" step="any"> </td>
            </tr>
            <tr>
                <td><label for="">Stock:</label> </td>
                <td> <input type="number" name="stock" > </td>
            </tr>
            <tr>
                <td><label for="">Categorie:</label> </td>
                <td> <input type="text" name="categorie" > </td>
            </tr>
            <tr>
                <td></td>
                <td> <input type="submit" name="ajouter" value="Ajouter Produit"> </td>
            </tr>
        </table>
       
        <?php
            $db = new PDO('mysql:host=localhost;dbname=projet boutique;charset=utf8mb4','root','');
            if(isset($_POST['ajouter'])){
                if(isset($_POST['code']) && isset($_POST['nom'])&& isset($_POST['prix'])&& isset($_POST['stock'])&& isset($_POST['category'])){
                 $code=htmlspecialchars(trim($_POST['code']),ENT_QUOTES);
                $nom=htmlspecialchars(trim($_POST['nom']),ENT_QUOTES);
                $prix=htmlspecialchars(trim($_POST['prix']),ENT_QUOTES);
                $stock=htmlspecialchars(trim($_POST['stock']),ENT_QUOTES);
                $categorie=htmlspecialchars(trim($_POST['category']),ENT_QUOTES);
                   
                   
                    if(!empty($nom)&&!empty($prix)&&!empty($stock)&&!empty($category)){
                        if(!is_numeric($prix)||!is_numeric($stock)){
                            echo "Le prix et le stock doivent être numériques";
                        }
                        elseif((float)$prix<0 || (int)$stock<0){
                            echo "Le prix et le stock doivent être positifs";
                        }
                        else{
                        $query='INSERT INTO produits (code, nom, prix, stock, category) VALUES (?,?,?,?,?)';
                        $stmt=$db->prepare($query);
                        $result=$stmt->execute([$code,$nom,floatval($prix),null,$category,"product.jpg",intval($stock),false]);
                        echo "<p>produit ",$nom,"est ajouté avec succés</p>";
                    }
                    }
                else{
                    echo "Veuillez remplir tous les champs";
                }
                }
            }
        ?>
    </form>
</body>
</html>