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
<center> <h1>Liste des employés </center></h1>



<?php

//------------------------------------------------------------------------------------------

$sql = "SELECT AVG(salaire) as moyenne,nom.Postes as poste FROM Employés INNER JOIN Postes ON Employés.poste = Postes.id_poste;";
$result = mysqli_query($db,$sql) or die ("bad query");
?>
</br></br>
<center><table border = '1'>

<tr><td><strong> Poste </strong></td> <td><strong> Moyenne salaire </strong></td></tr>

<?php
while($row=mysqli_fetch_assoc($result)){
    echo"<tr><td>{$row['poste']}</td><td> {$row['moyenne']} </td>\n";
    
}
?>

</table></center>


