<?php
require "_init.php";


/**
 * Router
 */

if ($_SERVER["REQUEST_METHOD"] === "POST") {

  if ($_GET["path"] === "vote" && is_numeric($_POST["id"])) {
    require "vote.php";
  }
  else if ($_GET["path"] === "name") {
    require "add_name.php";
  }
  else redirectOnSuccess(false, $rootPath, "Falsche Parameter.");
}

else {

  /**
   * Index controller
   */

  $query = "
    SELECT p.id as id, name, count as votes, s.hasvoted as hasvoted
    FROM people as p
    LEFT JOIN (
      SELECT v.person_id as id, count, IFNULL(hasvoted, 0) as hasvoted
      FROM (
        SELECT person_id, COUNT(1) as count
        FROM votes WHERE created_at >= NOW() - INTERVAL 1 MONTH
        GROUP BY person_id
      ) as v
      LEFT JOIN (
        SELECT person_id, 1 as hasvoted
        FROM votes WHERE cookie_id = ?
        AND created_at >= NOW() - INTERVAL 7 day
      ) as h
      ON h.person_id = v.person_id
    ) as s
    ON s.id = p.id
    ORDER BY votes DESC, name ASC;
  ";

  $statement = $dbConnection->prepare($query);
  $statement->execute(array($loco_id));

  $people = $statement->fetchAll();

  require "_index_list.php";
}
