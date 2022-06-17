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


<h2>Ajouter un employé</h2>
<form method="post">

    <!--Formulaire du NOM -->
    <label for="nom">Nom</label>
    <input type="text" name="nom" id="nom"><br />

     <!--Formulaire du PRENOM -->
    <label for="text">Prénom</label>
    <input type="text" name="prenom" id="prenom"><br />

<a href="index.php">Retourner au menu</a>




</body>
</html>