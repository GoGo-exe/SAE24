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
                <div class="large-4 medium-4 cell"> 
                        <div class="callout">

                            <p>En utilisant ce lien, vous pourrez ajouter un employés </p>

                            <!-- Grid Example -->
                            <div class="large-4 medium-4 cell">
                                <p><a href="nouvel_employe.php" class="button"><strong>Ajouter un employé</strong></a><br/></p>

                            </div>
                        </div>
                    </div>

</div>
Nombre d'employés:
</br>

<!------------------------------------Requête SQL NOMBRE EMPLOYE Direction-------------------------------------------->
<?php 
echo"</br>";
 require "../../../config.php";
 require "../../../common.php";

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
<!------------------------------------------------------------------------------------------->
</div>


    
    
</body>
</html>