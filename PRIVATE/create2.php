<?php

/**
 * Use an HTML form to create a new entry in the
 * users table.
 *
 */


if (isset($_POST['submit'])) {
    require "../config.php";
    require "../common.php";

    try  {
        $connection = new PDO($dsn, $username, $password, $options);
        
        $new_user = array(
            "nom" => $_POST['nom'],
            "prenom"  => $_POST['prenom'],
            "password"     => $_POST['password'],
            "login"       => $_POST['login'],
        );

        $sql = sprintf(
                "INSERT INTO %s (%s) values (%s)",
                "Client",
                implode(", ", array_keys($new_user)),
                ":" . implode(", :", array_keys($new_user))
        );
        
        $statement = $connection->prepare($sql);
        $statement->execute($new_user);
    } catch(PDOException $error) {
        echo $sql . "<br>" . $error->getMesslogin();
    }
}
?>

<?php require "templates/header.php"; ?>

<?php if (isset($_POST['submit']) && $statement) { ?>
    <blockquote><?php echo $_POST['nom']; ?> a été ajouté !</blockquote>
<?php } ?>

<!doctype html>
<html class="no-js" lang="fr" dir="ltr">

<div class="return_home">
    <a href="../admin/admin.php">Retourner au menu admin</a>
</div>

<h2>Création de votre compte utilisateur</h2>

<form method="post">

    <div class="grid-x grid-padding-x">
        <div class="large-4 medium-4 cell">
            <label for="prenom">Prénom</label>
            <input type="text" placeholder="" name="prenom" id="prenom"/>
        </div>
        <div class="large-4 medium-4 cell">
            <label for="nom">Nom</label>
            <input type="text" placeholder="" name="nom" id="nom" />
        </div>
        <div class="large-4 medium-4 cell">
            <label for="login">Login</label>
            <input type="text" placeholder="" name="login" id="login" />
        </div>
        <div class="large-4 medium-4 cell">
            <div class="grid-x">
                <label for="password">Password</label>
                <div class="input-group">
                    <input type="text" placeholder="" class="input-group-field" name="password" id="password" />
                </div>
            </div>
        </div>
        
    </div>
    
    <input type="submit" name="submit" value="Valider" style="width: 150px; height: 35px;">
    
</div>
</form>



<?php require "templates/footer.php"; ?>