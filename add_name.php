<?php

$name = strip_tags(trim($_POST["name"]));

if (empty($name)) {
  http_response_code(400);
  exit;
}

$insert = $dbConnection->prepare("INSERT INTO people (name) VALUES (:name);");
$success = $insert->execute(array(':name' => $name));

if ($success) {
  header("Location: " + "https://" . $_SERVER['HTTP_HOST']);
}
else {
  http_response_code(500);
}
exit;
