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

        
        $prenom=$_POST['prenom'];
        $commentaire=$_POST['commentaire'];
        $sanction=$_POST['sanction'];
        $date_fin=$_POST['date_fin'];

        $sql = "INSERT INTO Sanction (id_emp,commentaire,sanction,date_fin) VALUES ('$prenom','$sanction','$commentaire','$date_fin');";

        
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
<!-------------------------------------------------------------------------------->


<h2>Ajouter un employé</h2>
<form method="post">

   

     <!--Formulaire du prenom -->
    <label for="departement-select">Son prénom ? </label>
    <select name="prenom" id="poste-select">
   <?php
    foreach($data_prenom as $cc => $name) {
            echo '<option value="' . $name['id_emp'] . '">' .  $name["prenom"] . '</option>';
            } 
        ?>
    </select><br /><br />

    <label for="mail">Commentaire</label>
    <input type="text" name="commentaire" id="commentaire"><br />

    <label for="mail">Sanction</label>
    <input type="text" name="sanction" id="sancttion"><br />

    <label for="departement-select">Date de fin de sanction </label>
    <input id="date" type="date" name="date_fin" value="2017-06-01">
    </br>

    <input type="submit" name="submit" value="Sanctionner"><br />

   

<a href="index.php">Retourner au menu</a>

        </form>


</body>
</html>