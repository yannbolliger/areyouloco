<?php

// Include shared functions
include_once("_func.php");
include_once("config/config.php");

$path = parse_url($_SERVER["REQUEST_URI"], PHP_URL_PATH);
$rootPath = str_replace($_GET['path'], "", $path);

// create DB
$dbConnection = new PDO(
  "mysql:host=$config->dbHost;port=$config->dbPort;dbname=$config->dbName;charset=utf8mb4",
  $config->dbUser,
  $config->dbPass,
  array(PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ)
);

/*
 * Cookies
 */

// read cookie if exists
$loco_token = trim($_COOKIE["loco_token"]);
$loco_id = -1;

if ($loco_token) {
  $loco_id = readCookie($loco_token, $dbConnection);
}

// create and store new cookie if not in DB
if (!$loco_id || $loco_id <= 0) {
  $loco_token = bin2hex(random_bytes(50));

  $insert = $dbConnection->prepare(
    "INSERT INTO cookies (token) VALUES (?);"
  );

  if (!$insert->execute(array($loco_token))) {
    renderError("Ein unerwarteter Fehler ist aufgetreten.");
    exit;
  }
  else {
    setcookie("loco_token", $loco_token, time() + 365*24*60*60);
    $loco_id = readCookie($loco_token, $dbConnection);
  }
}
