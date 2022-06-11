<?php include "../../../PRIVATE/private_templates/header.php";
?>
<?php
$user = "Serveur";
$pass = "BDD123_serveur";
$db = "SAE24";
$db = new mysqli("192.168.1.176", $user,$pass,$db)
or die ("unable to connect");

$sql = "SELECT *,Employés.nom AS nom_emp,Département.nom AS nom_dep,Postes.nom AS nom_postes FROM Employés INNER JOIN Département ON Employés.id_dep = Département.id_dep INNER JOIN Postes ON Employés.poste = Postes.id_poste;";
$result = mysqli_query($db,$sql) or die ("bad query");
?>

<center> <h1>Liste des employés </center></h1>
<center><table border = '1'>
<tr><td><strong> Nom </strong></td> <td><strong> Prénom </strong></td> <td><strong> Poste </strong></td> <td><strong> Département </strong></td> 
<td><strong> Mail </strong></td> <td><strong> Date de recrutement </strong></td><td><strong> Salaire </strong></td></tr>

<?php
while($row=mysqli_fetch_assoc($result)){
    echo"<tr><td>{$row['nom_emp']}</td><td> {$row['prenom']} </td><td> {$row['nom_postes']} </td><td> {$row['nom_dep']}</td> <td> {$row['mail']} </td><td> {$row['date_recrutement']} </td><td> {$row['salaire']} </td>\n";
    
}
?>

</table></center>


