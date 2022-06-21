<?php
  // Initialiser la session
  session_start();
  // Vérifiez si l'utilisateur est connecté, sinon redirigez-le vers la page de connexion
  if(!isset($_SESSION["login"])){
    header("Location: index.php");
    exit(); 
  }
?>
<?php include "../../../PRIVATE/private_templates/header.php";
?>

<?php
require "../../../config.php";
if (isset($_POST['submit'])) {

    try  {
        $connection = new PDO($dsn, $username, $password, $options);
    

        $prenom=$_POST['prenom'];
        $sanc= $_POST['sanction'];

        $sql = "DELETE FROM Sanction WHERE id_emp='$prenom' AND sanction ='$sanc';";

        $statement = $connection->prepare($sql);
        $statement->execute($new_adresse);
    } catch(PDOException $error) {
        echo "employé deja sanctionné !";
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
            "SELECT sanction FROM Sanction;"
    );
    
    $statement = $connection->prepare($sql);
    $statement->execute($new_user);
} catch(PDOException $error) {
    echo $sql . "<br>" . $error->getMessage();
}

$data_sanc = $statement->fetchAll();

?>
<!------------------------------------------------------------------------------------------->
Enlever une sanction !
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
    <label for="post-select">La sanction ? </label>
    <select name="sanction" id="poste-select">
       <?php
    foreach($data_sanc as $cc3 => $name) {
            echo '<option value="' . $name['sanction'] . '">' .  $name["sanction"] . '</option>';
            } 
        ?>
    </select><br /><br />

    <!--Bouton de VALIDATION -->
    <input type="submit" name="submit" value="Enlever"><br />
</form>

<a href="index.php">Retourner au menu</a>

