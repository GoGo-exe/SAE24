<?php include "../../../PRIVATE/private_templates/header.php";
?>
<?php
$user = "Serveur";
$pass = "BDD123_serveur";
$db = "SAE24";
$db = new mysqli("192.168.50.214", $user,$pass,$db)
or die ("unable to connect");
require "../../../config.php";
?>
<center> <h1>Liste des employés </center></h1>
<center>
<form method = "post">
   <input type = "search" name = "name">
   -
   <input type = "submit" name = "validation" value = "Rechercher">
  </form>
</center>


<?php

//bouton de validation-----------------------------------------------------------------------------
if (isset($_POST['validation'])) {

    try  {
        $connection = new PDO($dsn, $username, $password, $options);
        
        $new_adresse = array(
            "note" => $_POST['note'],
        );

        $nom= $_POST['name'];

        $sql = "SELECT *,Employés.nom AS nom_emp,Département.nom AS nom_dep,Postes.nom AS nom_postes FROM Employés INNER JOIN Département ON Employés.id_dep = Département.id_dep INNER JOIN Postes ON Employés.poste = Postes.id_poste WHERE Employés.nom='$nom';";
        $statement = $connection->prepare($sql);
        $statement->execute($new_adresse);

        $data = $statement -> fetchAll();
        
        foreach($data as $cc2 => $name) {
            ?>
            <center>
            <table border = '1'>
            <tr><td><strong> Nom </strong></td> <td><strong> Prénom </strong></td><td><strong>Sexe </strong></td> <td><strong> Poste </strong></td> <td><strong> Département </strong></td> 
            <td><strong> Mail </strong></td> <td><strong> Date de recrutement </strong></td><td><strong> Salaire </strong></td></tr>
            <center>
            <?php
        echo"<tr><td>{$name['nom_emp']}</td><td> {$name['prenom']} </td><td> {$name['sexe']} </td><td> {$name['nom_postes']} </td><td> {$name['nom_dep']}</td> <td> {$name['mail']} </td><td> {$name['date_recrutement']} </td><td> {$name['salaire']} </td></tr></table>\n";
        }

    } catch(PDOException $error) {
        echo $sql . "<br>" . $error->getMessage();
    }
}

//------------------------------------------------------------------------------------------

$sql = "SELECT *,Employés.nom AS nom_emp,Département.nom AS nom_dep,Postes.nom AS nom_postes FROM Employés INNER JOIN Département ON Employés.id_dep = Département.id_dep INNER JOIN Postes ON Employés.poste = Postes.id_poste;";
$result = mysqli_query($db,$sql) or die ("bad query");
?>
</br></br>
<center><table border = '1'>

<tr><td><strong> Nom </strong></td> <td><strong> Prénom </strong></td><td><strong>Sexe </strong></td> <td><strong> Poste </strong></td> <td><strong> Département </strong></td> 
<td><strong> Mail </strong></td> <td><strong> Date de recrutement </strong></td><td><strong> Salaire </strong></td></tr>

<?php
while($row=mysqli_fetch_assoc($result)){
    echo"<tr><td>{$row['nom_emp']}</td><td> {$row['prenom']} </td><td> {$row['sexe']} </td><td> {$row['nom_postes']} </td><td> {$row['nom_dep']}</td> <td> {$row['mail']} </td><td> {$row['date_recrutement']} </td><td> {$row['salaire']} </td>\n";
    
}
?>

</table></center>


