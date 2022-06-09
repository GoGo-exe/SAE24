<?php
   try{
      $pdo=new PDO("mysql:host=192.168.50.223;dbname=SAE23","Serveur","BDD123_serveur");
   }
   catch(PDOException $e){
      echo $e->getMessage();
   }
?>