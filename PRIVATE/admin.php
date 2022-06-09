<?php include "../PUBLIQUE/templates/header.php";
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

                            <p>En utilisant ce lien, vous pourrez ajouter un client dans la base de données</p>

                            <!-- Grid Example -->
                            <div class="large-4 medium-4 cell">
                                <p><a href="create.php" class="button"><strong>Nouveau client</strong></a><br/></p>

                            </div>
                        </div>
                    </div>

                    <div class="large-4 medium-4 cell">
                        <div class="callout">
                            <p>En utilisant ce lien, vous pourrez ajouter un produit dans la base de données</p>

                            <!-- Grid Example -->
                            <div class="large-4 medium-4 cell">
                                <p><a href="new_produit.php" class="alert button"><strong>Nouveau produit</strong></a><br/></p>
                            </div>
                        </div>
                    </div>

                    <div class="large-4 medium-4 cell">
                        <div class="callout">
                            <p>En utilisant ce lien, vous pourrez effectuer une commande</p>

                            <!-- Grid Example -->
                            <div class="large-4 medium-4 cell">
                                <p><a href="../PUBLIQUE/commande.php" class="button"><strong>Commander</strong></a><br/></p>
                            </div>
                        </div>
                    </div>
                    <div class="large-4 medium-4 cell">
                        <div class="callout">
                            <p>En utilisant ce lien, vous pourrez supprimer une client</p>

                            <!-- Grid Example -->
                            <div class="large-4 medium-4 cell">
                                <p><a href="delete_client.php" class="alert button"><strong>Supprimer</strong></a><br/></p>
                            </div>
                        </div>
                    </div>
                    <div class="large-4 medium-4 cell">
                        <div class="callout">
                            <p>En utilisant ce lien, vous pourrez supprimer un produit</p>

                            <!-- Grid Example -->
                            <div class="large-4 medium-4 cell">
                                <p><a href="delete_produit.php" class="button"><strong>Supprimer</strong></a><br/></p>
                            </div>
                        </div>
                    </div>
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

<?php include "../PUBLIQUE/templates/footer.php"; ?>