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

                            <p>En utilisant ce lien, vous pourrez ajouter un employés </p>

                            <!-- Grid Example -->
                            <div class="large-4 medium-4 cell">
                                <p><a href="nouvel_employe.php" class="button"><strong>Ajouter un employé</strong></a><br/></p>

                            </div>
                        </div>
                    </div>
                
                    <div class="large-4 medium-4 cell"> 
                        <div class="callout">

                            <p>En utilisant ce lien, vous pourrez virer des employés </p>

                            <!-- Grid Example -->
                            <div class="large-4 medium-4 cell">
                                <p><a href="virer_emp.php" class="button"><strong>Virer un employé</strong></a><br/></p>

                            </div>
                        </div>
                    </div>

                    <div class="large-4 medium-4 cell"> 
                        <div class="callout">

                            <p>En utilisant ce lien, vous pourrez voir la liste des employés </p>

                            <!-- Grid Example -->
                            <div class="large-4 medium-4 cell">
                                <p><a href="liste_emp.php" class="button"><strong>Voir la liste des employés</strong></a><br/></p>

                            </div>
                        </div>
                    </div>
                    </center>
</div>
Nombre d'employés:
</br>

<!------------------------------------Requête SQL NOMBRE EMPLOYE Direction-------------------------------------------->
<?php 
echo"</br>";
 require "../../../config.php";

try  {
    $connection = new PDO($dsn, $username, $password, $options);
    
    $sql = sprintf(
            "SELECT COUNT(id_emp) FROM Employés INNER JOIN Département ON Employés.id_dep = Département.id_dep WHERE Département.nom = 'Autre';"
    );
    
    $statement = $connection->prepare($sql);
    $statement->execute($new_user);
} catch(PDOException $error) {
    echo $sql . "<br>" . $error->getMessage();
}

$data_compte_direction = $statement->fetchAll();
echo "Direction: ". $data_compte_direction[0][0] ."";
echo"</br>";
?>

<!------------------------------------Requête SQL NOMBRE EMPLOYE Commercial et technique-------------------------------------------->
<?php 
 require "../../../config.php";

try  {
    $connection = new PDO($dsn, $username, $password, $options);
    
    $sql = sprintf(
            "SELECT COUNT(id_emp) FROM Employés INNER JOIN Département ON Employés.id_dep = Département.id_dep WHERE Département.nom = 'Commercial et technique';"
    );
    
    $statement = $connection->prepare($sql);
    $statement->execute($new_user);
} catch(PDOException $error) {
    echo $sql . "<br>" . $error->getMessage();
}

$data_compte_commercial = $statement->fetchAll();
echo "Commercial et technique: ". $data_compte_commercial[0][0] ."";
echo"</br>";
?>
<!------------------------------------Requête SQL NOMBRE EMPLOYE Gestion Administrative et financière-------------------------------------------->
<?php 
 require "../../../config.php";

try  {
    $connection = new PDO($dsn, $username, $password, $options);
    
    $sql = sprintf(
            "SELECT COUNT(id_emp) FROM Employés INNER JOIN Département ON Employés.id_dep = Département.id_dep WHERE Département.nom = 'Gestion Administrative et financière';"
    );
    
    $statement = $connection->prepare($sql);
    $statement->execute($new_user);
} catch(PDOException $error) {
    echo $sql . "<br>" . $error->getMessage();
}

$data_compte_admin_finance = $statement->fetchAll();
echo "Gestion Administrative et financière: ". $data_compte_admin_finance[0][0] ."";
?>

<!------------------------------------Requête SQL Pourcentage HOMME/FEMME-------------------------------------------->
<?php 
echo"</br>";
 require "../../../config.php";

try  {
    $connection = new PDO($dsn, $username, $password, $options);
    
    $sql = sprintf(
            "SELECT COUNT(id_emp) FROM Employés;"
    );

    $sql2 = sprintf(
        "SELECT COUNT(id_emp) FROM Employés WHERE sexe = 'femme' ;"
);

    $sql3 = sprintf(
        "SELECT COUNT(id_emp) FROM Employés WHERE sexe = 'homme' ;"
);
    
    $statement = $connection->prepare($sql);
    $statement->execute($new_user);
} catch(PDOException $error) {
    echo $sql . "<br>" . $error->getMessage();
}

$nombre_employés = $statement->fetchAll();

try  {

$statement = $connection->prepare($sql2);
$statement->execute($new_user);
} catch(PDOException $error) {
    echo $sql2 . "<br>" . $error->getMessage();
}
$nombre_femmelle = $statement->fetchAll();

try  {

    $statement = $connection->prepare($sql3);
    $statement->execute($new_user);
    } catch(PDOException $error) {
        echo $sql3 . "<br>" . $error->getMessage();
    }
    $nombre_chad = $statement->fetchAll();
    

echo"</br>";echo"</br>";
echo "Pourcentage de chad dans l'entreprise: " ;
$pourcentage_chad = $nombre_chad[0][0]*100/$nombre_employés[0][0];
echo $pourcentage_chad;
echo"</br>";

echo "Pourcentage de femmelles dans l'entreprise: " ;
$pourcentage_femmelle = $nombre_femmelle[0][0]*100/$nombre_employés[0][0];
echo $pourcentage_femmelle;

echo"</br>";
?>

</div>


    
    
</body>
</html>