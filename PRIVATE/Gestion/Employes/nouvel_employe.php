<?php
  // Initialiser la session
  session_start();
  // Vérifiez si l'utilisateur est connecté, sinon redirigez-le vers la page de connexion
  if(!isset($_SESSION["login"])){
    header("Location: index.php");
    exit(); 
  }
?>
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
        $sexe = $_POST['sexe'];
        $date_naissance=$_POST['naissance'];

        $sql = "INSERT INTO Employés (nom,prenom,date_naissance,sexe,id_dep,poste,mail,salaire) VALUES ('$nom','$prenom','$date_naissance','$sexe','$departement','$poste','$mail','$salaire');";

        
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
<!------------------------------------Requête SQL POSTES-------------------------------------------->
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
<form method="post">

    <!--Formulaire du NOM -->
    <label for="nom">Nom</label>
    <input type="text" name="nom" id="nom"><br />

     <!--Formulaire du PRENOM -->
    <label for="text">Prénom</label>
    <input type="text" name="prenom" id="prenom"><br />

    <!--Formulaire du SEXE -->
    <label for="sexe-select">Sexe ?</label>
    <select name="sexe" id="sexe">
    <option value="homme">Homme</option>
    <option value="femme">Femme</option>
    <option value="gender-fluide">Gender-fluide</option>
    <option value="robot">Robot</option>
    <option value="grenouille">Grenouille</option>
    <option value="autre">Autre</option>
    </select><br /><br />

    <!--Formulaire du DEPARTEMENT -->
    <label for="departement-select">Le département ? </label>
    <select name="departement" id="poste-select">
    <?php 
        foreach($data as $cc2 => $name) {
            echo '<option value="' . $name['id_dep'] . '">' .  $name["nom"] . '</option>';
            } 
        ?>
    </select><br /><br />

    <!--Formulaire de la DATE DE NAISSANCE -->
    <input id="date" type="date" name=naissance value="2017-06-01">
    </br>

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