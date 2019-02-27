<?php

/**
 * /site/templates/_func.php
 *
 * Example of shared functions used by template files
 *
 *
 */

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
