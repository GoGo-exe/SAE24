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
$user = "Serveur";
$pass = "BDD123_serveur";
$db = "SAE24";
$db = new mysqli("192.168.50.214", $user,$pass,$db)
or die ("unable to connect");
require "../../../config.php";
?>
<center> <h1>Liste des sanctions </center></h1>

<?php
$sql = "SELECT *,Employés.nom AS nom FROM Sanction INNER JOIN Employés ON Employés.id_emp = Sanction.id_emp;";
$result = mysqli_query($db,$sql) or die ("bad query");
?>
</br></br>
<center><table border = '1'>

<tr><td><strong> Prénom </strong></td><td><strong>Sanction </strong></td> <td><strong> Date_début</strong></td> <td><strong> date_fin</strong></td> 
<td><strong> Commentaire</strong></td></tr>

<?php
while($row=mysqli_fetch_assoc($result)){
    echo"<tr><td>{$row['nom']}</td><td> {$row['sanction']} </td><td> {$row['date_debut']} </td><td> {$row['date_fin']} </td><td> {$row['commentaire']} </td>\n";
    
}
?>

</table></center>