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
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestion employés</title>
</head>
<body>
    <center>
                <div class="large-4 medium-4 cell"> 
                        <div class="callout">

                            <p>En utilisant ce lien, vous pourrez ajouter une sanction à un employé </p>

                            <!-- Grid Example -->
                            <div class="large-4 medium-4 cell">
                                <p><a href="nouvelle_sanction.php" class="button"><strong>Ajouter une sanction</strong></a><br/></p>

                            </div>
                        </div>
                    </div>
                
                    <div class="large-4 medium-4 cell"> 
                        <div class="callout">

                            <p>En utilisant ce lien, vous pourrez enelver une sanction à un employé </p>

                            <!-- Grid Example -->
                            <div class="large-4 medium-4 cell">
                                <p><a href="virer_emp.php" class="button"><strong>Enlever une sanction</strong></a><br/></p>

                            </div>
                        </div>
                    </div>
                    </center>
</div>