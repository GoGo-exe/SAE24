
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <style>
         *{
            font-family:arial;
         }
         body{
            margin:20px;
         }
         input{
            border:solid 1px #2222AA;
            margin-bottom:10px;
            padding:16px;
            outline:none;
            border-radius:6px;
         }
         .erreur{
            color:#CC0000;
            margin-bottom:10px;
         }
      </style>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter un produit</title>
</head>
<body>
    

<?php

/**
 * Use an HTML form to create a new entry in the
 * users table.
 *
 */


if (isset($_POST['submit'])) {
    require "../config.php";
    require "../common.php";

    try  {
        $connection = new PDO($dsn, $username, $password, $options);
        
        $new_user = array(
            "code_produit" => $_POST['code_produit'],
            "libelle" => $_POST['libelle'],
            "image"  => $_POST['image'],
            "prix_unitaire"     => $_POST['prix_unitaire'],
            "information" => $_POST['information'],
            
            );

        $sql = sprintf(
                "INSERT INTO %s (%s) values (%s)",
                "Produit",
                implode(", ", array_keys($new_user)),
                ":" . implode(", :", array_keys($new_user))
        );
        
        $statement = $connection->prepare($sql);
        $statement->execute($new_user);
    } catch(PDOException $error) {
        echo $sql . "<br>" . $error->getMessage();
    }
}
?>

<?php require "../PUBLIQUE/templates/header.php"; ?>

<?php if (isset($_POST['submit']) && $statement) { ?>
    <blockquote><?php echo $_POST['libelle']; ?> a été ajouté !</blockquote>
<?php } ?>

<h2>Ajouter un produit</h2>

<form method="post">
    <label for="libelle">Libelle</label>
    <input type="text" name="libelle" id="libelle"><br />
    <label for="image">Image (lien)</label>
    <input type="text" name="image" id="image"><br />
    <label for="prix_unitaire">Prix unitaire</label>
    <input type="text" name="prix_unitaire" id="prix_unitaire"><br />
    <label for="information">Information sur l'article</label>
    <input type="text" name="information" id="information"><br />
    <label for="cod_produit">Code du produit</label>
    <input type="text" name="code_produit" id="code_produit"><br />
    <input type="submit" name="submit" value="Créer un produit"><br />
</form>

<a href="index.php">Retourner au menu</a>

<?php require "../PUBLIQUE/templates/footer.php"; ?>


</body>
</html>