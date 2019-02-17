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

if ($success) {
  header("Location: " + "https://" . $_SERVER['HTTP_HOST']);
}
else {
  http_response_code(500);
}
exit;
