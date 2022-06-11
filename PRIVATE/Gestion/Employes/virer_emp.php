
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

        $prenom=$_POST['prenom'];
        $poste= $_POST['poste'];

        $sql = "DELETE FROM Employés WHERE id_emp='$prenom' AND poste ='$poste';";

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

Virer un employé !
</br>
</br>
<form method="post">

    <!--Formulaire du DEPARTEMENT -->
    <label for="departement-select">Son prénom ? </label>
    <select name="prenom" id="poste-select">
   <?php
    foreach($data_prenom as $cc => $name) {
            echo '<option value="' . $name['id_emp'] . '">' .  $name["prenom"] . '</option>';
            } 
        ?>
    </select><br /><br />

    <!--Formulaire du POSTE -->
    <label for="post-select">Le poste ? </label>
    <select name="poste" id="poste-select">
       <?php
    foreach($data_poste as $cc3 => $name) {
            echo '<option value="' . $name['id_poste'] . '">' .  $name["nom"] . '</option>';
            } 
        ?>
    </select><br /><br />

    <!--Bouton de VALIDATION -->
    <input type="submit" name="submit" value="DEHORS !"><br />
</form>

<a href="index.php">Retourner au menu</a>

