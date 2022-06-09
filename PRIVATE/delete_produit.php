<?php
   @$login=$_POST["login"];
   $erreur="";
   if(isset($_POST["valider"])){
         include("connexion.php");
         
        $ins=$pdo->prepare("DELETE FROM Produit WHERE code_produit='$login';");
        if($ins->execute()) 
        echo $login;  
      }
?>
<!DOCTYPE html>
<html>
   <head>
      <meta charset="utf-8" />
      <style>
         *{
            font-family:arial;
         }
         body{
            margin:20px;
         }
         input{
            border:solid 1px #2222AA;
            margin-bottom:10px;
            padding:16px;
            outline:none;
            border-radius:6px;
         }
         .erreur{
            color:#CC0000;
            margin-bottom:10px;
         }
      </style>
   </head>
   <body>
      <h1>Supprimer produit</h1>
      <div class="erreur"><?php echo $erreur ?></div>
      <form name="fo" method="post" action="">
         <input type="text" name="login" placeholder="code produit" value="<?php echo $login?>" /><br />
         <input type="submit" name="valider" value="Supprimer" />
      </form>
   </body>
</html>