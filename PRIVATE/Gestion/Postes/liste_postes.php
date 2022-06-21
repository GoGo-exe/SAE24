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

$sql = "SELECT Postes.nom AS metier,AVG(Employés.salaire) AS moyenne FROM Postes INNER JOIN Employés ON Employés.poste = Postes.id_poste GROUP BY metier ;";

$result = mysqli_query($db,$sql) or die ("bad query");
?>


<center> <h1>Liste des employés </center></h1>
<center><table border = '1'>
<tr><td><strong> Nom </strong></td><td><strong> Moyenne des salaire par poste </strong></td></tr>

<?php
while($row=mysqli_fetch_assoc($result)){
    echo"<tr><td>{$row['metier']}</td><td>{$row['moyenne']}</td>";
    
}
?>

</table></center>


