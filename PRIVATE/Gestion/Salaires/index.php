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

                            <p>En utilisant ce lien, vous pourrez modifier un salaire </p>

                            <!-- Grid Example -->
                            <div class="large-4 medium-4 cell">
                                <p><a href="nouvel_employe.php" class="button"><strong>Modifier un salaire</strong></a><br/></p>

                            </div>
                        </div>
                    </div>
                
                    <div class="large-4 medium-4 cell"> 
                        <div class="callout">

                            <p>En utilisant ce lien, vous pourrez consulter la moyenne des salaires par postes </p>

                            <!-- Grid Example -->
                            <div class="large-4 medium-4 cell">
                                <p><a href="moyennes.php" class="button"><strong>Voir moyenne salaires</strong></a><br/></p>

                            </div>
                        </div>
                    </div>
                    </center>
</div>