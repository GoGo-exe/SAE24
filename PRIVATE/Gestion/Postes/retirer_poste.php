
<?php include "../../../PRIVATE/private_templates/header.php";
?>

<?php
require "../../../config.php";
if (isset($_POST['submit'])) {

    try  {
        $connection = new PDO($dsn, $username, $password, $options);
        
        $new_adresse = array(
            "note" => $_POST['note'],
        );

        $poste= $_POST['poste'];

        $sql = "DELETE FROM Postes WHERE id_poste='$poste';";

        $statement = $connection->prepare($sql);
        $statement->execute($new_adresse);
    } catch(PDOException $error) {
        echo $sql . "<br>" . $error->getMessage();
    }
}
?>

<!------------------------------------Requête SQL PRENOM-------------------------------------------->
<?php 

try  {
    $connection = new PDO($dsn, $username, $password, $options);
    
    $sql = sprintf(
            "SELECT id_emp,prenom FROM Employés;"
    );
    
    $statement = $connection->prepare($sql);
    $statement->execute($new_user);
} catch(PDOException $error) {
    echo $sql . "<br>" . $error->getMessage();
}

$data_prenom = $statement->fetchAll();

?>
<!------------------------------------Requête SQL POSTE-------------------------------------------->
<?php 

try  {
    $connection = new PDO($dsn, $username, $password, $options);
    
    $sql = sprintf(
            "SELECT id_poste,nom FROM Postes;"
    );
    
    $statement = $connection->prepare($sql);
    $statement->execute($new_user);
} catch(PDOException $error) {
    echo $sql . "<br>" . $error->getMessage();
}

$data_poste = $statement->fetchAll();

?>
<!------------------------------------------------------------------------------------------->

Enlever un poste ! (Seulement les postes non occupés !)
</br>
</br>
<form method="post">

    <!--Formulaire du nom du poste -->
    <label for="poste-select">Quel poste voulez vous enlever ? </label>
    <select name="poste" id="poste-select">
   <?php
    foreach($data_poste as $cc => $name) {
            echo '<option value="' . $name['id_poste'] . '">' .  $name["nom"] . '</option>';
            } 
        ?>
    </select><br /><br />

    <!--Bouton de VALIDATION -->
    <input type="submit" name="submit" value="Retirer le poste"><br />
</form>

<a href="index.php">Retourner au menu</a>

