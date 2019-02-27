<?php

$form = "
  <div class='container mb-3'>
    <form method='post' action='{$rootPath}name'>
      <div class='input-group'>
        <input name='name' class='form-control' maxlength='100' placeholder='Name' type='text'>
        <div class='input-group-append'>
          <input class='btn btn-secondary' type='submit' value='➕ Loco/Loca 🚀' />
        </div>
      </div>
    </form>
  </div>
";


$items = "";
foreach ($people as $person) {
  $votes = $person->votes ? $person->votes : 0;

  $items .= "
    <div class='card'>
      <div class='card-body'>
        <h5 class='card-title'>
          $person->name
          <span class='percentage'><b>$votes</b> loco</span>
        </h5>
  ";

  if ($person->hasvoted) {
    $items .= "<p class='card-text'>Schon gevotet.</p>";
  }
  else {
    $items .= "
      <form method='post' action='{$rootPath}vote'>
        <input name='id' value='$person->id' hidden />
        <input class='btn btn-primary' type='submit' value='👍  loco' />
      </form>";
  }

  $items .= "</div> </div>";
}


$list = "
  <div class='container'>
    <div class='card-group'>
      $items
    </div>
  </div>
";

$content = $form . $list;
