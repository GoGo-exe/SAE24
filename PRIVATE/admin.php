<?php
  // Initialiser la session
  session_start();
  // Vérifiez si l'utilisateur est connecté, sinon redirigez-le vers la page de connexion
  if(!isset($_SESSION["login"])){
    header("Location: index.php");
    exit(); 
  }
?>
<?php include "private_templates/header.php";
?>
<!doctype html>
<html class="no-js" lang="fr" dir="ltr">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ADMIN</title>
    <link rel="stylesheet" href="../PUBLIQUE/css/foundation.css">
    <link rel="stylesheet" href="../PUBLIQUE/css/app.css">
</head>

<body>
    <div class="fond">
        <div class="grid-container">
            <div class="grid-x grid-padding-x">
                <div class="large-12 cell">
                    <h1>Bienvenue dans l'espace personnel du chef de l'entreprise !</h1>
                </div>
            </div>

            <div class="grid-x grid-padding-x">
                <div class="grid-x grid-padding-x">

                    <div class="large-4 medium-4 cell"> 
                        <div class="callout">

                            <p>En utilisant ce lien, vous pourrez gérer les employés </p>

                            <!-- Grid Example -->
                            <div class="large-4 medium-4 cell">
                                <p><a href="Gestion/Employes" class="button"><strong>Employés</strong></a><br/></p>

                            </div>
                        </div>
                    </div>

                    <div class="large-4 medium-4 cell">
                        <div class="callout">
                            <p>En utilisant ce lien, vous pourrez créer des compte qui auront accès à cet interface</p>

                            <!-- Grid Example -->
                            <div class="large-4 medium-4 cell">
                                <p><a href="Gestion/admin_compte/" class="alert button"><strong>Créer un compte admin</strong></a><br/></p>
                            </div>
                        </div>
                    </div>

                    <div class="large-4 medium-4 cell">
                        <div class="callout">
                            <p>En utilisant ce lien, vous pourrez gérer les salaires</p>

                            <!-- Grid Example -->
                            <div class="large-4 medium-4 cell">
                                <p><a href="Gestion/Salaires" class="alert button"><strong>Salaires</strong></a><br/></p>
                            </div>
                        </div>
                    </div>

                    <div class="large-4 medium-4 cell">
                        <div class="callout">
                            <p>En utilisant ce lien, vous pourrez gérer les postes</p>

                            <!-- Grid Example -->
                            <div class="large-4 medium-4 cell">
                                <p><a href="Gestion/Postes" class="alert button"><strong>Postes</strong></a><br/></p>
                            </div>
                        </div>
                    </div>

                    <div class="large-4 medium-4 cell">
                        <div class="callout">
                            <p>En utilisant ce lien, vous pourrez gérer les sanctions</p>

                            <!-- Grid Example -->
                            <div class="large-4 medium-4 cell">
                                <p><a href="Gestion/Sanctions" class="alert button"><strong>Sanctions</strong></a><br/></p>
                            </div>
                        </div>
                    </div>

                    


        <script src="PUBLIQUE/js/vendor/jquery.js"></script>
        <script src="PUBLIQUE/js/vendor/what-input.js"></script>
        <script src="PUBLIQUE/js/vendor/foundation.js"></script>
        <script src="PUBLIQUE/js/app.js"></script>
    </div>
</body>

</html>
