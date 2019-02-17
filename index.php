<?php
require "_init.php";


/**
 * Router
 */

if ($_SERVER["REQUEST_METHOD"] === "POST") {

  if ($_GET["path"] === "vote" && is_numeric($_POST["id"])) {
    require "vote.php";
  }
  else if ($_GET["path"] === "name" && !empty($_POST["name"])) {
    require "add_name.php";
  }
}

else {

  /**
   * Index controller
   */

  $query = "
    SELECT p.id as id, p.name as name, v.count as votes
    FROM people as p
    LEFT OUTER JOIN (
      SELECT person_id, COUNT(1) as count
      FROM votes GROUP BY person_id
    ) as v
    ON p.id = v.person_id
    ORDER BY votes DESC;
  ";

  $statement = $dbConnection->prepare($query);
  $statement->execute();

  $people = $statement->fetchAll();

  require "_main.php";
}
