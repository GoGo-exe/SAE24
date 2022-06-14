<?php include "../../../PRIVATE/private_templates/header.php";
?>
<?php
$user = "Serveur";
$pass = "BDD123_serveur";
$db = "SAE24";
$db = new mysqli("192.168.50.214", $user,$pass,$db)
or die ("unable to connect");

$sql = "SELECT nom FROM Postes";
$result = mysqli_query($db,$sql) or die ("bad query");
?>

<center> <h1>Liste des employés </center></h1>
<center><table border = '1'>
<tr><td><strong> Nom </strong></td></tr>

<?php
while($row=mysqli_fetch_assoc($result)){
    echo"<tr><td>{$row['nom']}</td>";
    
}
?>

</table></center>


