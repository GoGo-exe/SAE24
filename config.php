<?php

/**
 * Configuration for database connection
 *
 */

$host       = "192.168.50.214";
$username   = "Serveur";
$password   = "BDD123_serveur";
$dbname     = "SAE24";
$dsn        = "mysql:host=$host;dbname=$dbname";
$options    = array(
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
              );