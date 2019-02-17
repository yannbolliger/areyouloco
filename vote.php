<?php

$id = intval($_POST["id"]);

$query = "
  INSERT INTO votes (person_id, cookie_id)
  VALUES (:person_id, :cookie_id);
";

$insert = $dbConnection->prepare($query);
$success = $insert->execute(
  array(':person_id' => $id, ':cookie_id' => $loco_id)
);

redirectOnSuccess($success, $rootPath, "Du hast schon für diese Person gevotet.");
