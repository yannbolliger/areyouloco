<?php

// Include shared functions
include_once("_func.php");
include_once("config.php");

$title = "Are you loco?";

$path = parse_url($_SERVER["REQUEST_URI"], PHP_URL_PATH);
$parts = explode("/", $path);
$rootPath = "/" . $parts[1] . "/";

// create DB
$dbConnection = new PDO(
  "mysql:host=$config->dbHost;port=$config->dbPort;dbname=$config->dbName",
  $config->dbUser,
  $config->dbPass,
  array(PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ)
);

/*
 * Cookies
 */

// create and store new cookie
if (empty($_COOKIE["loco_token"])) {
  $loco_token = bin2hex(random_bytes(50));

  $insert = $dbConnection->prepare(
    "INSERT INTO cookies (token) VALUES (?);"
  );

  if (!$insert->execute(array($loco_token))) {
    http_response_code(500);
    exit;
  }
  else setcookie("loco_token", $loco_token, time() + 365*24*60*60);
}

$loco_token = trim($_COOKIE["loco_token"]);

$query = $dbConnection->prepare(
  "SELECT id FROM cookies WHERE token = ?;"
);

$query->execute(array($loco_token));
$loco_id = intval($query->fetch()->id);
