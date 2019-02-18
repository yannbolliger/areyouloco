<?php

$name = strip_tags(trim($_POST["name"]));

if (empty($name)) {
  redirectOnSuccess(false, $rootPath, "Der Name kann nicht leer sein.");
}

$insert = $dbConnection->prepare("INSERT INTO people (name) VALUES (:name);");
$success = $insert->execute(array(':name' => $name));

if (!$success && $insert->errorInfo()[1] === 1062) {
  redirectOnSuccess($success, $rootPath, "Dieser Name exisitiert schon.");
}
else redirectOnSuccess($success, $rootPath, "Es ist ein interner Fehler aufgetreten");
