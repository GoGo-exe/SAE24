
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
    <title></title>
</head>
<body>
    
<?php
 require "../../../config.php";
 require "../../../common.php";
if (isset($_POST['submit'])) {

    try  {
        $connection = new PDO($dsn, $username, $password, $options);
        
        $new_adresse = array(
            "note" => $_POST['note'],
        );

        $nom=$_POST['nom'];
        $prenom=$_POST['prenom'];
        $departement= $_POST['departement'];
        $poste= $_POST['poste'];
        $mail= $_POST['mail'];
        $salaire= $_POST['salaire'];

        $sql = "INSERT INTO Employés (nom,prenom,departement,poste,mail,salaire) VALUES ('$nom','$prenom','$departement','$poste','$mail','$salaire');";

        
        $statement = $connection->prepare($sql);
        $statement->execute($new_adresse);
    } catch(PDOException $error) {
        echo $sql . "<br>" . $error->getMessage();
    }
}
?>

<?php include "../../../PRIVATE/private_templates/header.php";
?>

<?php if (isset($_POST['submit']) && $statement) { ?>
    <blockquote><?php echo $_POST['libelle']; ?> a été ajouté !</blockquote>
<?php } ?>

<!------------------------------------Requête SQL DEPARTEMENT-------------------------------------------->
<?php 

try  {
    $connection = new PDO($dsn, $username, $password, $options);
    
    $sql = sprintf(
            "SELECT nom,id_dep FROM Département;"
    );
    
    $statement = $connection->prepare($sql);
    $statement->execute($new_user);
} catch(PDOException $error) {
    echo $sql . "<br>" . $error->getMessage();
}

$data = $statement->fetchAll();

?>
<!------------------------------------Requête SQL DEPARTEMENT-------------------------------------------->
<?php 

try  {
    $connection = new PDO($dsn, $username, $password, $options);
    
    $sql = sprintf(
            "SELECT nom,id_poste FROM Postes;"
    );
    
    $statement = $connection->prepare($sql);
    $statement->execute($new_user);
} catch(PDOException $error) {
    echo $sql . "<br>" . $error->getMessage();
}

$data_poste = $statement->fetchAll();

?>
<!------------------------------------------------------------------------------------------->


<h2>Ajouter un employé</h2>
testes
<form method="post">

    <!--Formulaire du NOM -->
    <label for="nom">Nom</label>
    <input type="text" name="nom" id="nom"><br />

     <!--Formulaire du PRENOM -->
    <label for="text">Prénom</label>
    <input type="text" name="prenom" id="prenom"><br />

    <!--Formulaire du DEPARTEMENT -->
    <label for="departement-select">Le département ? </label>
    <select name="departement" id="poste-select">
    <?php 
        foreach($data as $cc2 => $name) {
            echo '<option value="' . $name['id_dep'] . '">' .  $name["nom"] . '</option>';
            } 
        ?>
    </select><br /><br />

    <!--Formulaire du POSTE -->
    <label for="post-select">Le poste ? </label>
    <select name="poste" id="poste-select">
    <?php 
        foreach($data_poste as $cc2 => $name) {
            echo '<option value="' . $name['id_poste'] . '">' .  $name["nom"] . '</option>';
            } 
        ?>
    </select><br /><br />

    <!--Formulaire du MAIL -->
    <label for="mail">E-Mail</label>
    <input type="text" name="mail" id="mail"><br />

    <!--Formulaire du Salaire -->
    <label for="Salaire">Salaire</label>
    <input type="int" name="salaire" id="salaire"><br />

    <!--Bouton de VALIDATION -->
    <input type="submit" name="submit" value="Recruter"><br />
</form>

<a href="index.php">Retourner au menu</a>




</body>
</html>