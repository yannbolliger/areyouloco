<?php

/**
 * /site/templates/_func.php
 *
 * Example of shared functions used by template files
 *
 *
 */

function redirectOnSuccess($success, $path, $error = "") {
	if ($success) {
	  header("Location: " . $path, true, 301);
	  exit();
	}
	else {
	  http_response_code(500);

		$content = "
		<div class='container'>
			<div class='card-group'>
				<div class='card'>
					<div class='card-body'>
						<h5 class='card-title'>💥 $error</h5>
						<a href='javascript:history.back()'>⬅️ Zurück</a>
					</div>
				</div>
			</div>
		</div>
		";

		require "_main.php";
	  exit();
	}
}

function versionedAssetUrl($assetPath) {
	$gitCommit = substr(file_get_contents(".git/refs/heads/master"), 0, 6);
 	return $assetPath . "?a=" . $gitCommit;
}

function shuffle_assoc($list) {
  if (!is_array($list)) return $list;

  $keys = array_keys($list);
  shuffle($keys);
  $random = array();
  foreach ($keys as $key) {
    $random[$key] = $list[$key];
  }
  return $random;
}


/**
* Truncate text to a wordwrap.
*
* @param String text
* @param int optional maximal length of the text
* @return string
*/
function truncateText($text, $maxlength = 200) {
	// for the three points at the end
	$maxlength -= 1;

	// truncate to max length
	$text = substr(strip_tags($text), 0, $maxlength);
	// check if we've truncated in the middle of a word
	if (strlen(rtrim($text, ' .!?,;')) == $maxlength) {
		// truncate to last word
		$text = substr($text, 0, strrpos($text, ' '));
	}
	return trim($text) . "&hellip;";
}
