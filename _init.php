<?php

// Include shared functions
include_once("_func.php");
include_once("config.php");

$title = "Are you loco?";
$content = "";


$dbConnection = new PDO(
  "mysql:host=$config->dbHost;port=$config->dbPort;dbname=$config->dbName",
  $config->dbUser,
  $config->dbPass,
  array(PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ)
);
