<?php

$name = strip_tags(trim($_POST["name"]));

if (empty($name)) {
  http_response_code(400);
  echo "Der Name kann nicht leer sein.";
  exit;
}

$insert = $dbConnection->prepare("INSERT INTO people (name) VALUES (:name);");
$success = $insert->execute(array(':name' => $name));

redirectOnSuccess($success, $rootPath, "Dieser Name exisitiert schon.");
